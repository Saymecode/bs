<?php
/*@var $category Category*/
namespace app\models;

use yii\db\ActiveRecord;



class Product extends ActiveRecord
{
    public static function getProductsByCategory($category){
        $category = Category::findOne(['name'=>$category]);
        $idCategory = $category->idCategory;
        $products = Product::find()->where(['idCategory' => $idCategory]);
        return $products;
    }
    public static function getProductById($id){
        return Product::findOne($id);
    }
    public function getImages(){
        $imgs = explode(' ', $this->images);

        return $imgs;
    }
}