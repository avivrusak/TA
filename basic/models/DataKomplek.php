<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_komplek".
 *
 * @property integer $ID_KOMPLEK
 * @property integer $ID_TPU
 * @property string $agama
 * @property string $nama_komplek
 *
 * @property DataLokasiTpu $iDTPU
 * @property DataMakam[] $dataMakams
 */
class DataKomplek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_komplek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TPU', 'agama', 'nama_komplek'], 'required'],
            [['ID_TPU'], 'integer'],
            [['agama'], 'string', 'max' => 20],
            [['nama_komplek'], 'string', 'max' => 30],
            [['ID_TPU'], 'exist', 'skipOnError' => true, 'targetClass' => DataLokasiTpu::className(), 'targetAttribute' => ['ID_TPU' => 'ID_TPU']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_KOMPLEK' => 'Id  Komplek',
            'ID_TPU' => 'Id  Tpu',
            'agama' => 'Agama',
            'nama_komplek' => 'Nama Komplek',
        ];
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
    public function getDataMakams()
    {
        return $this->hasMany(DataMakam::className(), ['ID_KOMPLEK' => 'ID_KOMPLEK']);
    }
}
