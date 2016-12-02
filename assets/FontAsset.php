<?php
/**
 * Created by PhpStorm.
 * User: Place
 * Date: 18.11.2016
 * Time: 22:58
 */

namespace app\assets;


use yii\web\AssetBundle;

class FontAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900',
        '//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900',
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}