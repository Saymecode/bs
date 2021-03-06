<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\FontAsset;
use yii\helpers\Url;
use yii\web\User;
use yii\widgets\Pjax;
use app\models\Cart;
use yii\widgets\ActiveForm;
use app\models\SearchForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?=Html::csrfMetaTags();?>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?php FontAsset::register($this); ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<!--header-->
<div class="header">
    <div class="header-top">
        <div class="container">
            <?php if(Yii::$app->controller->id==Yii::$app->params['mainController']):?>
            <div class="search">
                <?php $form = ActiveForm::begin([
                    'action' => ['site/search'],
                ]);
                $model = new SearchForm();
                ?>
                <?=Html::activeTextInput($model, 'str', ['placeholder'=>'Product name']); ?>
                <!--<?= $form->field($model, 'str')->label(false) ?> -->

                <?= Html::submitInput('Go', ['class' => '', 'name'=>'Search']) ?>
                <?php ActiveForm::end(); ?>
            </div>
            <?php endif;?>
            <div class="header-left">
                <ul>
                    <?php if(!Yii::$app->user->isGuest):?>
                        <?php $id = Yii::$app->user->id; $user = \app\models\User::findIdentity($id); ?>
                    <li ><?=Html::a("Logout($user->username)", ['/site/logout'], [
                            'data' => [
                                'method' => 'post',
                            ]
                        ]);?></li>
                    <?php else:?>
                    <li ><?=Html::a('Login', ['/site/login'])?></li>
                    <li><?=Html::a('Register', ['/site/reg'])?></li>
                    <?php endif;?>

                </ul>
                <div class="cart box_1">
                    <a href="<?=Url::to(['/cart/cart'])?>">
                        <h3> <div class="total">
                                <span><?=Cart::priceInTheCart()?></span> (<span id="simpleCart_quantity"><?=Cart::itemsInTheCart()?></span> items)</div>
                            <?= Html::img('@web/images/cart.png');?></h3>
                    </a>
                    <?php if(!Cart::itemsInTheCart()): ?> <p><a href="#" class="simpleCart_empty">Empty Cart</a></p> <?php endif;?>

                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="container">
        <div class="head-top">
            <div class="logo">
                <a href="<?=Url::to(Yii::$app->homeUrl)?>"><?= Html::img('@web/images/logo.png');?> </a>
            </div>
            <div class=" h_menu4">
                <ul class="memenu skyblue">
                    <li class="active grid"><?=Html::a("Home", Yii::$app->homeUrl)?></li>
                    <li><?=Html::a('Blog', ['blog/blog'], ['class'=>'color4'])?></li>
                    <li><?=Html::a('Conact', ['contact/contact'], ['class'=>'color6'])?></li>
                </ul>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>

</div>

        <?= $content ?>

<div class="footer">
    <div class="footer-class">
        <p >© 2016 New store All Rights Reserved | Saymecode </p>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
