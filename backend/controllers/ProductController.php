<?php

namespace backend\controllers;

use backend\models\ProductSearch;
use common\models\ProductImage;
use Yii;
use common\models\Product;
use yii\db\Exception;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerProductAttributeValue = new \yii\data\ArrayDataProvider([
            'allModels' => $model->productAttributeValues,
        ]);
        $providerProductOption = new \yii\data\ArrayDataProvider([
            'allModels' => $model->productOptions,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerProductAttributeValue' => $providerProductAttributeValue,
            'providerProductOption' => $providerProductOption,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->loadAll(Yii::$app->request->post(), ['reviews', 'wishlists', 'orderItems', 'productImages']) && $model->saveAll(['reviews', 'wishlists', 'orderItems', 'productImages'])) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws Exception
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post(), ['reviews', 'wishlists', 'orderItems', 'productImages']) && $model->saveAll(['reviews', 'wishlists', 'orderItems', 'productImages'])) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws Exception
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated(['reviews', 'wishlists', 'orderItems', 'productImages']);

        return $this->redirect(['index']);
    }

    
    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for OrderItem
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddOrderItem()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('OrderItem');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formOrderItem', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for ProductAttributeValue
     * @return mixed
     * @throws NotFoundHttpException
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     */
    public function actionAddProductAttributeValue()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ProductAttributeValue');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formProductAttributeValue', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for ProductAttributeValue
     * @return mixed
     * @throws NotFoundHttpException
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     */
    public function actionAddProductPrice()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ProductPrice');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formProductPrice', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Action to load a tabular form grid
     * for ProductImage
     * @return mixed
     * @throws NotFoundHttpException
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     */
    public function actionAddProductImage()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ProductImage');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formProductImage', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for ProductOption
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddProductOption()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ProductOption');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formProductOption', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Review
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddReview()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Review');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formReview', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for WishList
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddWishList()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('WishList');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formWishList', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionImageUpload($id)
    {
        $model = $this->findModel($id);

        $image = UploadedFile::getInstanceByName('file-image');
        if ($image === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/product';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $imgPath = $folderPath . '/' . $image->baseName . '.' . $image->extension;
        if (!$image->saveAs($imgPath)) {
            throw new Exception('Upload image error');
        }

        Image::resize($imgPath,500, 500, true)->save();

        $productImage = new ProductImage();
        $productImage->product_id = $model->id;
        $productImage->img = $image->baseName . '.' . $image->extension;
        if (!$productImage->save()) {
            throw new Exception('Product Image is not saved');
        }

        return true;
    }

    public function actionImageDelete()
    {
        if ($id = Yii::$app->request->post('key')) {
            $productImage = ProductImage::findOne(['id' => $id]);
            return $productImage->delete();
        }

        throw new \yii\web\HttpException('404');
    }
}
