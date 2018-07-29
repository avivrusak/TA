<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_jenazah".
 *
 * @property integer $ID_JENAZAH
 * @property string $nama_jenazah
 * @property string $alamat
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property integer $id_makam
 *
 * @property DataAhliWaris[] $dataAhliWaris
 * @property DataMakam $idMakam
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
            [['tempat_lahir', 'id_makam'], 'required'],
            [['tanggal_lahir', 'tgl_pemakaman', 'ID_TPU'], 'safe'],
            [['id_makam', 'ID_TPU'], 'integer'],
            [['nama_jenazah', 'alamat'], 'string', 'max' => 50],
            [['tempat_lahir', 'jenis_kelamin'], 'string', 'max' => 10],
            // [['id_makam'], 'exist', 'skipOnError' => true, 'targetClass' => DataMakam::className(), 'targetAttribute' => ['id_makam' => 'ID_MAKAM']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_JENAZAH' => 'Id  Jenazah',
            'nama_jenazah' => 'Nama Jenazah',
            'alamat' => 'Alamat',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'id_makam' => 'Id Makam',
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
    public function getIdMakam()
    {
        return $this->hasOne(DataMakam::className(), ['ID_MAKAM' => 'id_makam']);
    }

    public function getTpu()
    {
        return $this->hasOne(DataLokasiTpu::className(), ['ID_TPU' => 'ID_TPU']);
    }
}
