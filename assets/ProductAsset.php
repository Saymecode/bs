<?php
/**
 * Created by PhpStorm.
 * User: Place
 * Date: 27.11.2016
 * Time: 14:26
 */

namespace app\assets;
use yii\web\AssetBundle;


class ProductAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
        'js/description.js',
    ];
    public $css = [
        'css/flexslider.css',
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
    public $jsOptions = [
        'position' =>\yii\web\View::POS_END,
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}