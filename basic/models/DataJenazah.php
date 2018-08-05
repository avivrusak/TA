<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_jenazah".
 *
 * @property integer $ID_JENAZAH
 * @property integer $ID_MAKAM
 * @property integer $ID_TPU
 * @property string $nama_jenazah
 * @property integer $NIK
 * @property string $alamat
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $tgl_pemakaman
 *
 * @property DataAhliWaris[] $dataAhliWaris
 * @property DataMakam $iDMAKAM
 * @property DataLokasiTpu $iDTPU
 */
class DataJenazah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_jenazah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_MAKAM', 'ID_TPU', 'NIK'], 'integer'],
            [['ID_TPU', 'NIK', 'tempat_lahir', 'tgl_pemakaman'], 'required'],
            [['tanggal_lahir', 'tgl_pemakaman'], 'safe'],
            [['nama_jenazah', 'alamat'], 'string', 'max' => 50],
            [['tempat_lahir', 'jenis_kelamin'], 'string', 'max' => 10],
            [['ID_MAKAM'], 'exist', 'skipOnError' => true, 'targetClass' => DataMakam::className(), 'targetAttribute' => ['ID_MAKAM' => 'ID_MAKAM']],
            [['ID_TPU'], 'exist', 'skipOnError' => true, 'targetClass' => DataLokasiTpu::className(), 'targetAttribute' => ['ID_TPU' => 'ID_TPU']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_JENAZAH' => 'Id  Jenazah',
            'ID_MAKAM' => 'Id  Makam',
            'ID_TPU' => 'Id  Tpu',
            'nama_jenazah' => 'Nama Jenazah',
            'NIK' => 'Nik',
            'alamat' => 'Alamat',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tgl_pemakaman' => 'Tgl Pemakaman',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataAhliWaris()
    {
        return $this->hasMany(DataAhliWaris::className(), ['ID_JENAZAH' => 'ID_JENAZAH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDMAKAM()
    {
        return $this->hasOne(DataMakam::className(), ['ID_MAKAM' => 'ID_MAKAM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDTPU()
    {
        return $this->hasOne(DataLokasiTpu::className(), ['ID_TPU' => 'ID_TPU']);
    }
}
