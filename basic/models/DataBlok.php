<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_blok".
 *
 * @property integer $ID_BLOK
 * @property integer $ID_TPU
 * @property string $nama
 * @property integer $jumlah
 *
 * @property DataLokasiTpu $iDTPU
 */
class DataBlok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_blok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_TPU', 'nama', 'jumlah'], 'required'],
            [['ID_TPU', 'jumlah'], 'integer'],
            [['nama'], 'string', 'max' => 10],
            [['ID_TPU'], 'exist', 'skipOnError' => true, 'targetClass' => DataLokasiTpu::className(), 'targetAttribute' => ['ID_TPU' => 'ID_TPU']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_BLOK' => Yii::t('app', 'Id  Blok'),
            'ID_TPU' => Yii::t('app', 'Id  Tpu'),
            'nama' => Yii::t('app', 'Nama'),
            'jumlah' => Yii::t('app', 'Jumlah'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDTPU()
    {
        return $this->hasOne(DataLokasiTpu::className(), ['ID_TPU' => 'ID_TPU']);
    }

    public function getDataKompleks()
    {
        return $this->hasMany(DataKomplek::className(), ['ID_BLOK' => 'ID_BLOK']);
    }

    public function getCountJenazah()
    {
        $totalJenazah = 0;

        foreach ($this->dataKompleks as $key => $value) {
            $totalJenazah += $value->CountJenzah;
            // $totalJenazah += $cnt;
        }
        return $totalJenazah;
    }
}
