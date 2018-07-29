<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataPetugas */

$this->title = $model->NAMA_PETUGAS;
$this->params['breadcrumbs'][] = ['label' => 'Data Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-petugas-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_PETUGAS], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_PETUGAS], [
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
            // 'ID_PETUGAS',
            // 'ID_TPU',
            [
                'attribute'=>'ID_TPU',
                'label'=>'Nama TPU',
                'value'=>function($model){
                    return $model->iDTPU->nama_lokasi;
                }
            ],
            'NAMA_PETUGAS',
            'ALAMAT_',
            'NO_TELP',
            'password',
            // 'rule',
            [
                'attribute'=>'rule',
                'label' => 'Rule',
                'value'=>function($model){
                    if ($model->rule == 1) {
                        return 'Admin';
                    }else{
                        return 'Petugas';
                    }
                }
            ],
            'username',
        ],
    ]) ?>

</div>
