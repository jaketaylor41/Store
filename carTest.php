<?php

require_once 'Cart.php';
require_once 'ProductBusinessService.php';

$c = new Cart(1);

// $productBS = new ProductBusinessService();

// $prod1 = $productBS->findById(11);
// $prod2 = $productBS->findById(15);
// $prod3 = $productBS->findById(5);

// echo "<pre>";
// print_r($prod1);
// echo "</pre>";

// echo "<pre>";
// print_r($prod2);
// echo "</pre>";

// echo "<pre>";
// print_r($prod3);
// echo "</pre>";

$c->addItem(5);
$c->addItem(10);
$c->addItem(15);
$c->addItem(20);
$c->addItem(20);
$c->addItem(30);
$c->addItem(40);

/* echo "<pre>";
print_r($c);
echo "</pre>";

$c->updateQty(10, 10);

echo "<pre>";
print_r($c);
echo "</pre>";

$c->updateQty(40, 0);

echo "<pre>";
print_r($c);
echo "</pre>"; */

$c->calcTotal();

echo "<pre>";
print_r($c);
echo "</pre>";