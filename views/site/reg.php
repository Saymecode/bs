<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
?>
<div class=" container">
    <div class=" register">
        <h1>Register</h1>

        <?php $form = ActiveForm::begin(); ?>
        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <?= Yii::$app->session->get('error'); ?>
        <?php endif; ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'forename') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>
