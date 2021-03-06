<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\DataJenazah */

$this->title = $model->nama_jenazah;
$this->params['breadcrumbs'][] = ['label' => 'Data Jenazahs', 'url' => ['index', 'id'=>($model->ID_MAKAM == null) ? $model->ID_TPU : $model->ID_MAKAM, 'isInput'=> ($model->ID_MAKAM == null) ? 0 : 1]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-jenazah-view">
    <p>
        <?php if ($model->ID_MAKAM == null) { ?>
        <?= Html::a('Update', ['update', 'id' => $model->ID_JENAZAH], ['class' => 'btn btn-primary']) ?>
        <?php } else {
            echo Html::a('Cetak tanda terima', ['cetak', 'id' => $model->ID_JENAZAH], ['class' => 'btn btn-primary']);
        }?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'ID_JENAZAH',
            'nama_jenazah',
            'alamat',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            [
                'attribute'=>'ID_MAKAM',
                'label' => 'No Makam',
                'value'=>function($model){
                    if ($model->ID_MAKAM != null) {
                        return $model->iDMAKAM->NO_MAKAM;
                    }
                }
            ]
        ],
    ]) ?>

    <hr>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'ID_AHLI_WARIS',
            // 'ID_TPU',
            // 'ID_JENAZAH',
            'nama_ahli_waris',
            'alamat_w',
            'tempat_lahir_w',
            'tanggal_lahir_w',
            'no_telp',
            'jenis_kelamin_w',
            'tanggal_sewa',
            'habis_sewa',
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
