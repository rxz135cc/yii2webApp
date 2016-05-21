<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bio */

$this->title = 'Update Bio: ' . $model->bio_id;
$this->params['breadcrumbs'][] = ['label' => 'Bios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bio_id, 'url' => ['view', 'id' => $model->bio_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
