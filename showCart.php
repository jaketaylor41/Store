<?php
session_start();
require_once 'ProductBusinessService.php';
require_once 'UserBusinessService.php';
require_once 'Cart.php';
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

//echo "<div class='container'>";

echo "<h2>Here's what's in your cart.</h2>";
echo "<p>Cart for user: " . $user->getFirstName() . "</p></center>";

echo "<table class='table'>";

echo "<thread class='thead-dark'>";
echo "<tr>";
echo "<th scope='col'>Poduct ID</th>";
echo "<th scope='col'>Product Name</th>";
echo "<th scope='col'>Description</th>";
echo "<th scope='col'>Photo</th>";
echo "<th scope='col'>Quantity</th>";
echo "<th scope='col'>Product Price</th>";
echo "<th scope='col'>Subtotal</th>";
echo "</tr>";
echo "</thread>";

foreach ($c->getItems() as $product_id => $qty) {
    $product = $productBS->findById($product_id);
    echo "<tbody>";
    echo "<tr>";
    echo "<th scope='row'>" . $product->getId() . "</td>";
    echo "<td>" . $product->getProductName() . "</td>";
    echo "<td>" . $product->getDescription() . "</td>";
    echo "<td><img height='80' src='product_pics/" . $product->getPhoto() . "'></td>";
    echo "<td>";
    echo "<form action='updateQty.php'>";
    echo "<input type='hidden' name='id' value=" . $product->getId() . ">";
    echo "<span class='input-group-text'>";
    echo "<input class='form-control' type='text' name='qty' value=" . $qty . ">";
    echo "<input class='btn btn-secondary' type='submit' name='submit' value='Upd'>";
    echo "</span>";
    echo "</form>";
    echo "</td>";
    echo "<td>$ " . $product->getPrice() . "</td>";
    echo "<td>$ " . $qty * $product->getPrice() . "</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
}

//echo "<h3>Total Price: " . money_format('%.2n', $c->getTotal_price()) . "</h3>";
echo "<h3>Total Price: " . $c->getTotal_price() . "</h3>";
echo "<table>";
echo "<tr>";
echo "<td><a class='btn btn-primary' href='showProduct.php'>Continue Shopping</a></td>";
echo "<td><a class='btn btn-success' href='processCheckout.php'>Checkout</a></td>";
echo "</tr>";
echo "</table>";

//echo "</div>";
