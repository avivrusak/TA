<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataAhliWaris */

$this->title = $model->ID_AHLI_WARIS;
$this->params['breadcrumbs'][] = ['label' => 'Data Ahli Waris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-ahli-waris-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_AHLI_WARIS], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_AHLI_WARIS], [
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
            'ID_AHLI_WARIS',
            'ID_TPU',
            'ID_JENAZAH',
            'nama_ahli_waris',
            'alamat_w',
            'tempat_lahir_w',
            'tanggal_lahir_w',
            'no_telp',
            'jenis_kelamin_w',
            'tanggal_sewa',
            'habis_sewa',
        ],
    ]) ?>

</div>
