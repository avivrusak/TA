<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataMakam */

$this->title = 'Update Data Makam: ' . Yii::$app->user->identity->ID_TPU;
$this->params['breadcrumbs'][] = ['label' => 'Data Makam', 'url' => ['index', 'id'=>Yii::$app->user->identity->ID_TPU]];
// $this->params['breadcrumbs'][] = ['label' => $model->NO_MAKAM, 'url' => ['view', 'id' => $model->ID_MAKAM]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-makam-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
