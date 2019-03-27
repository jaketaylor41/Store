<?php
require_once 'navbar.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link href="MDB-Free_4.7.1/css/addons/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link href="style.css" rel="stylesheet">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/js/mdb.min.js"></script>
    <script type="text/javascript" src="MDB-Free_4.7.1/js/addons/datatables.min.js"></script>




</head>


<body>


<h1 style="text-align: center; margin-top: 2%;">Welcome, Admin</h1>


<div class="iconContainer">
    <div class="icons">
        <a href="usersTable.php" target="myIframe" style="color: inherit;"><span style="padding-right: 20px"><i class="fas fa-users"></i>Users</span></a>

        <a href="productsTable.php" target="myIframe" style="color: inherit;"><span><i class="fas fa-shopping-cart"></i>Products</span></a>

    </div>
</div>


    <div class="iframeContainer">
        <iframe class="iframe" name="myIframe" frameborder="0"></iframe>
    </div>












</body>

</html>

