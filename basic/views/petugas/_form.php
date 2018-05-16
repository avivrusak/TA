<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataPetugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-petugas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_PETUGAS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_TPU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAMA_PETUGAS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALAMAT_')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_TELP')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
