<?php

use dosamigos\chartjs\ChartJs;
use kartik\daterange\DateRangePicker;
use kartik\form\ActiveForm;

/* @var $this \yii\web\View */

$this->title = 'Отчеты';
?>
<h1><?= $this->title ?></h1>
<?php $form = ActiveForm::begin() ?>

    <div class="row">
        <div class="col-md-12">

            <?= $form->field($model, 'dateRange', [
                    'addon' => [ 'prepend' => ['content' => '<i class="fa fa-calendar"></i>']],
                    'options' => ['class' => 'drp-container form-group'],
                ])->widget(DateRangePicker::classname(), [
                    'useWithAddon' => true,
                    'options' => ['placeholder' => 'Выберите дату...'],
                    'pluginOptions' => [
                        'locale' => [
                            'format'=>'YYYY.MM.DD'
                        ]
                    ]
                ])->label('Дата');
            ?>

            <?= \yii\helpers\Html::button('Применить', ['type' => 'submit', 'class' => 'btn btn-success']) ?>

        </div>
        <?php if (!empty($data)): ?>
        <div class="col-md-6">
                <table id="report-table" class="report-sale__table table table-bordered">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Количество продаж</th>
                        <th>Сумма</th>
                        <th>Средний чек</th>
                        <th>Чистая прибыль</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $totalQty = 0;
                    $totalSum = 0;
                    $totalProfit = 0;
                    foreach ($data as $datum): ?>
                        <tr class="text-center">
                            <td><?= $datum['date'] ?></td>
                            <td><?php $totalQty += $datum['qty']; echo $datum['qty'] ?></td>
                            <td><?php $totalSum += $datum['cost_sum']; echo number_format($datum['cost_sum'], 2, ",", " ") ?></td>
                            <td><?= number_format($datum['cost_avg'], 2, ",", " ") ?></td>
                            <td><?php $totalProfit += $datum['profit']; echo number_format($datum['profit'], 2, ",", " ") ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td><b>Всего</b></td>
                        <td class="text-center"><b><?= number_format($totalQty, 2, ",", " ") ?></b></td>
                        <td class="text-center"><b><?= number_format($totalSum, 2, ",", " ") ?></b></td>
                        <td></td>
                        <td class="text-center"><b><?= number_format($totalProfit, 2, ",", " ") ?></b></td>
                    </tr>
                    </tbody>
                </table>
        </div>
        <div class="col-md-6">
            <?= ChartJs::widget([
                'type' => 'line',
                'data' => [
                    'labels' => $dateArray,
                    'datasets' => [
                        [
                            'label' => "Сумма",
                            'backgroundColor' => "rgba(179,181,198,0.2)",
                            'borderColor' => "rgba(179,181,198,1)",
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $sumByDate
                        ],
                        [
                            'label' => "Количество",
                            'backgroundColor' => "rgba(255,99,132,0.2)",
                            'borderColor' => "rgba(255,99,132,1)",
                            'pointBackgroundColor' => "rgba(255,99,132,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(255,99,132,1)",
                            'data' => $qtyByDate
                        ],
                        [
                            'label' => "Средний чек",
                            'backgroundColor' => "rgba(241, 247, 45, 0.2)",
                            'borderColor' => "rgba(241, 247, 45, 1)",
                            'pointBackgroundColor' => "rgba(241, 247, 45, 1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(241, 247, 45, 1)",
                            'data' => $avgByDate
                        ],
                        [
                            'label' => "Чистая прибыль",
                            'backgroundColor' => "rgba(3, 115, 252, 0.2)",
                            'borderColor' => "rgba(3, 115, 252, 1)",
                            'pointBackgroundColor' => "rgba(3, 115, 252, 1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(3, 115, 252, 1)",
                            'data' => $profitByDate
                        ],
                    ]
                ]
            ]);
            ?>
        </div>
        <?php endif; ?>
    </div>

<?php ActiveForm::end() ?>
