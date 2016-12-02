<?php
use yii\widgets\Pjax;
use yii\bootstrap\Html;
?>

<?php Pjax::begin(); ?>
<?= Html::a("Показать дату", ['site/date'], ['class' => 'btn btn-lg btn-success']) ?>
<?= Html::a("Показать время", ['site/time'], ['class' => 'btn btn-lg btn-primary']) ?>
    <h1>It's: <?= $response ?></h1>
<?php Pjax::end(); ?>