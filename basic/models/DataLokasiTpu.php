<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_lokasi_tpu".
 *
 * @property integer $ID_TPU
 * @property string $nama_lokasi
 * @property string $alamat_lokasi
 * @property integer $jumlah_makam
 * @property integer $luas_lahan
 * @property integer $harga_sewa
 * @property double $latitude
 * @property double $longitude
 *
 * @property DataKomplek[] $dataKompleks
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
            [['alamat_lokasi'], 'string'],
            [['jumlah_makam', 'luas_lahan', 'harga_sewa'], 'integer'],
            [['latitude', 'longitude'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['nama_lokasi'], 'string', 'max' => 50],
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
    public function getDataKompleks()
    {
        return $this->hasMany(DataKomplek::className(), ['ID_TPU' => 'ID_TPU']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataPetugas()
    {
        return $this->hasMany(DataPetugas::className(), ['ID_TPU' => 'ID_TPU']);
    }
}
