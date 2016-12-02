<?php
/**
 * Created by PhpStorm.
 * User: Place
 * Date: 01.12.2016
 * Time: 14:02
 */

namespace app\models;

use yii\helpers\Html;
use Yii;
use yii\base\Model;

class FeedbackForm extends Model
{
    public $name;
    public $email;
    public $title;
    public $text;

    public function rules(){
        return[
            [['name', 'email', 'title', 'text'],'required', 'on'=>'default'],
            ['name', 'string', 'min'=>2, 'max'=>255],
            ['text', 'string', 'min'=>2, 'max'=>255],
            ['email', 'string', 'min'=>5, 'max'=>255],
            ['email', 'email'],
            ['title', 'string', 'min'=>1, 'max'=>40],
        ];
    }
    public function attributeLabels()
    {
        return
            [
                'name' =>  'Name',
                'email' =>'',
                'title' =>'',
                'text' =>'',
            ];
    }
    public function saveFeedback(){
        $feedback = new Feedback();
        if(Yii::$app->user->id) $feedback->idUser = Yii::$app->user->id;
        $feedback->name = $this->name;
        $feedback->email = $this->email;
        $feedback->title = $this->title;
        $feedback->text = $this->text;
        return $feedback->save() ? $feedback : null;
    }
}