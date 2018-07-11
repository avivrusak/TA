<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataMakam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-makam-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NO_MAKAM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LETAK_MAKAM')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
