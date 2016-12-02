<?php
/**
 * Created by PhpStorm.
 * User: Place
 * Date: 26.11.2016
 * Time: 20:35
 */

namespace app\controllers;

use app\models\Cart;
use Yii;
use yii\base\Controller;
use app\models\Product;
use yii\web\User;

class ProductController extends Controller
{

    public function actionDescription(){
        $id = Yii::$app->request->get('id');
        $product = Product::getProductById($id);
        $imgs = $product->getImages();
        if(Yii::$app->request->get('idToCart')) $this->insertToCart($id);
        return $this->render('description', compact('product', 'imgs'));
    }
    public function actionToCart(){

        return $this->render('description', compact('count'));
    }
    private function insertToCart($idProduct){
        $idUser = Yii::$app->user->id;
        $cart = Cart::find()->where(['idUser'=>$idUser, 'idProduct'=>$idProduct, 'isBought'=>0])->all();
        if(!count($cart)) {
            $cart = new Cart();
            $cart->idUser = $idUser;
            $cart->idProduct = $idProduct;
            $cart->isBought = 0;
            $cart->save();
        }
    }

}