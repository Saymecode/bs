<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */
/* @var $form ActiveForm */
?>
<div class="contact">

    <div class="container">
        <h1>Contact</h1>
        <div class="contact-form">

            <div class="col-md-8 contact-grid">
                <?php $form = ActiveForm::begin([
                    'action' => ['contact/contact']
                ]); ?>

                <?= $form->field($model, 'name')->label(false)->textInput(['class'=>'', 'placeholder'=>'Name']) ?>
                <?= $form->field($model, 'email')->label(false)->textInput(['class'=>'', 'placeholder'=>'Email']) ?>
                <?= $form->field($model, 'title')->label(false)->textInput(['class'=>'', 'placeholder'=>'Subject']) ?>
                <?= $form->field($model, 'text')->label(false)->textarea(['class'=>'', 'placeholder'=>'Message'])?>

                <div class="send">
                    <?= Html::submitInput('Send', ['class' => '', 'name'=>'Feedback']) ?>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-md-4 contact-in">

                <div class="address-more">
                    <h4>Address</h4>
                    <p>The company name,</p>
                    <p>Lorem ipsum dolor,</p>
                    <p>Glasglow Dr 40 Fe 72. </p>
                </div>
                <div class="address-more">
                    <h4>Address1</h4>
                    <p>Tel:1115550001</p>
                    <p>Fax:190-4509-494</p>
                    <p>Email:<a href="mailto:contact@example.com"> contact@example.com</a></p>
                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37494223.23909492!2d103!3d55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x453c569a896724fb%3A0x1409fdf86611f613!2sRussia!5e0!3m2!1sen!2sin!4v1415776049771"></iframe>
        </div>
    </div>

</div>