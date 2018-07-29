<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataPetugas */

$this->title = 'Update Data Petugas: ' . $model->NAMA_PETUGAS;
$this->params['breadcrumbs'][] = ['label' => 'Data Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PETUGAS, 'url' => ['view', 'id' => $model->ID_PETUGAS]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-petugas-update">

    <?= $this->render('_form', [
        'model' => $model,
        'arTPU'=>$arTPU
    ]) ?>

</div>
