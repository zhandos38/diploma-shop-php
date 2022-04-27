<?php
namespace frontend\controllers;


use common\models\Order;
use common\models\Product;
use common\models\User;
use common\models\WishList;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

class CabinetController extends Controller
{
    public $layout = 'user';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        $model = User::findOne(['id' => Yii::$app->user->getId()]);

        if ($model === null) {
            throw new Exception('User is not found');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Данные успешно обновлены');
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionOrders()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find()->where(['customer_id' => Yii::$app->user->getId()]),
            'pagination' => [
                'pageSize' => 20
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('orders', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionWishList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WishList::find()->where(['user_id' => Yii::$app->user->getId()]),
            'pagination' => [
                'pageSize' => 20
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('wish-list', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionSetWishList()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->post('id');
            if ($id === null) {
                throw new Exception('Product id is not set!');
            }

            $product = Product::find()->andWhere(['id' => $id])->one();
            if ($product === null) {
                throw new Exception('Product is not found!');
            }

            $wishList = WishList::findOne(['user_id' => Yii::$app->user->getId(), 'product_id' => $product->id]);
            if ($wishList !== null) {
                $wishList->delete();
            }

            $wishList = new WishList();
            $wishList->product_id = $product->id;
            $wishList->user_id = Yii::$app->user->getId();
            $wishList->created_at = time();
            if (!$wishList->save()) {
                throw new Exception('Wish List is not saved');
            }

            $qty = Yii::$app->user->identity->getWishListCount();
            return $this->renderAjax('_wish-list', [
                'qty' => $qty
            ]);
        }

        throw new HttpException('404', 'Page is not found!');
    }

    public function actionUnsetFavourite($id)
    {
        $wishList = WishList::findOne(['id' => $id]);
        if ($wishList === null) {
            throw new Exception('Favourite is not found');
        }

        $wishList->delete();

        $wishList = Yii::$app->user->identity->wishList;

        return $this->redirect(['wish-list']);
    }
}