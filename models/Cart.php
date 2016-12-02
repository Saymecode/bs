<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $idCart
 * @property integer $idUser
 * @property integer $idProduct
 * @property integer $isBought
 *
 * @property Product $idProduct0
 * @property User $idUser0
 */
class Cart extends \yii\db\ActiveRecord
{
    const IS_BOUGHT = 1;
    const NOT_BOUGHT = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUser', 'idProduct'], 'required'],
            [['idUser', 'idProduct', 'isBought'], 'integer'],
            [['idProduct'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['idProduct' => 'idProduct']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCart' => 'Id Cart',
            'idUser' => 'Id User',
            'idProduct' => 'Id Product',
            'isBought' => 'Is Bought',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct0()
    {
        return $this->hasOne(Product::className(), ['idProduct' => 'idProduct']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    public static function itemsInTheCart(){
        $items = Cart::getProducts();
        return count($items);
    }
    public static function priceInTheCart(){
        $items = Cart::getProducts();
        /* @var $item Cart*/
        /* @var $product Product*/
        $price = 0.0;
        foreach ($items as $item){
            $idProduct = $item->idProduct;
            $product = Product::findOne($idProduct);
            $price += $product->price;
        }
        return $price;
    }
    public static function getProducts(){
        $idUser = Yii::$app->user->id;
        $items = Cart::find()->where(['idUser'=>$idUser, 'isBought'=>0])->orderBy(['idCart' => SORT_DESC])->all();
        return $items;
    }
    public static function deleteFromCartById($idCartToDelete){
        /* @var $item Cart*/
        if($item = Cart::findOne($idCartToDelete)){
            $item->delete();
            return true;
        }
        else return false;
    }
    public static function order(){
        /* @var $item Cart*/
        $items = Cart::getProducts();

        foreach ($items as $item){
            $item->isBought = Cart::IS_BOUGHT;
            $item->save();
        }
    }
}
