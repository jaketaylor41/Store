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


?>

<div id="checkoutWelcome" xmlns="http://www.w3.org/1999/html">
<h1 style="font-weight: 600; font-size: 40px;">Here's what's in your cart.</h1>
<div style="font-size: 17px;">Free delivery and free returns.</div>
</div>
<div class="shoppingCartContainer">
<?php
foreach ($c->getItems() as $product_id => $qty) {
    $product = $productBS->findById($product_id);
    echo "<div id='cartProdImage'><img style='width: auto; height: auto; max-width: 203px; max-height: 203px;' src='product_pics/". $product->getPhoto() ."' alt='ProductIMG'></div>";
    ?>
<div class="row" style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
  <div class="col-lg my-3 text-left">
    <div id="cartItems" class="card">
     <div class="card-body">
      <div class="table-responsive">
       <table class="table table-borderless">
           <thead>
           <tr style="border-bottom:1pt solid rgba(0,0,0,.1);">
               <th style="font-weight: 500" scope="col">Product</th>
               <th style="font-weight: 500" scope="col">Qty</th>
               <th style="font-weight: 500" scope="col">Price</th>

           </tr>
           </thead>
                <tr>
                    <?php

                echo "<td><h2 style='font-size: 24px; font-weight: 600;'>" . $product->getProductName() . "</h2></td>";
                echo "<td><input style='width: 50px;' class='form-control' type='number' name='qty' value=" . $qty . "></td>";
                echo "<td><p style='font-size: 24px; font-weight: 600;'>$" . $qty * $product->getPrice() . "</p></td>";
                echo "<td><i style='position: absolute; margin-left: 50px ' class=\"fas fa-times\"></i></td>";
                echo "</tr>";
                    ?>
                </tr>
                <tr>
                    <?php
                    echo "<td><ul><li id='removeBtn' style='font-size: 14px;'>" . $product->getDescription() . "</li></ul></td>";

                    ?>
                </tr>
       </table>
          <hr>
          <p>Have a promo code? <button id="promoBtn">Enter here</button></p>
          <label for="promo"></label>
          <div id="promoDiv" class="md-form mt-0" style="display:none;">
              <input style="width: 10%;" class="form-control" id="promo" type="text" placeholder="Promo code" aria-label="Search">
          </div>
          <hr>
          <div style="margin-left: 4%;" id="shippingInfo">
              <div id="shippingIcon">
                  <i class="fas fa-shipping-fast"></i>
              </div>
              <span>Order by 9pm, delivers:</span><br>
              <span id="shippingDate"></span>

          </div>
          <div>
          </div>
      </div>
     </div>
    </div>
   </div>
 </div>
    <hr style="width: 100%;">
    <div style="text-align: right; float: right; width: 50%;">
    <?php
    echo "<h6 style='float: left;'>Subtotal</h6>";
    echo "<div><h6>$" . $c->getTotal_price() . "</h6></div>";
    echo "<h6 style='float: left'>Shipping</h6>";
    echo "<h6>FREE</h6>";
    ?>
        <p style="text-align: left">Estimated tax for: <button id="taxBtn">85004††</button></p>
        <label for="tax"></label>
        <div id="taxDiv" class="md-form mt-0" style="display:none;">
            <input style="width: 10%;" class="form-control" id="tax" type="text" placeholder="Enter Zip" aria-label="Search">
        </div>
        <?php
    echo "<hr>";
    echo "<h4 style='font-weight: 600; float: left;'>Total</h4>";
    echo "<div><h3 style='font-weight: 600'>$" . $c->getTotal_price() . "</h3></div><br><br><br>";
    echo "<td><a class='btn btn-success' href='processCheckout.php'>Checkout</a></td>";
    ?>
    </div>

        <?php

        }
?>
</div>
    <?php
?>

<script>

$("#promoBtn").click(function () {
$("#promoDiv").slideToggle();
$("#promo").animate({width: '50%'}, "slow");
});

$("#taxBtn").click(function () {

    $("#taxDiv").slideToggle();
    $("#tax").animate({width: '61%'}, "slow");
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
