<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
?>
<div class="banner">
    <div class="container">
<!--        <script src="js/responsiveslides.min.js"></script>-->

        <div id="top" class="callbacks_container">
            <ul class="rslides" id="slider">
                <li>

                    <div class="banner-text">
                        <h3>Lorem Ipsum is not simply dummy </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a
                            Latin professor .</p>
                        <a href="single.html">Learn More</a>
                    </div>

                </li>
                <li>

                    <div class="banner-text">
                        <h3>There are many variations </h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a
                            Latin professor .</p>
                        <a href="single.html">Learn More</a>

                    </div>

                </li>
                <li>
                    <div class="banner-text">
                        <h3>Sed ut perspiciatis unde omnis</h3>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a
                            Latin professor .</p>
                        <a href="single.html">Learn More</a>

                    </div>

                </li>
            </ul>
        </div>

    </div>
</div>
<?php Pjax::begin();?>
<!--content-->
<div class="content">
    <div class="container">
        <div class="content-top">
            <h1>NEW RELEASED</h1>
            <div class="filter">
                <ul style="list-style: none;">
                    <li><?= Html::a('Horror', ['site/filter', 'id'=>'horror']); ?></li>
                    <li><?=Html::a('Drama', ['site/filter', 'id'=>'drama']);?></li>
                </ul>
            </div>
            <div class="grid-in">
                <?php
                foreach ($products as $product):?>
                    <div class="col-md-4 grid-top">
                        <a href="<?=Url::to(['/product/description', 'id' => $product->idProduct])?>" class="b-link-stripe b-animate-go  thickbox"><?= Html::img('@web/images/'.$product->img.'.jpg', ['alt'=>'', 'class'=>'img-responsive']);?>
                            <div class="b-wrapper">
                                <h3 class="b-animate b-from-left    b-delay03 ">
                                    <span>$<?=$product->price?></span>
                                </h3>
                            </div>
                        </a>


                        <p><?=Html::a("$product->name", ['product/description']);?></p>
                    </div>
                <?php endforeach;?>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!---->
</div>
<div class="pagenator"><?=LinkPager::widget(['pagination'=>$pagination, 'prevPageLabel'=>'&laquo; prev', 'nextPageLabel'=>'next &raquo;']); ?></div>
<?php Pjax::end();?>