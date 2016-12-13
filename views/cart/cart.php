<?php
use app\models\Cart;
use app\models\Product;
use yii\helpers\Html;
use yii\widgets\Pjax;
use app\models\Category;

?>
<?php Pjax::begin(['id' => 'some-id-you-like', 'clientOptions' => ['method' => 'POST']]); ?>
    <div class="container">
        <div class="check">
            <h1>My Shopping Bag (<?=Cart::itemsInTheCart()?>)</h1>
            <div class="col-md-9 cart-items">
                <?php
                /*@var $product Cart*/
                /*@var $product Product*/
                $items = Cart::getProducts();
                if($items):
                    foreach ($items as $item):
                        $product = Product::findOne($item->idProduct);
                        ?>
                        <div class="cart-header">
                            <?= Html::a('', ['cart/cart'],
                                ['class' => 'close1',
                                    'data' => [
                                        'method' => 'post',
                                        'params' => [
                                            'idCartToDelete' => $item->idCart,
                                        ],

                                    ],
                                    'data-pjax' => 0,
                                ]) ?>
                            <div class="cart-sec simpleCart_shelfItem">
                                <div class="cart-item cyc">
                                    <?=Html::img("@web/images/$product->img.jpg", ['class'=>'img-responsive'])?>
                                </div>
                                <div class="cart-item-info">
                                    <h3>
                                        <a href="#"><?= $product->name ?></a><span>Category : <?= Category::findOne($product->idCategory)->name ?></span>
                                    </h3>
                                    <ul class="qty">
                                        <li><p>Price : <?= $product->price ?></p></li>
                                        <li><p>Description : <?= $product->quite ?></p></li>
                                    </ul>

                                    <div class="delivery">
                                        <p>Service Charges : 5.00</p>
                                        <span>Delivered in 2-3 bussiness days</span>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <?php

                    endforeach;

                ?>
            </div>
            <div class="col-md-3 cart-total">
                <div class="price-details">
                    <h3>Price Details</h3>
                    <span>Total</span>
                    <span class="total1"><?=Cart::priceInTheCart()?></span>
                    <span>Discount</span>
                    <span class="total1">---</span>
                    <span>Delivery Charges</span>
                    <span class="total1">5.00</span>
                    <div class="clearfix"></div>
                </div>
                <ul class="total_price">
                    <li class="last_price"><h4>TOTAL</h4></li>
                    <li class="last_price"><span><?=Cart::priceInTheCart() + 5?></span></li>
                    <div class="clearfix"></div>
                </ul>


                <div class="clearfix"></div>
                <?=Html::a('Place Order', ['cart/order'], ['class'=>'order'])?>
            </div>
            <?php endif;?>
            <div class="clearfix"></div>
        </div>
    </div>
<?php Pjax::end(); ?>