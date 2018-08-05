<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kompleks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-komplek-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Data Komplek', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_KOMPLEK',
            'ID_TPU',
            'agama',
            'nama_komplek',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
