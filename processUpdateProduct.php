<?php


require_once 'db_connector.php';

$id = addslashes($_GET['id']);
$productName = addslashes($_GET['productname']);
$description = addslashes($_GET['description']);
$price = addslashes($_GET['price']);
$photo = addslashes($_GET['photo']);



$sql_statement = "UPDATE `PRODUCTS` SET `PRODUCTNAME` = '$productName',
        `DESCRIPTION` = '$description', `PRICE` = '$price', `PHOTO` = '$photo'
        WHERE `ID` = '$id'";
$result = mysqli_query($connection, $sql_statement);
if ($result) {

    include "productsTable.php";

} else {
    echo 'Error in the sql ' . mysqli_error($connection);
}


