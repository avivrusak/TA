<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_ahli_waris".
 *
 * @property string $ID_AHLI_WARIS
 * @property string $ID_TPU
 * @property string $ID_JENAZAH
 * @property string $NAMA_AHLI_WARIS
 * @property string $ALAMAT
 * @property string $NO_TELP
 * @property string $JENIS_KELAMIN_
 * @property string $TANGGAL_SEWA
 * @property string $HABIS_SEWA
 *
 * @property DataJenazah $iDJENAZAH
 * @property DataLokasiTpu $iDTPU
 * @property DataJenazah[] $dataJenazahs
 */
class DataAhliWaris extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_ahli_waris';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_AHLI_WARIS'], 'required'],
            [['TANGGAL_SEWA', 'HABIS_SEWA'], 'safe'],
            [['ID_AHLI_WARIS', 'ID_TPU'], 'string', 'max' => 5],
            [['ID_JENAZAH', 'NAMA_AHLI_WARIS', 'ALAMAT'], 'string', 'max' => 50],
            [['NO_TELP'], 'string', 'max' => 12],
            [['JENIS_KELAMIN_'], 'string', 'max' => 10],
            [['ID_AHLI_WARIS'], 'unique'],
            [['ID_JENAZAH'], 'exist', 'skipOnError' => true, 'targetClass' => DataJenazah::className(), 'targetAttribute' => ['ID_JENAZAH' => 'ID_JENAZAH']],
            [['ID_TPU'], 'exist', 'skipOnError' => true, 'targetClass' => DataLokasiTpu::className(), 'targetAttribute' => ['ID_TPU' => 'ID_TPU']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_AHLI_WARIS' => 'Id  Ahli  Waris',
            'ID_TPU' => 'Id  Tpu',
            'ID_JENAZAH' => 'Id  Jenazah',
            'NAMA_AHLI_WARIS' => 'Nama  Ahli  Waris',
            'ALAMAT' => 'Alamat',
            'NO_TELP' => 'No  Telp',
            'JENIS_KELAMIN_' => 'Jenis  Kelamin',
            'TANGGAL_SEWA' => 'Tanggal  Sewa',
            'HABIS_SEWA' => 'Habis  Sewa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDJENAZAH()
    {
        return $this->hasOne(DataJenazah::className(), ['ID_JENAZAH' => 'ID_JENAZAH']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDTPU()
    {
        return $this->hasOne(DataLokasiTpu::className(), ['ID_TPU' => 'ID_TPU']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataJenazahs()
    {
        return $this->hasMany(DataJenazah::className(), ['ID_AHLI_WARIS' => 'ID_AHLI_WARIS']);
    }
}
