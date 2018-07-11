<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_ahli_waris".
 *
 * @property integer $ID_AHLI_WARIS
 * @property integer $ID_JENAZAH
 * @property string $nama_ahli_waris
 * @property string $alamat_w
 * @property string $tempat_lahir_w
 * @property string $tanggal_lahir_w
 * @property string $no_telp
 * @property string $jenis_kelamin_w
 * @property string $tanggal_sewa
 * @property string $habis_sewa
 *
 * @property DataJenazah $iDJENAZAH
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
            [['ID_JENAZAH'], 'integer'],
            [['tempat_lahir_w', 'tanggal_lahir_w'], 'required'],
            [['tanggal_lahir_w', 'tanggal_sewa', 'habis_sewa'], 'safe'],
            [['nama_ahli_waris', 'alamat_w'], 'string', 'max' => 50],
            [['tempat_lahir_w', 'jenis_kelamin_w'], 'string', 'max' => 10],
            [['no_telp'], 'string', 'max' => 12],
            [['ID_JENAZAH'], 'exist', 'skipOnError' => true, 'targetClass' => DataJenazah::className(), 'targetAttribute' => ['ID_JENAZAH' => 'ID_JENAZAH']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_AHLI_WARIS' => 'Id  Ahli  Waris',
            'ID_JENAZAH' => 'Id  Jenazah',
            'nama_ahli_waris' => 'Nama Ahli Waris',
            'alamat_w' => 'Alamat W',
            'tempat_lahir_w' => 'Tempat Lahir W',
            'tanggal_lahir_w' => 'Tanggal Lahir W',
            'no_telp' => 'No Telp',
            'jenis_kelamin_w' => 'Jenis Kelamin W',
            'tanggal_sewa' => 'Tanggal Sewa',
            'habis_sewa' => 'Habis Sewa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDJENAZAH()
    {
        return $this->hasOne(DataJenazah::className(), ['ID_JENAZAH' => 'ID_JENAZAH']);
    }
}
