<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NotifyEmail */

$this->title = 'Update Notify Email: ' . ' ' . $model->ne_id;
$this->params['breadcrumbs'][] = ['label' => 'Notify Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ne_id, 'url' => ['view', 'id' => $model->ne_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="notify-email-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
