<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\MedicalCertificate */

$this->title = 'Medical Certificate Details';
$this->params['breadcrumbs'][] = ['label' => 'Medical Certificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medical-certificate-view">
    

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mc_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mc_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('<i class="fa glyphicon glyphicon-hand-down"></i> Print This', Url::current(), [
                    'class'=>'btn btn-success', 'id' => 'btnPrint',
        ]) ?>
        <?= Html::a('<i class="fa glyphicon glyphicon-envelope"></i> Send Email', Url::to(['notify-email/get-medical-record', 'mc_id' => $model->mc_id]), [
                    'class'=>'btn btn-success',
        ]) ?>
    </p>
    
<div id="dvContainer">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mc_serial',
            'student.student_matrix',
            'student.student_name',
            [
             'attribute' => 'student.program.program_name',
             'label' => 'Program'
            ],
            [
             'attribute' => 'student.program.faculty.faculty_name',
             'label' => 'Faculty'
            ],
            'mc_problem',
            'mc_startdate',
            'mc_enddate',
            'mc_appdate',
            [
             'attribute' => 'clinic.clinic_name',
             'label' => 'Produced By'
            ],
            [
             'attribute' => 'authorizer.staff.staff_name',
             'label'=>'Authorize By'
            ],
        ],
    ]) ?>
   </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Medical Certificate</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
</script>
