<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Makams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-makam-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Data Makam', ['create', 'id'=>$id], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Input Data Jenazah', ['/data-jenazah/', 'id'=>$id, 'isInput'=>0], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'NO_MAKAM',
            'LETAK_MAKAM',

            ['class' => 'yii\grid\ActionColumn',
                'header'=> '',
                'template'=>'{view} {update}',
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
