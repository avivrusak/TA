<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataLokasiTpu */

$this->title = 'Update Data Lokasi Tpu: ' . $model->ID_TPU;
$this->params['breadcrumbs'][] = ['label' => 'Data Lokasi Tpus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_TPU, 'url' => ['view', 'id' => $model->ID_TPU]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-lokasi-tpu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
