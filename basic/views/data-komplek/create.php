<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DataKomplek */

$this->title = 'Create Data Komplek';
$this->params['breadcrumbs'][] = ['label' => 'Data Kompleks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-komplek-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
