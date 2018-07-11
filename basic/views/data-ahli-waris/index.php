<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Ahli Waris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-ahli-waris-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Data Ahli Waris', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_AHLI_WARIS',
            'ID_TPU',
            'ID_JENAZAH',
            'nama_ahli_waris',
            'alamat_w',
            // 'tempat_lahir_w',
            // 'tanggal_lahir_w',
            // 'no_telp',
            // 'jenis_kelamin_w',
            // 'tanggal_sewa',
            // 'habis_sewa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
