<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataLokasiTpu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-lokasi-tpu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_lokasi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_lokasi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'jumlah_makam')->textInput() ?>

    <?= $form->field($model, 'luas_lahan')->textInput() ?>

    <?= $form->field($model, 'harga_sewa')->textInput() ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
