<?php

namespace backend\controllers;

use common\models\Product;
use Yii;
use common\models\Revision;
use backend\models\RevisionSearch;
use yii\db\Exception;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RevisionController implements the CRUD actions for Revision model.
 */
class RevisionController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Revision models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RevisionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Revision model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Revision model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new Revision();

        if ($post = Yii::$app->request->post()) {

            $model->balance = (float)$post['balance'];

            $transaction = Yii::$app->db->beginTransaction();
            try {
                foreach ($post['products'] as $item) {
                    $product = Product::findOne(['id' => $item['id']]);
                    if (!$product) {
                        throw new Exception('Product is not found');
                    }

                    $product->quantity = $item['quantity'];
                    if (!$product->save()) {
                        throw new Exception(Json::encode($product->errors));
                    }
                }

                if (!$model->save()) {
                    throw new Exception('Revision is not saved');
                }

                $transaction->commit();
            } catch (Exception $exception) {
                $transaction->rollBack();
                throw new Exception($exception->getMessage());
            }

           return true;
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Revision model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Revision model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    public function actionGetProductsByBarcode($term = null)
    {
        $products = Product::find()
                ->select(['id', 'name', 'code', 'price_in', 'price', 'quantity'])
                ->andWhere(['like', 'code', $term])
                ->all();

        return Json::encode($products);
    }

    public function actionGetProductsByName($term = null)
    {
        $products = Product::find()
            ->select(['id', 'name', 'code', 'price_in', 'price', 'quantity'])
            ->andWhere(['like', 'name', $term])
            ->all();

        return Json::encode($products);
    }

    
    /**
     * Finds the Revision model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Revision the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Revision::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
