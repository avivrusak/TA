<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_komplek".
 *
 * @property integer $ID_KOMPLEK
 * @property integer $ID_BLOK
 * @property string $agama
 * @property string $nama_komplek
 *
 * @property DataBlok $iDBLOK
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
            [['agama', 'nama_komplek'], 'required'],
            [['ID_BLOK'], 'integer'],
            [['agama'], 'string', 'max' => 20],
            [['nama_komplek'], 'string', 'max' => 30],
            [['ID_BLOK'], 'exist', 'skipOnError' => true, 'targetClass' => DataBlok::className(), 'targetAttribute' => ['ID_BLOK' => 'ID_BLOK']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_KOMPLEK' => Yii::t('app', 'Id  Komplek'),
            'ID_BLOK' => Yii::t('app', 'Id  Blok'),
            'agama' => Yii::t('app', 'Agama'),
            'nama_komplek' => Yii::t('app', 'Nama Komplek'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDBLOK()
    {
        return $this->hasOne(DataBlok::className(), ['ID_BLOK' => 'ID_BLOK']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataMakams()
    {
        return $this->hasMany(DataMakam::className(), ['ID_KOMPLEK' => 'ID_KOMPLEK']);
    }

    public function getCountJenzah($value='')
    {
        // $array = array();
        $totalJenazah = 0;
        // return ;
        foreach ($this->dataMakams as $key => $value) {
            $cnt = count($value->dataJenazahs);
            $totalJenazah += $cnt;
        }
        return $totalJenazah;
    }
}
