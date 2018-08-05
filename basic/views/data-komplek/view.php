<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataKomplek */

$this->title = $model->ID_KOMPLEK;
$this->params['breadcrumbs'][] = ['label' => 'Data Kompleks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-komplek-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_KOMPLEK], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_KOMPLEK], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_KOMPLEK',
            'ID_TPU',
            'agama',
            'nama_komplek',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NO_MAKAM',
            'LETAK_MAKAM',
        ],
    ]); ?>

</div>
