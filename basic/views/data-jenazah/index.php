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
            // 'jenis_kelamin',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=> '',
                'template'=>'{view} {update}',
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
