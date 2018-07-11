<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataAhliWaris */

$this->title = 'Update Data Ahli Waris: ' . $model->ID_AHLI_WARIS;
$this->params['breadcrumbs'][] = ['label' => 'Data Ahli Waris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_AHLI_WARIS, 'url' => ['view', 'id' => $model->ID_AHLI_WARIS]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-ahli-waris-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
