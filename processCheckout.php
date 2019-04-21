<?php
session_start();
require_once 'ProductBusinessService.php';
require_once 'UserBusinessService.php';
require_once 'Cart.php';
require_once 'Products.php';
require_once 'header.php';
require_once 'Order.php';
require_once 'User.php';
require_once 'OrderBusinessService.php';
require_once 'CreditCardService.php';


$_SESSION['cart'] = unserialize(serialize($_SESSION['cart']));

if ( isset($_SESSION['cart']) && (isset($_SESSION['userid'])) ){

    $c = $_SESSION['cart'];
}
else {
    echo "No products or you are not logged in yet<br>";
    exit;
}



$items = $c->getItems();
$total = $c->getTotal_price();

//$order = new Order(null, date("Y/m/d h:i:sa"), $_SESSION['userid'], 2, $total);

$orderbs = new OrderBusinessService();
$productbs = new ProductBusinessService();
$products = $productbs->showAll();
$userbs = new UserBusinessService();
$user = $userbs->findById($_SESSION['userid']);





?>

<!--Main layout-->
<main class="mt-5 pt-4">
    <div class="container wow fadeIn">

        <!-- Heading -->
        <h2 class="my-5 h2 text-center">Checkout</h2>

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-8 mb-4">

                <!--Card-->
                <div class="card">

                    <!--Card content-->
                    <form class="card-body" action="checkCredit.php">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <!--firstName-->
                                <div class="md-form ">
                                    <input type="text" id="firstName" class="form-control" placeholder="<?php echo $user->getFirstName(); ?>">
                                    <label for="firstName" class=""></label>
                                </div>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6 mb-2">

                                <!--lastName-->
                                <div class="md-form">
                                    <input type="text" id="lastName" class="form-control" placeholder="<?php echo $user->getLastName(); ?>">
                                    <label for="lastName" class=""></label>
                                </div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->
                        <!--email-->
                        <div class="md-form mb-5">
                            <input type="text" id="email" class="form-control" placeholder="<?php echo $user->getEmail(); ?>">
                            <label for="email" class=""></label>
                        </div>

                        <!--address-->
                        <div class="md-form mb-5">
                            <input type="text" id="address" class="form-control" placeholder="1234 Main St">
                            <label for="address" class=""></label>
                        </div>

                        <!--address-2-->
                        <div class="md-form mb-5">
                            <input type="text" id="address-2" class="form-control" placeholder="Apartment or suite">
                            <label for="address-2" class=""></label>
                        </div>

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-lg-4 col-md-12 mb-4">

                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4">

                                <label for="state">State</label>
                                <select class="custom-select d-block w-100" id="state" required>
                                    <option value="">Choose...</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4">

                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <hr>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>

                        <hr>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                <label class="custom-control-label" for="credit">Credit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="debit">Debit card</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control" name="cc-name" id="cc-name" placeholder="" required>
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control" name="cc-number" id="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="cc-number">Exp: Month</label>
                                <select id="cc-expiration" name="cc-expirationMon" class="browser-default custom-select">
                                    <option value="Mon" selected>Mon</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-number">Exp: Year</label>
                                <select id="cc-expiration" name="cc-expirationYear" class="browser-default custom-select">
                                    <option value="Year" selected>Year</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                </select>
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to verify Information</button>
                    </form>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">

                <!-- Heading -->
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill"><?php echo count($items) ?></span>
                </h4>
                <div class="card">



                    <?php


                    echo "<table style='border-bottom: 1px solid rgba(0,0,0,.1); margin-bottom: 0;' class='table table-borderless'>";
                    //echo "<thead>";
                    //echo "<tr>";
                    //echo "<th scope='col'></th>";
                    //echo "</tr>";
                    //echo "</thead>";

                    foreach ($c->getItems() as $product_id => $qty) {
                        $product = $productbs->findById($product_id);

                        echo "<tr style='border-bottom: 1px solid rgba(0,0,0,.1);'>";
                        echo "<td><div>";
                        echo "<h6 style='display: inline;' class=\"my-0\">" . $product->getProductName() . "</h6>";
                        echo "<p style='float: right; padding-right: 5px;' class=\"text-muted\">$" . $qty * $product->getPrice() . "</p>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";


                    }
                    echo "</table>";

                    echo "<table class='table table-borderless'>";
                    echo "<tr>";
                    echo "<td><p style='display: inline; font-weight: 600;'>Total (USD)</p>";
                    echo "<p style='float: right; padding-right: 5px; font-weight: 600;'>$" . $c->getTotal_price() . "</p></td>";
                    echo "</tr>";

                    echo "</table>";

                    ?>

                </div>
            </div>

        </div>
        <!--Grid row-->

    </div>
</main>

<!--Main layout-->

