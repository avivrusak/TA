<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataBlok */

$this->title = 'Update Data Blok: ' . $model->ID_BLOK;
$this->params['breadcrumbs'][] = ['label' => 'Data Bloks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_BLOK, 'url' => ['view', 'id' => $model->ID_BLOK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-blok-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
