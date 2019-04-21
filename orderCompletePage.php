<?php
session_start();
require_once 'ProductBusinessService.php';
require_once 'UserBusinessService.php';
require_once 'Cart.php';
require_once 'Products.php';
require_once 'header.php';

$productBS = new ProductBusinessService();
$userBS = new UserBusinessService();

$_SESSION['cart'] = unserialize(serialize($_SESSION['cart']));
//$_SESSION['cart'] = $c;

if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
} else {
    include 'loginOrRegister.php';
    exit;
}

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
} else {
    echo "<p>You are not logged in yet.</p>";
    exit;
}

/*if ($c->getUsername() != $userid) {
    echo "<p>It appears that this cart does not belong to you. Please login again.</p>";
    exit;
}*/

$user = $userBS->findById($userid);
$items = $c->getItems();
$total = $c->getTotal_price();


?>

<div style="display: block; text-align: center;">
    <iframe src="https://giphy.com/embed/U6pavBhRsbNbPzrwWg" style="pointer-events: none; padding-top: 5px;" width="480" height="360" frameBorder="0" class="giphy-embed" allowFullScreen></iframe><p><a href="https://giphy.com/gifs/intuitquickbooks-danny-devito-quickbooks-intuit-U6pavBhRsbNbPzrwWg"></a></p><h1>BOOM, your order is complete.</h1>
</div>

<h4 style="padding: 5%;">Here's what you ordered...just in case you forgot</h4>

<?php


echo "<table id='qtySelect' class='table'  style='width: 70%; margin: 0 auto;'>";


foreach ($c->getItems() as $product_id => $qty) {
    $product = $productBS->findById($product_id);

    echo "<tr style='border-bottom: 1px solid rgba(0,0,0,.1);'>";
    echo "<td><img style='width: 30%; height: auto; max-width: 203px; max-height: 203px;' src='product_pics/" . $product->getPhoto() . "' alt='ProductIMG'></td>";
    echo "<td><p>" . $product->getProductName() . "</p></td>";
    //echo "<td><input style='width: 50px; border: none;' class='form-control' type='number' name='qty' value=" . $qty . "></td>";
    echo "<form action='updateQty.php' id='qtyForm'>";
    echo "<input type='hidden' name='id' value='" . $product->getId() . "' />";
    echo "</form>";
    echo "<td><p>$" . $qty * $product->getPrice() . "</p></td>";
    echo "</tr>";


}
echo "</table>";

unset($_SESSION['cart']);





