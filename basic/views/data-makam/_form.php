<?php

use app\models\DataKomplek;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\DataMakam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-makam-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NO_MAKAM')->textInput(['maxlength' => true]) ?>

    <?php 
    	echo $form->field($model, 'ID_KOMPLEK')->widget(Select2::classname(), [
		    'data' => ArrayHelper::map(DataKomplek::find()->where(['ID_TPU' => Yii::$app->user->identity->ID_TPU])->all(), 'ID_KOMPLEK', 'nama_komplek'),
		    'language' => 'id',
		    'options' => ['placeholder' => 'Pilih komplek ...'],
		    'pluginOptions' => [
		        'allowClear' => true
		    ],
		])->label('Komplek');
    ?>

    <?= $form->field($model, 'LETAK_MAKAM')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
