<?php
use app\assets\ProductAsset;
use app\models\Product;
use yii\helpers\Url;
use yii\helpers\Html;

ProductAsset::register($this);

/* @var $product Product */
?>
        <div class="col-md-10 product-price1">
            <div class="col-md-5 single-top">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="<?=Url::to("@web/images/$imgs[0].jpg")?>">
                            <?= Html::img("@web/images/$imgs[0].jpg");?>
                        </li>
                        <li data-thumb="<?=Url::to("@web/images/$imgs[1].jpg")?>">
                            <?= Html::img("@web/images/$imgs[1].jpg");?>
                        </li>
                        <li data-thumb="<?=Url::to("@web/images/$imgs[2].jpg")?>">
                            <?= Html::img("@web/images/$imgs[2].jpg");?>
                        </li>
                        <li data-thumb="<?=Url::to("@web/images/$imgs[3].jpg")?>">
                            <?= Html::img("@web/images/$imgs[3].jpg");?>
                        </li>
                    </ul>
                </div>
                <!-- FlexSlider -->
            </div>
            <div class="col-md-7 single-top-in simpleCart_shelfItem">
                <div class="single-para ">
                    <h4><?=$product->name?></h4>
                    <div class="star-on">
                        <ul class="star-footer">
                            <?php
                                for($i=0; $i<$product->evaluation; $i++){
                                    echo "<li><a href='#'><i> </i></a></li>";
                                }
                            ?>

                        </ul>
                        <div class="review">
                            <a href="#"> 1 customer review </a>

                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <h5 class="item_price">$<?=$product->price?></h5>
                    <?=Html::a('ADD TO CART', ['product/description', 'id'=>$product->idProduct, 'idToCart'=>$product->idProduct], ['class'=>'add-cart item_add'])?>
                    <p><?=$product->text?> </p>

                </div>
            </div>
            <div class="clearfix"> </div>
            <!---->
            <div class="cd-tabs">
                <nav>
                    <ul class="cd-tabs-navigation">
                        <li><a data-content="fashion"  href="#0">Description </a></li>
                        <li><a data-content="cinema" href="#0" >Addtional Informatioan</a></li>
                        <li><a data-content="television" href="#0" class="selected ">Reviews (1)</a></li>

                    </ul>
                </nav>
                <ul class="cd-tabs-content">
                    <li data-content="fashion" >
                        <div class="facts">
                            <p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
                            <ul>
                                <li>Research</li>
                                <li>Design and Development</li>
                                <li>Porting and Optimization</li>
                                <li>System integration</li>
                                <li>Verification, Validation and Testing</li>
                                <li>Maintenance and Support</li>
                            </ul>
                        </div>

                    </li>
                    <li data-content="cinema" >
                        <div class="facts1">

                            <div class="color"><p>Color</p>
                                <span >Blue, Black, Red</span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="color">
                                <p>Size</p>
                                <span >S, M, L, XL</span>
                                <div class="clearfix"></div>
                            </div>

                        </div>

                    </li>
                    <li data-content="television" class="selected">
                        <div class="comments-top-top">
                            <div class="top-comment-left">
                                <?=Html::img('@web/images/co.png', ['class'=>"img-responsive"])?>
                            </div>
                            <div class="top-comment-right">
                                <h6><a href="#">Hendri</a> - September 3, 2014</h6>
                                <ul class="star-footer">
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                </ul>
                                <p>Wow nice!</p>
                            </div>
                            <div class="clearfix"> </div>
                            <a class="add-re" href="#">ADD REVIEW</a>
                        </div>

                    </li>
                    <div class="clearfix"></div>
                </ul>
            </div>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>
<!--//content-->