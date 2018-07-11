<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataJenazah */

$this->title = 'Update Data Jenazah: ' . $model->ID_JENAZAH;
$this->params['breadcrumbs'][] = ['label' => 'Data Jenazahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_JENAZAH, 'url' => ['view', 'id' => $model->ID_JENAZAH]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-jenazah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
