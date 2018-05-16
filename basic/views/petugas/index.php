<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Petugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-petugas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Data Petugas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PETUGAS',
            'ID_TPU',
            'NAMA_PETUGAS',
            'ALAMAT_',
            'NO_TELP',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
