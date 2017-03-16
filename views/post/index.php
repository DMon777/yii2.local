<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use mihaildev\ckeditor\CKEditor;
?>
<h1>index controller</h1>
<? $this->registerJSFile('@web/js/dependscript.js',['depends' => 'yii\web\YiiAsset']); ?>

<button type="button" class="btn btn-danger">Жмай</button>
<p class="test"></p>
<?php

$script = <<< JS
$('.btn-danger').on('click', function() {
$.ajax({
url: '/post/ajax',
type:'post',
data: {name:'Valera'},
success: function(result) {
    alert(result);
        }
        });
        });
JS;
$this->registerJs($script);
?>

<?if(Yii::$app->session->hasFlash('success')):?>

    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?=Yii::$app->session->getFlash('success')?>
    </div>

<?endif;?>

<?if(Yii::$app->session->hasFlash('error')):?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?=Yii::$app->session->getFlash('error')?>    </div>

<?endif;?>


<?php  $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
<?= $form->field($model,'name'); ?>
<?= $form->field($model,'email')->input('email'); ?>
<?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>
<?//= $form->field($model,'text')->textarea(['rows' => 5]); ?>

<?php
echo $form->field($model,'text')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
]);

?>


<?= Html::submitButton('send',['class' => 'btn btn-success']) ?>
<?php  ActiveForm::end(); ?>
