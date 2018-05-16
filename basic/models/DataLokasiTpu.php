<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_lokasi_tpu".
 *
 * @property integer $ID_TPU
 * @property string $nama_lokasi
 * @property string $alamat_lokasi
 * @property string $jumlah_makam
 * @property string $luas_lahan
 * @property integer $harga_sewa
 * @property double $latitude
 * @property double $longitude
 *
 * @property DataAhliWaris[] $dataAhliWaris
 * @property DataMakam[] $dataMakams
 * @property DataPetugas[] $dataPetugas
 */
class DataLokasiTpu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_lokasi_tpu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['harga_sewa'], 'integer'],
            [['latitude', 'longitude'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['nama_lokasi'], 'string', 'max' => 50],
            [['alamat_lokasi'], 'string', 'max' => 100],
            [['jumlah_makam', 'luas_lahan'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TPU' => 'Id  Tpu',
            'nama_lokasi' => 'Nama Lokasi',
            'alamat_lokasi' => 'Alamat Lokasi',
            'jumlah_makam' => 'Jumlah Makam',
            'luas_lahan' => 'Luas Lahan',
            'harga_sewa' => 'Harga Sewa',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataAhliWaris()
    {
        return $this->hasMany(DataAhliWaris::className(), ['ID_TPU' => 'ID_TPU']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataMakams()
    {
        return $this->hasMany(DataMakam::className(), ['ID_TPU' => 'ID_TPU']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataPetugas()
    {
        return $this->hasMany(DataPetugas::className(), ['ID_TPU' => 'ID_TPU']);
    }
}
