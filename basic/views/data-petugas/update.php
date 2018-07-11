<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataPetugas */

$this->title = 'Update Data Petugas: ' . $model->ID_PETUGAS;
$this->params['breadcrumbs'][] = ['label' => 'Data Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PETUGAS, 'url' => ['view', 'id' => $model->ID_PETUGAS]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-petugas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
