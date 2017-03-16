<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="ru">
<?php $this->head() ?>
<head>
    <meta charset="UTF-8">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">

    <div class="container">
        <h1>Basic Template</h1>
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><?=Html::a('Главная','/')?></li>
            <li role="presentation"><?=Html::a('Статьи',Url::to(['post/show']));?></li>
            <li role="presentation"><?=Html::a('Статья',Url::to(['post/index']));?></li>
            <li role="presentation"><?=Html::a('Картинки',Url::to(['post/images']));?></li>
            <li role="presentation"><?=Html::a('Навигация',Url::to(['post/navigation']));?></li>
            <li role="presentation"><?=Html::a('Запросы',Url::to(['post/post-get']));?></li>
            <li role="presentation"><?=Html::a('Статьи',Url::to(['articles/index']));?></li>
        </ul>
        <?=$content;?>

        <?php if($this->blocks['test']):?>
            <?php echo $this->blocks['test']?>
        <?endif;?>
    </div>

</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>