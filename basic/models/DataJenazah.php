<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_jenazah".
 *
 * @property string $ID_JENAZAH
 * @property string $ID_AHLI_WARIS
 * @property string $NAMA_JENAZAH
 * @property string $ALAMAT_
 * @property string $TANGGAL_LAHIR_
 * @property string $JENIS_KELAMIN
 *
 * @property DataAhliWaris[] $dataAhliWaris
 * @property DataAhliWaris $iDAHLIWARIS
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
            [['ID_JENAZAH'], 'required'],
            [['TANGGAL_LAHIR_'], 'safe'],
            [['ID_JENAZAH', 'NAMA_JENAZAH', 'ALAMAT_'], 'string', 'max' => 50],
            [['ID_AHLI_WARIS'], 'string', 'max' => 5],
            [['JENIS_KELAMIN'], 'string', 'max' => 10],
            [['ID_JENAZAH'], 'unique'],
            [['ID_AHLI_WARIS'], 'exist', 'skipOnError' => true, 'targetClass' => DataAhliWaris::className(), 'targetAttribute' => ['ID_AHLI_WARIS' => 'ID_AHLI_WARIS']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_JENAZAH' => 'Id  Jenazah',
            'ID_AHLI_WARIS' => 'Id  Ahli  Waris',
            'NAMA_JENAZAH' => 'Nama  Jenazah',
            'ALAMAT_' => 'Alamat',
            'TANGGAL_LAHIR_' => 'Tanggal  Lahir',
            'JENIS_KELAMIN' => 'Jenis  Kelamin',
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
    public function getIDAHLIWARIS()
    {
        return $this->hasOne(DataAhliWaris::className(), ['ID_AHLI_WARIS' => 'ID_AHLI_WARIS']);
    }
}
