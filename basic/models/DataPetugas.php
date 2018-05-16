<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_petugas".
 *
 * @property string $ID_PETUGAS
 * @property string $ID_TPU
 * @property string $NAMA_PETUGAS
 * @property string $ALAMAT_
 * @property string $NO_TELP
 *
 * @property DataLokasiTpu $iDTPU
 */
class DataPetugas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_petugas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PETUGAS'], 'required'],
            [['ID_PETUGAS', 'ID_TPU'], 'string', 'max' => 5],
            [['NAMA_PETUGAS', 'ALAMAT_'], 'string', 'max' => 50],
            [['NO_TELP'], 'string', 'max' => 12],
            [['ID_PETUGAS'], 'unique'],
            [['ID_TPU'], 'exist', 'skipOnError' => true, 'targetClass' => DataLokasiTpu::className(), 'targetAttribute' => ['ID_TPU' => 'ID_TPU']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PETUGAS' => 'Id  Petugas',
            'ID_TPU' => 'Id  Tpu',
            'NAMA_PETUGAS' => 'Nama  Petugas',
            'ALAMAT_' => 'Alamat',
            'NO_TELP' => 'No  Telp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDTPU()
    {
        return $this->hasOne(DataLokasiTpu::className(), ['ID_TPU' => 'ID_TPU']);
    }
}
