<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DataAhliWaris */

$this->title = 'Create Data Ahli Waris';
$this->params['breadcrumbs'][] = ['label' => 'Data Ahli Waris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-ahli-waris-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
