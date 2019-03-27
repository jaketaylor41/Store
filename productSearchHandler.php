<?php

ini_set('display_errors', 1);


require_once 'ProductBusinessService.php';

// get the search term from the nput form
$searchPhrase = $_GET['name'];

// create and instance of the BusinessService
$bs = new ProductBusinessService();

// the find method returns on arra of product
$products = $bs->findByProductName($searchPhrase);

?>

<div class="container">
    <h2>Product Search Results</h2>
    <p>Here is what we found: </p>

    <?php
    if ($products) {
        include('_displayProductResultsCards.php');
    } else {
        echo "No product found with that partial name.<br>";
    }

    ?>
</div>