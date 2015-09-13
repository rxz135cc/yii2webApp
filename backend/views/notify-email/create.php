<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NotifyEmail */

$this->title = 'Create Notify Email';
$this->params['breadcrumbs'][] = ['label' => 'Notify Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notify-email-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
