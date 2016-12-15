<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoginForm */
/* @var $form ActiveForm */
?>
<div class="container login-container">
    <div class="account">
        <h1>Account</h1>
        <div class="account-pass">
            <div class="col-md-8 account-top">
                <?php
                if (!$isLogined) echo "User is not defined";
                ?>
                <?php $form = ActiveForm::begin(
                    [
                        'id' => '',
                        'fieldConfig' => [
                            'options' => [
                                'tag' => false,
                            ],
                        ],
                    ]
                ); ?>
                <div>
                    <span>Login</span>
                    <?= $form->field($model, 'username')->textInput(['class'=>''])->label(false) ?>
                </div>
                <div>
                    <span>Password</span>
                    <?= $form->field($model, 'password')->passwordInput(['class'=>''])->label(false) ?>
                </div>

                <?= Html::submitInput('Login'); ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>

</div>

