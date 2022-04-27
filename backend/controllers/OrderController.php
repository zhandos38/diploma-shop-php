<?php

namespace backend\controllers;

use backend\models\OrderItemSearch;
use backend\models\ReportForm;
use Yii;
use common\models\Order;
use backend\models\OrderSearch;
use yii\db\Exception;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post())) {
            if (!$model->save()) {
                throw new Exception('Order save error');
            }
            $model->number = $model->generateNumber();
            if (!$model->save()) {
                throw new Exception('Order save error');
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetBill($id)
    {
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('_bill', [
                'order' => Order::findOne(['id' => $id])
            ]);
        }

        return false;
    }

    public function actionReport()
    {
        $model = new ReportForm();

        $data = [];
        $dateArray = [];
        $sumByDate = [];
        $qtyByDate = [];
        $avgByDate = [];
        $profitByDate = [];
        if ($model->load(Yii::$app->request->post()) && ($data = $model->search()) && !empty($data)) {
            foreach ($data as $datum) {
                $dateArray[] = $datum['date'];
                $sumByDate[] = $datum['cost_sum'];
                $qtyByDate[] = $datum['qty'];
                $avgByDate[] = $datum['cost_avg'];
                $profitByDate[] = $datum['profit'];
            }
        }

        $model->dateRange = date('Y.m.d') . ' - ' . date('Y.m.d');

        return $this->render('report', [
            'model' => $model,
            'data' => $data,
            'dateArray' => $dateArray,
            'sumByDate' => $sumByDate,
            'qtyByDate' => $qtyByDate,
            'avgByDate' => $avgByDate,
            'profitByDate' => $profitByDate
        ]);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
