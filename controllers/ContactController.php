<?php
/**
 * Created by PhpStorm.
 * User: Place
 * Date: 01.12.2016
 * Time: 12:07
 */

namespace app\controllers;

use Yii;
use app\models\FeedbackForm;
use yii\web\Controller;


class ContactController extends Controller
{
    public function actionContact(){
        $model = new FeedbackForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $model->saveFeedback();
            return $this->goHome();
        }
        return $this->render('contact', ['model'=>$model]);
    }
}