<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\DataJenazah */

$this->title = $model->nama_jenazah;
$this->params['breadcrumbs'][] = ['label' => 'Data Jenazahs', 'url' => ['index', 'id'=>($model->id_makam == null) ? $model->ID_TPU : $model->id_makam, 'isInput'=> ($model->id_makam == null) ? 0 : 1]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-jenazah-view">
    <p>
        <?php if ($model->id_makam == null) { ?>
        <?= Html::a('Update', ['update', 'id' => $model->ID_JENAZAH], ['class' => 'btn btn-primary']) ?>
        <?php } ?>
        
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
                'attribute'=>'id_makam',
                'label' => 'No Makam',
                'value'=>function($model){
                    if ($model->id_makam != null) {
                        return $model->idMakam->NO_MAKAM;
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
