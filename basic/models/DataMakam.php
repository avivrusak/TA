<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_makam".
 *
 * @property string $ID_MAKAM
 * @property string $ID_TPU
 * @property string $NO_MAKAM
 * @property string $LETAK_MAKAM
 *
 * @property DataLokasiTpu $iDTPU
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
            [['NO_MAKAM', 'LETAK_MAKAM'], 'required'],
            [['ID_MAKAM', 'ID_TPU', 'NO_MAKAM', 'LETAK_MAKAM'], 'string', 'max' => 100],
            // [['ID_MAKAM'], 'unique'],
            [['ID_TPU'], 'exist', 'skipOnError' => true, 'targetClass' => DataLokasiTpu::className(), 'targetAttribute' => ['ID_TPU' => 'ID_TPU']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_MAKAM' => 'Id  Makam',
            'ID_TPU' => 'Id  Tpu',
            'NO_MAKAM' => 'No  Makam',
            'LETAK_MAKAM' => 'Letak  Makam',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDTPU()
    {
        return $this->hasOne(DataLokasiTpu::className(), ['ID_TPU' => 'ID_TPU']);
    }

    public function getJenazah()
    {
        return $this->hasMany(DataJenazah::className(), ['id_makam' => 'ID_MAKAM']);
    }
}
