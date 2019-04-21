<?php
require_once 'Cart.php';
require_once 'ProductBusinessService.php';

session_start();

$newQty = $_GET['selectQty'];
$id = $_GET ['id'];

if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
    $c->updateQty( $id , $newQty);
    $c->calcTotal();

    header("Location: customCart.php#qtySelect");

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



