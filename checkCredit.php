<?php

require_once 'header.php';
require_once 'CreditCardService.php';

$ccName = $_GET['cc-name'];
$ccNumber = $_GET['cc-number'];
$ccExpMon = $_GET['cc-expirationMon'];
$ccExpYr = $_GET['cc-expirationYear'];
$ccCvv = $_GET['cc-cvv'];


$ccservice = new CreditCardService($ccName, $ccNumber, $ccExpMon, $ccExpYr, $ccCvv);
if($ccservice->authenticate()){

    echo "<h4>Authenticated</h4>";
    header("Location: orderCompletePage.php");

} else {
    echo "<h4>Credit Card Failed</h4>";
    exit;
}