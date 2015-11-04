<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MedicalCertificate */

$this->title = 'Update Medical Certificate: ' . ' ' . $model->mc_id;
$this->params['breadcrumbs'][] = ['label' => 'Medical Certificates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mc_id, 'url' => ['view', 'id' => $model->mc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medical-certificate-update">

    <h1><?= Html::encode($this->title = 'Update Medical Certificate') ?></h1>

    <?= $this->render('_updateForm', [
        'model' => $model,
    ]) ?>

</div>
