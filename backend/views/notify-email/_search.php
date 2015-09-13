<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NotifyEmailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notify-email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ne_id') ?>

    <?= $form->field($model, 'mc_id') ?>

    <?= $form->field($model, 'staff_id') ?>

    <?= $form->field($model, 'staff_email') ?>

    <?= $form->field($model, 'attachment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
