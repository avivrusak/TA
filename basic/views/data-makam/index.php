<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Makam '.$namaTPU;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-makam-index">
    <?php if (Yii::$app->user->identity->rule == 2) { ?>
    <p>
        <?= Html::a('Create Data Makam', ['create', 'id'=>$id], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Input Data Jenazah', ['/data-jenazah/', 'id'=>$id, 'isInput'=>0], ['class' => 'btn btn-success']) ?>
        <?php $form = ActiveForm::begin(['action' => Yii::$app->homeUrl.'search']); ?>
        <?= Html::textInput('nama_jenazah',null ,['placeholder'=>'Nama Jenazah']); ?>
        <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </p>
    <?php } ?>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'NO_MAKAM',
            'LETAK_MAKAM',

            ['class' => 'yii\grid\ActionColumn',
                'header'=> '',
                'template'=>'{view} {update}',
                'buttons'=>[
                    'update'=>function($model, $url, $key){
                        if (Yii::$app->user->identity->rule == 2) {
                            $url = Url::toRoute(['update', 'id'=>$key]);
                            return Html::a('Update', $url, ['class' => 'btn btn-success']);
                        }
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = Yii::$app->homeUrl.'data-jenazah?id='.$model->ID_MAKAM.'&isInput=1';
                        return $url;
                    }

                    if ($action === 'update') {
                        $url =Yii::$app->homeUrl.'data-makam/update?id='.$model->ID_MAKAM;
                        return $url;
                    }

                  }
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
