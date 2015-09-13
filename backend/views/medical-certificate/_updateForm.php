<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Student;
use backend\models\Clinic;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\MedicalCertificate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medical-certificate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mc_serial')->textInput(['maxlength' => true], ['value'=>'mc_serial']) ?>

    <?= $form->field($model, 'student_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Student::find()->all(),'student_id','student_matrix', 'program.program_name'),
            'language' => 'en',
            'options' => ['placeholder' => 'Insert Student Matrix Number', 'id' => 'matrixNumber'],
            'pluginOptions' => [
                'allowClear' => true
            ],
    ]); ?>

     <?php echo "<input type='text' name='show1' id='student_name' size='40' /> "; ?>

     <?php echo "<input type='text' name='show2' id='student_email' size='40' /> "; ?>

    <?= $form->field($model, 'mc_problem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mc_startdate')->textInput() ?>

    <?= $form->field($model, 'mc_enddate')->widget(
        DatePicker::className(), [
            // inline too, not bad
             'inline' => false, 
             // modify template for custom rendering
             //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
    ]);?>

    <?= $form->field($model, 'mc_appdate')->widget(
        DatePicker::className(), [
            // inline too, not bad
             'inline' => false, 
             // modify template for custom rendering
             //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
    ]);?>

    <?= $form->field($model, 'clinic_id')->dropDownList(
                ArrayHelper::map(Clinic::find()->all(), 'clinic_id', 'clinic_name'),
                ['prompt' => 'Select Clinic']
    ) ?>

    <?= $form->field($model, 'au_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$script = <<< JS
// your JS script

$( window ).load(function() {
  // Run code
   $('#medicalcertificate-mc_serial').attr('readonly',true)
   $('#medicalcertificate-mc_startdate').attr('readonly',true)
});

$('#matrixNumber').change(function(){
    var matrixId = $(this).val();
   
    $.get('index.php?r=student/get-program-email', { matrixId : matrixId }, function(data){
        var data = $.parseJSON(data);
           $('#student_name').attr('value',data.student_name)
           $('#student_name').attr('readonly',true)

           $('#student_email').attr('value',data.student_email)
           $('#student_email').attr('readonly',true)
    });
});

JS;
$this->registerJs($script);
?>

