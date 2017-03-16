<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h2> Загрузите изображение !!! </h2>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'img_url')->fileInput() ?>

    <?=Html::submitButton('send',['class' => "btn-success btn"])?>

<?php ActiveForm::end() ?>

<div class="images">

        <?php foreach ($images as $key=> $val):?>
    <?=Html::img(['@web/web/uploads/'.$val['img_url']], ['alt' => 'Наш логотип',
            'class' => 'test_img'])?>

    <?endforeach;?>
</div>
