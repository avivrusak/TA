<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DataLokasiTpu */

$this->title = 'Create Data Lokasi Tpu';
$this->params['breadcrumbs'][] = ['label' => 'Data Lokasi Tpus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-lokasi-tpu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
