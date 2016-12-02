<?php
/**
 * Created by PhpStorm.
 * User: Place
 * Date: 02.12.2016
 * Time: 16:31
 */

namespace app\models;


use yii\base\Model;

class SearchForm extends Model
{
    public $str;

    public function rules(){
        return[
            ['str','required', 'on'=>'default'],
            ['str', 'string', 'min'=>2, 'max'=>255],
        ];
    }
    public function attributeLabels()
    {
        return
            [
                'str' =>  '',
            ];
    }

}