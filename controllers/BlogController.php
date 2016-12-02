<?php
/**
 * Created by PhpStorm.
 * User: Place
 * Date: 01.12.2016
 * Time: 11:35
 */

namespace app\controllers;


use yii\base\Controller;

class BlogController extends Controller
{
    public function actionBlog(){
        return $this->render('blog');
    }
}