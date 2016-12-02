<?php
/**
 * Created by PhpStorm.
 * User: Place
 * Date: 28.11.2016
 * Time: 11:47
 */

namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\Cart;

class CartController extends Controller
{
    public function actionCart(){
        /*@var $product Cart*/
        /*$idCartToDelete = Yii::$app->request->post('idCartToDelete');*/
        if($idCartToDelete = Yii::$app->request->post('idCartToDelete')) {
            Cart::deleteFromCartById($idCartToDelete);
        }
        return $this->render('cart');
    }
    public function actionOrder(){
        Cart::order();
        return $this->render('cart');
    }
}