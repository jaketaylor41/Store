<?php
error_reporting(E_ALL);
ini_set('dispay_errors', 1);


require_once 'UserBusinessService.php';
require_once 'User.php';

if (isset($_GET)) {
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $username = $_GET['username'];
    $email = $_GET['email'];
    $password = $_GET['password'];

} else {
    echo '<p>Nothing submitted by the form. Please go back and try again.</p>';
}

// send a new user object to the business service - . database service chain.


$bs = new UserBusinessService();
$user = new User(0, $firstname, $lastname, $username, $email, $password );


if ($bs->makeNew($user))  {
include 'showProduct.php';
} else {
    echo "<div class='container'>";
    echo '<p>User creation failed. Pleas try again.</p>';
    echo "Click <a href='index.php'>HERE </a> to go to the Home page.";
    echo "</div>";
}
