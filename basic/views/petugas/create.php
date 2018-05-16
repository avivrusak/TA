<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DataPetugas */

$this->title = 'Create Data Petugas';
$this->params['breadcrumbs'][] = ['label' => 'Data Petugas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-petugas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
