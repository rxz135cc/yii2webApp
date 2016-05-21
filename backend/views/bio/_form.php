<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bio_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bio_place_num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
