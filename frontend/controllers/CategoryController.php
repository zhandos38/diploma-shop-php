<?php
namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use frontend\models\ProductSearch;
use frontend\models\ReviewForm;
use Yii;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionIndex($id)
    {
        $model = $this->findModel($id);

        $categories = Category::find()->all();
        $childIds = $this->getCategoryIds($categories, (int)$id);

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $childIds);

        if (Yii::$app->request->isAjax && !Yii::$app->request->isPjax) {
            return $this->renderPartial('_list', [
                'dataProvider' => $dataProvider,
                'categoryName' => $model->name
            ]);
        }

        $minProductPrice = Product::find()->select('price')->andWhere(['in', 'category_id', $childIds])->orderBy(['price' => SORT_ASC])->asArray()->limit(1)->one();
        $maxProductPrice = Product::find()->select('price')->andWhere(['in', 'category_id', $childIds])->orderBy(['price' => SORT_DESC])->asArray()->limit(1)->one();

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'minProductPrice' => isset($minProductPrice) ? $minProductPrice['price'] : 0,
            'maxProductPrice' => isset($maxProductPrice['price']) ? $maxProductPrice['price'] : 0
        ]);
    }

    public function actionProduct($id)
    {
        $model = Product::findOne(['id' => $id]);

        $reviewForm = new ReviewForm();
        if ($reviewForm->load(Yii::$app->request->post()) && $reviewForm->save()) {
            Yii::$app->session->setFlash('success', 'Ваш обзор успешно опубликован');
        }

        return $this->render('product', [
            'model' => $model,
            'reviewForm' => $reviewForm
        ]);
    }

    public function actionSearch($query = '', $page = 1)
    {
        /*
         * Чтобы получить ЧПУ, выполняем редирект на catalog/search/query/одежда
         * после отправки поискового запроса из формы методом POST. Если строка
         * поискового запроса пустая, выполняем редирект на catalog/search.
         */
        if (Yii::$app->request->isPost) {
            $query = Yii::$app->request->post('query');
            if (is_null($query)) {
                return $this->redirect(['category/search']);
            }
            $query = trim($query);
            if (empty($query)) {
                return $this->redirect(['category/search']);
            }
            $query = urlencode(Yii::$app->request->post('query'));
            return $this->redirect(['category/search/query/'.$query]);
        }

        $page = (int)$page;

        // получаем результаты поиска с постраничной навигацией
        list($products, $pages) = (new Product())->getSearchResult($query, $page);

        return $this->render('search', [
                'products' => $products,
                'pages' => $pages,
                'query' => $query
            ]
        );
    }

    public function findModel($id)
    {
        $model = Category::findOne(['id' => $id]);
        if ($model === null) {
            throw new Exception('Category is not found');
        }

        return $model;
    }

    private function getCategoryIds($categories, $categoryId, &$categoryIds = [])
    {
        /** @var $categories Category[] */
        foreach ($categories as $category) {
            if ($categoryId === $category->id) {
                $categoryIds[] = $category->id;
            } elseif ($category->parent_id === $categoryId) {
                $this->getCategoryIds($categories, $category->id, $categoryIds);
            }
        }
        return $categoryIds;
    }
}