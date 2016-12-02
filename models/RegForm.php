<?php
/**
 * Created by PhpStorm.
 * User: Place
 * Date: 23.11.2016
 * Time: 12:43
 */

namespace app\models;

use yii\base\Model;

class RegForm extends Model
{
    public $username;
    public $forename;
    public $email;
    public $password;
    public $status;

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'forename'], 'filter', 'filter' => 'trim'],
            [['username', 'email', 'password', 'forename'],'required'],
            ['username', 'string', 'min'=>2, 'max'=>255],
            ['forename', 'string', 'min'=>2, 'max'=>255],
            ['password', 'string', 'min'=>6, 'max'=>255],
            ['username', 'unique',
                'targetClass'=>User::className(),
                'message'=>'This name is busy'
            ],
            ['email', 'email'],
            ['email', 'unique',
                'targetClass'=>User::className(),
                'message'=>'This email is busy'
            ],
            ['status', 'default',
                'value'=>User::STATUS_ACTIVE, 'on'=>'default'],
            ['status', 'in', 'range'=>[
                User::STATUS_NOT_ACTIVE,
                User::STATUS_ACTIVE,
            ]],

        ];
    }

    public function attributeLabels()
    {
        return
            [
                'username' => 'name of user',
                'forename' => 'forename',
                'email' => 'email',
                'password' => 'password'
            ];
    }
    public function reg(){
        $user = new User();
        $user->username = $this->username;
        $user->forename = $this->forename;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}