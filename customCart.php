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


?>

<div id="checkoutWelcome" xmlns="http://www.w3.org/1999/html">
    <h1 style="font-weight: 600; font-size: 40px;">Here's what's in your cart.</h1>
    <div style="font-size: 17px;">Free delivery and free returns.</div>
</div>



<?php


echo "<table id='qtySelect' class='table table-borderless' style='width: 70%; margin: 0 auto;'>";


echo "<thead>";
echo "<tr>";
echo "<th scope='col'></th>";
echo "<th scope='col'></th>";
echo "<th scope='col'></th>";
echo "<th scope='col'></th>";
echo "</tr>";
echo "</thead>";



foreach ($c->getItems() as $product_id => $qty) {
    $product = $productBS->findById($product_id);

    echo "<tr style='border-bottom: 1px solid rgba(0,0,0,.1);'>";
    echo "<td><img style='width: auto; height: auto; max-width: 203px; max-height: 203px;' src='product_pics/" . $product->getPhoto() . "' alt='ProductIMG'></td>";
    echo "<td><h2 style='font-size: 24px; font-weight: 600;'>" . $product->getProductName() . "</h2></td>";
    //echo "<td><input style='width: 50px; border: none;' class='form-control' type='number' name='qty' value=" . $qty . "></td>";
    echo "<form action='updateQty.php' id='qtyForm'>";
    echo "<td>";
    echo "<input type='hidden' name='id' value='" . $product->getId() . "' />";
    echo "<select name='selectQty' onchange='this.form.submit()' class=\"browser-default custom-select\">";
    echo "<option disabled selected>". $qty ."</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option>";
    echo "</select>";
    echo "<noscript><input type=\"submit\" value=\"Submit\"></noscript>";
    echo "</td>";
    echo "</form>";
    echo "<td><p style='font-size: 24px; font-weight: 600;'>$" . $qty * $product->getPrice() . "</p></td>";
    echo "<td><i style='position: absolute; margin-left: 50px ' class=\"fas fa-times\"></i></td>";
    echo "</tr>";


}
echo "</table>";



echo "<table class='table table-borderless' style='width: 47%; margin-left: 38%; border-bottom: 1px solid rgba(0,0,0,.1);'>";

echo "<tr>";
echo "<td style='width: 50%;'><p style='font-size: 17px;'>Subtotal</p></td>";
echo "<td><p style='text-align: right; font-size: 17px;'>$" . $c->getTotal_price() . "</p></td>";
echo "</tr>";

echo "<tr>";
echo "<td><p style='font-size: 17px;'>Shipping</p></td>";
echo "<td><p style='text-align: right; font-size: 17px;'>FREE</p></td>";
echo "</tr>";

echo "<tr>";
echo "<td><p style='font-size: 17px;'>Estimated tax for: <button id=\"taxBtn\">85004††</button></p>";
echo "<label for=\"tax\"></label>";
echo "<div id=\"taxDiv\" class=\"md-form mt-0\" style=\"display:none;\">";
echo "<input style=\"width: 10%;\" class=\"form-control\" id=\"tax\" type=\"text\" placeholder=\"Enter Zip\" aria-label=\"Search\">";
echo "</div>";
echo "</td>";
echo "<td><p style='text-align: right; font-size: 17px;'>$150</p></td>";
echo "</tr>";

echo "<tr>";
echo "<td><p style='font-size: 17px;'>Have a promo code? <button id=\"promoBtn\">Enter here</button></p>";
echo "<label for=\"promo\"></label>";
echo "<div id=\"promoDiv\" class=\"md-form mt-0\" style=\"display:none;\">";
echo "<input style=\"width: 10%;\" class=\"form-control\" id=\"promo\" type=\"text\" placeholder=\"Promo code\" aria-label=\"Search\">";
echo "</div>";
echo "</td>";
echo "<td></td>";
echo "</tr>";

echo "</table>";


echo "<table class='table table-borderless' style='width: 47%; margin-left: 38%; text-align: right;'>";
echo "<tr>";
echo "<td><h4 style='font-weight: 600; float: left;'>Total</h4></td>";
echo "<td><h3 style='font-weight: 600'>$" . $c->getTotal_price() . "</h3></td>";
echo "</tr>";

echo "<tr>";
echo "<td></td>";
echo "<td><a class='btn btn-success' href='processCheckout.php'>Checkout</a></td>";
echo "</tr>";

echo "</table>";


?>




<script>

    $("#promoBtn").click(function () {
        $("#promoDiv").slideToggle();
        $("#promo").animate({width: '60%'}, "slow");
    });

    $("#taxBtn").click(function () {

        $("#taxDiv").slideToggle();
        $("#tax").animate({width: '60%'}, "slow");
        // $("#tax").animate({margin: "5%"});

    });

    //
    // var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    // var today = new Date();
    // var shippingDate = today.toLocaleDateString("en-US", options);
    //
    // document.getElementById('shippingDate').innerHTML = shippingDate;
    var today = moment().add(7, 'days').format("dddd, MMMM Do YYYY");

    document.getElementById('shippingDate').innerHTML = today + " - Free";

</script>

