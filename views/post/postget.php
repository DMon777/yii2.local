<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>


<h2>Практика с post и get запросами</h2>
<? $form = ActiveForm::begin(); ?>
    <?=$form->field($model,'name')->label('Имя');?>
    <?=$form->field($model,'text')->label('Сообщение');?>
<?=Html::submitButton('Отправить',['class' => 'btn btn-success'])?>

<? ActiveForm::end(); ?>

<p>Имя - <?=$name;?></p>
<p>Возраст - <?=$age;?></p>
<p>Сообщение - <?=$text;?></p>
<p>Имя из cookie - <?=$name_from_cookie;?></p>



<?php
var_dump($boxer);

?>
