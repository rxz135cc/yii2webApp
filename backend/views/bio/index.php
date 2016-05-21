<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bio_id',
            'bio_name',
            'bio_place_num',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
