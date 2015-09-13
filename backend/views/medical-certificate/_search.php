<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\MedicalCertificateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medical-certificate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mc_id') ?>

    <?= $form->field($model, 'mc_serial') ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'mc_problem') ?>

    <?= $form->field($model, 'mc_startdate') ?>

    <?php // echo $form->field($model, 'mc_enddate') ?>

    <?php // echo $form->field($model, 'mc_appdate') ?>

    <?php // echo $form->field($model, 'clinic_id') ?>

    <?php // echo $form->field($model, 'au_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
