<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\DataJenazah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-jenazah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
    	echo $form->field($model, 'ID_MAKAM')->widget(Select2::classname(), [
		    'data' => $arMakam,
		    'language' => 'id',
		    'options' => ['placeholder' => 'Pilih Makam ...'],
		    'pluginOptions' => [
		        'allowClear' => true
		    ],
		])->label('No Makam');
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
