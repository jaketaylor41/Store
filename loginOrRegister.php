<?php

error_reporting(0);
require_once 'header.php';

if (!isset($_SESSION['username'])) {
    include 'loginForm.php';
    exit;
}

if (isset($_GET['pageNumber']))
    $menuChoice = $_GET['pageNumber'];
else
    $menuChoice = 3;

if ( $_SESSION['username']) {

    switch ($menuChoice) {
        case 1:
            require_once 'showProduct.php';
            break;
        case 2:
            require_once 'showCart.php';
            break;
        case 3:
            require_once 'showCart.php';
            break;
    }
}
else {
        include 'loginForm.php';
    exit;
}

?>
