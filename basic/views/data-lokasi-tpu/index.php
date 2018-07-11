<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Lokasi Tpu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-lokasi-tpu-index">

    <p>
        <?= Html::a('Create Data Lokasi Tpu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'ID_TPU',
            'nama_lokasi',
            'alamat_lokasi:ntext',
            [
                'attribute'=>'jumlah_makam',
                'label'=>'Jumlah Makam',
                'value'=>function($model){
                    return number_format($model->jumlah_makam);
                }
            ],
            [
                'attribute'=>'luas_lahan',
                'label'=>'Luas Lahan',
                'value'=>function($model){
                    return number_format($model->luas_lahan);
                }
            ],
            [
                'attribute'=>'harga_sewa',
                'label'=>'Harga Sewa',
                'value'=>function($model){
                    return 'Rp '.number_format($model->harga_sewa);
                }
            ],
            // 'jumlah_makam',
            // 'luas_lahan',
            // 'harga_sewa',
            // 'latitude',
            // 'longitude',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=> '',
                'template'=>'{view} {update}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = Yii::$app->homeUrl.'data-makam?id='.$model->ID_TPU;
                        return $url;
                    }

                    if ($action === 'update') {
                        $url =Yii::$app->homeUrl.'data-lokasi-tpu/update?id='.$model->ID_TPU;
                        return $url;
                    }

                  }
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
