<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\DataBlok */

$this->title = $model->ID_BLOK;
$this->params['breadcrumbs'][] = ['label' => 'Data Bloks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-blok-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_BLOK], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_BLOK], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?=Html::a('Create Data Komplek', ['/data-komplek/create', 'idBlok'=>$model->ID_BLOK], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_BLOK',
            'ID_TPU',
            'nama',
            'jumlah',
        ],
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'agama',
            'nama_komplek',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = Yii::$app->homeUrl.'data-komplek/view?id='.$model->ID_KOMPLEK;
                        return $url;
                    }

                    if ($action === 'update') {
                        $url =Yii::$app->homeUrl.'data-komplek/update?id='.$model->ID_KOMPLEK;
                        return $url;
                    }

                  }
            ],
        ],
    ]); ?>

</div>
