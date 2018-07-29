<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\DataPetugas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-petugas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        echo $form->field($model, 'ID_TPU')->widget(Select2::classname(), [
            'data' => $arTPU,
            'language' => 'de',
            'options' => ['placeholder' => 'Select a state ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('No Makam');
    ?>

    <?= $form->field($model, 'NAMA_PETUGAS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALAMAT_')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_TELP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
