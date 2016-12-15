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
                    <p>Email:<a href="mailto:Saymecode@yahoo.com">Saymecode@yahoo.com</a></p>
                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83069.06104484576!2d26.92521842600604!3d49.4106424906158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4732064344bb178b%3A0xd9f30b3b24d9c964!2sChmel&#39;nyc&#39;kyj%2C+Khmel&#39;nyts&#39;kyi%2C+Ucraina!5e0!3m2!1sit!2sit!4v1481805466490" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

</div>