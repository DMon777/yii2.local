<?php
use app\components\MyWidget;
?>

<h1>Test Controller</h1>

<?php

 MyWidget::begin();
?>

<p>hello dima you are cool programmer!!!</p>

<? MyWidget::end();?>


<?php $this->beginBlock('test'); ?>
    <h2>Блок из show.php</h2>
<?php $this->endBlock();?>

<? //debug($prod); ?>


<?php
//$categories = $prod->categories;

//debug($categories);

foreach($cats as $cat): ?>
    <ul>
        <li> <?=$cat->title;?> </li>
    </ul>
    <?php
        $products = $cat->products;
        foreach($products as $product):?>
            <ul style = "margin-left:25px">
                <li><?=$product->title;?></li>
            </ul>
        <?endforeach; ?>
<?endforeach; ?>