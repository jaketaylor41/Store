<?php
error_reporting(E_ALL);
ini_set('dispay_errors', 1);


require_once 'ProductBusinessService.php';
require_once 'Products.php';

if (isset($_GET)) {
    $productName = $_GET['productname'];
    $description = $_GET['description'];
    $price = $_GET['price'];
    $photo = $_GET['photo'];

} else {
    echo '<p>Nothing submitted by the form. Please go back and try again.</p>';
}

// send a new user object to the business service - . database service chain.


$bs = new ProductBusinessService();
$product = new Products(0, $productName, $description, $price, $photo);


if ($bs->makeNew($product))  {
    echo "<div class='container'>";
    echo '<h2>Registered Successfully!!!</h2>';
    echo '<p>Thank you, your information has been added to the system.</p>';
    echo "Click <a href='index.php'>HERE </a> to go to the Home page.";
    echo "</div>";
} else {
    echo "<div class='container'>";
    echo '<p>User creation failed. Pleas try again.</p>';
    echo "Click <a href='index.php'>HERE </a> to go to the Home page.";
    echo "</div>";
}

