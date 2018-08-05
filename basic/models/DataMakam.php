<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_makam".
 *
 * @property integer $ID_MAKAM
 * @property integer $ID_KOMPLEK
 * @property string $NO_MAKAM
 * @property string $LETAK_MAKAM
 *
 * @property DataJenazah[] $dataJenazahs
 * @property DataKomplek $iDKOMPLEK
 */
class DataMakam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_makam';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_KOMPLEK'], 'integer'],
            [['NO_MAKAM', 'LETAK_MAKAM'], 'string', 'max' => 100],
            [['ID_KOMPLEK'], 'exist', 'skipOnError' => true, 'targetClass' => DataKomplek::className(), 'targetAttribute' => ['ID_KOMPLEK' => 'ID_KOMPLEK']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_MAKAM' => 'Id  Makam',
            'ID_KOMPLEK' => 'Id  Komplek',
            'NO_MAKAM' => 'No  Makam',
            'LETAK_MAKAM' => 'Letak  Makam',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDataJenazahs()
    {
        return $this->hasMany(DataJenazah::className(), ['ID_MAKAM' => 'ID_MAKAM']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDKOMPLEK()
    {
        return $this->hasOne(DataKomplek::className(), ['ID_KOMPLEK' => 'ID_KOMPLEK']);
    }
}
