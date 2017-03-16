<?php

use yii\widgets\LinkPager;

?>

<h2>Постраничная навигация</h2>

<?php

?>

<?foreach ($products as $product):?>
    <h3><?= $product->title; ?> </h3>
    <p> Цена: <?= $product->price; ?> $$ </p>

<?endforeach;?>

<?= LinkPager::widget([
'pagination' => $pagination
]);

?>