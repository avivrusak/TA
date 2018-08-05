<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataKomplek */

$this->title = 'Update Data Komplek: ' . $model->ID_KOMPLEK;
$this->params['breadcrumbs'][] = ['label' => 'Data Kompleks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_KOMPLEK, 'url' => ['view', 'id' => $model->ID_KOMPLEK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-komplek-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
