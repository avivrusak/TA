<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Blok';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-blok-index">
    <p>
        <?= Html::a('Create Data Blok', ['create', 'idTpu'=>Yii::$app->user->identity->ID_TPU], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],   
            'nama',
            'jumlah',
            [
                'label'=>'Yang Terisi',
                'value'=>function($model){
                    return $model->countJenazah;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
