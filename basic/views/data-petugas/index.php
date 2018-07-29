<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Petugas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-petugas-index">
    <p>
        <?= Html::a('Create Data Petugas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'ID_TPU',
                'label'=>'Nama TPU',
                'value'=>function($model){
                    return $model->iDTPU->nama_lokasi;
                }
            ],
            'NAMA_PETUGAS',
            'ALAMAT_',
            'NO_TELP',
            // 'password',
            // 'rule',
            // 'username',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update}'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
