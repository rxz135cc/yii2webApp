<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use dosamigos\datepicker\DatePicker;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MedicalCertificateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Medical Certificates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medical-certificate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Medical Certificate', ['value' => Url::to('index.php?r=medical-certificate/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
                'header' => '<h4>Medical Certificate</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);
        echo "<div id='modalContent'></div>";

        Modal::end();

    ?>

    

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mc_serial',

            [
             'attribute' => 'student_id',
             'label'=>'Student Matrix',
             'value' => 'student.student_matrix'
            ],

            'student.student_name',

            [
             'attribute' => 'mc_startdate',
             'value' => 'mc_startdate',
             'contentOptions' =>['style' => 'width:160px'],
             'filter' => DatePicker::widget([
                                'model' => $searchModel,
                                'attribute' => 'mc_startdate',
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-m-d',
                                    ]
                            ]),
             'format'=>'date',//date,datetime, time
            ],

            [
             'attribute' => 'mc_enddate',
             'value' => 'mc_enddate',
             'contentOptions' =>['style' => 'width:160px'],
             'filter' => DatePicker::widget([
                                'model' => $searchModel,
                                'attribute' => 'mc_enddate',
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-m-d',
                                    ]
                            ]),
             'format'=>'date',//date,datetime, time
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>