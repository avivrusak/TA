<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataLokasiTpu */

$this->title = $model->ID_TPU;
$this->params['breadcrumbs'][] = ['label' => 'Data Lokasi Tpus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-lokasi-tpu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_TPU], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_TPU], [
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
            'ID_TPU',
            'nama_lokasi',
            'alamat_lokasi:ntext',
            'jumlah_makam',
            'luas_lahan',
            'harga_sewa',
            'latitude',
            'longitude',
        ],
    ]) ?>

</div>
