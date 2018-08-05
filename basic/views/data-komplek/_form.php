<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\DataKomplek */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-komplek-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    	echo $form->field($model, 'agama')->widget(Select2::classname(), [
		    'data' => ['Islam' => 'Islam', 'Kristen' => 'kristen', 'Hindu' => 'Hindu', 'Budha' => 'Budha'],
		    'language' => 'id',
		    'options' => ['placeholder' => 'Pilih Agama ...'],
		    'pluginOptions' => [
		        'allowClear' => true
		    ],
		])->label('No Makam');
    ?>

    <?= $form->field($model, 'nama_komplek')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
