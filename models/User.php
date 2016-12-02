<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $forean
 * @property string $email
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{

    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 10;

    public $password;

    /**
     * User constructor.
     * @param int $id
     * @param string $username
     * @param string $forean
     * @param string $email
     * @param string $password_hash
     * @param int $status
     * @param string $auth_key
     * @param int $created_at
     * @param int $updated_at
     */

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'forename', 'email', 'password'], 'filter', 'filter'=>'trim'],
            [['username', 'forename', 'email', 'status'], 'required'],
            ['email','email'],
            ['username', 'string', 'min'=>2, 'max'=>255],
            ['forename', 'string', 'min'=>2, 'max'=>255],
            ['password', 'required', 'on'=>'create'],
            ['username', 'unique', 'message'=>'This name is busy'],
            ['email', 'unique', 'message'=>'This email is busy'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'forename' => 'Forename',
            'email' => 'Email',
            'password' => 'Password Hash',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    /* Behaviors */
    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }
    /* Behaviors */

    /* Search*/
    public static function findByUsername($username){
        return static::findOne([
           'username'=>$username
        ]);
    }
    /* Search*/

    /* Helpers */
    public function setPassword($password){
        $ph = Yii::$app->security->generatePasswordHash($password);
        $this->password_hash = $ph;
    }
    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    /* Helpers */

    /*Autentification*/
    public static function findIdentity($id)
    {
        return static::findOne(['id'=>$id, 'status'=>self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
    /*Autentification*/

}
