<?php


require_once 'db_connector.php';

$id = addslashes($_GET['id']);
$firstName = addslashes($_GET['firstname']);
$lastName = addslashes($_GET['lastname']);
$email = addslashes($_GET['email']);
$username = addslashes($_GET['username']);
$password = addslashes($_GET['password']);


    $sql_statement = "UPDATE `USERS` SET `FIRST_NAME` = '$firstName',
        `LAST_NAME` = '$lastName', `EMAIL` = '$email', `USERNAME` = '$username', `PASSWORD` = '$password'
        WHERE `ID` = '$id'";
    $result = mysqli_query($connection, $sql_statement);
    if ($result) {

        include "usersTable.php";

    } else {
        echo 'Error in the sql ' . mysqli_error($connection);
    }


