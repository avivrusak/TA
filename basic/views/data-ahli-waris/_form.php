<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataAhliWaris */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-ahli-waris-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_AHLI_WARIS')->textInput() ?>

    <?= $form->field($model, 'ID_TPU')->textInput() ?>

    <?= $form->field($model, 'ID_JENAZAH')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
