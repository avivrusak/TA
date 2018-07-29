<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataJenazah */

$this->title = 'Input Makam Jenazah ' . $model->nama_jenazah;
$this->params['breadcrumbs'][] = ['label' => 'Data Jenazahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_JENAZAH, 'url' => ['view', 'id' => $model->ID_JENAZAH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-jenazah-update">

    <?= $this->render('_form', [
        'model' => $model,
        'arMakam'=>$arMakam
    ]) ?>

</div>
