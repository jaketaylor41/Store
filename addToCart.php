<?php

require_once 'Cart.php';
require_once 'ProductBusinessService.php';

session_start();

$id = $_GET['id'];

if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
    $c->addItem($id);
    $c->calcTotal();
} else {
    if (isset($_SESSION['userid'])) {
        $c = new Cart($_SESSION['userid']);
        $c->addItem($id);
        $c->calcTotal();
    } else {
        echo "<p>Please login first</p>";
        exit;
    }
}

$_SESSION['cart'] = unserialize(serialize($_SESSION['cart']));
$_SESSION['cart'] = $c;


echo "<p><b>Session display.</b></p>";
echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";


header("Location: customCartPage.php");