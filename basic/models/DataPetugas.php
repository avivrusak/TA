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
class DataPetugas extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            [['username','password', 'NAMA_PETUGAS', 'ALAMAT_'], 'required'],
            [['ID_TPU'], 'string', 'max' => 5],
            [['rule'], 'integer'],
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

    public static function findIdentity($id)
    {

        // $user = Login::findOne($id); 
        // if(count($user)){
            return static::findOne($id);
        // }
        // return null;

        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        $user = Login::find()->where(['accessToken'=>$token])->one(); 
        if(count($user)){
            return new static($user);
        }
        return null;

        // foreach (self::$users as $user) {
        //     if ($user['accessToken'] === $token) {
        //         return new static($user);
        //     }
        // }

        // return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

        $user = self::find()->where(['username'=>$username])->one(); 
        // if(count($user)){
            return new static($user);
        // }
        // return null;
        
        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }

        // return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->ID_PETUGAS;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return null;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
