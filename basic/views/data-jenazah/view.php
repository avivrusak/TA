<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DataJenazah */

$this->title = $model->ID_JENAZAH;
$this->params['breadcrumbs'][] = ['label' => 'Data Jenazahs', 'url' => ['index', 'id'=>($model->id_makam == null) ? $model->ID_TPU : $model->id_makam, 'isInput'=> ($model->id_makam == null) ? 0 : 1]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-jenazah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_JENAZAH], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_JENAZAH], [
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
            'ID_JENAZAH',
            'nama_jenazah',
            'alamat',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
        ],
    ]) ?>

</div>
