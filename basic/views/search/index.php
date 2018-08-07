<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Jenazahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-jenazah-index">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'ID_JENAZAH',
            'nama_jenazah',
            'alamat',
            'tempat_lahir',
            'tanggal_lahir',
            // 'ID_TPU',
            [
                'attribute'=>'ID_TPU',
                'label'=>'Nama TPU',
                'value'=>function($model){
                    return $model->iDTPU->nama_lokasi;
                }
            ],
            // 'jenis_kelamin',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=> '',
                'template'=>'{view}',
                'buttons'=>[
                    'update'=>function($url, $model, $key){
                        if ($model->id_makam==null) {
                            return Html::a('Update', $url, ['class' => 'btn btn-primary']);
                        }
                    },
                    'view'=>function($url, $model, $key){
                        // if ($model->id_makam==null) {
                            return Html::a('view', $url, ['class' => 'btn btn-primary']);
                        // }
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = Yii::$app->homeUrl.'data-jenazah/view?id='.$model->ID_JENAZAH;
                        return $url;
                    }

                    if ($action === 'update') {
                        $url =Yii::$app->homeUrl.'data-jenazah/update?id='.$model->ID_JENAZAH;
                        return $url;
                    }

                  }
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
