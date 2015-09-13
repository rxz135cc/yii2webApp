<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Staff;

/* @var $this yii\web\View */
/* @var $model backend\models\NotifyEmail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notify-email-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'mc_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'staff_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map( Staff::find()->all(), 'staff_id', 'staff_name', 'department.dept_name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Insert Staff Name', 'id' => 'staffId'],
            'pluginOptions' => [
                'allowClear' => true
            ],
    ])
    ->label('Staff Name'); ?>

    <?= $form->field($model, 'staff_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'attachment')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

<?php
$medical_id=$_GET['medical_id'];
$script = <<< JS
$('#notifyemail-mc_id').attr('value',$medical_id)
$('#staffId').change(function(){
    var Id = $(this).val();
   
    $.get('index.php?r=staff/get-staff-email', { Id : Id }, function(data){
        var data = $.parseJSON(data);
           $('#notifyemail-staff_email').attr('value',data.staff_email)
           $('#notifyemail-staff_email').attr('readonly',true)
    });

});

JS;
$this->registerJs($script);
?>

</div>
