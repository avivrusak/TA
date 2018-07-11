<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DataJenazah */

$this->title = 'Create Data Jenazah';
$this->params['breadcrumbs'][] = ['label' => 'Data Jenazahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-jenazah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
