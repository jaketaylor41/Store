<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Search Page</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link href="MDB-Free_4.7.1/css/addons/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="style.css">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/js/mdb.min.js"></script>
    <script type="text/javascript" src="MDB-Free_4.7.1/js/addons/datatables.min.js"></script>



</head>
<body>
<?php require_once 'navbar.php'?>


<div class="container">
    <div class="productSearchContainer">
    <form action="productSearchHandler.php">
        <input id="productSearchBar" class="form-control" type="text" placeholder="Search" aria-label="Search">
        <button type="submit" style="border-radius: 50px" class="btn btn-outline-success btn-sm" value="Search">Search</button>

    </form>
    </div>

    <div class="card-group">

        <?php

        require_once 'ProductBusinessService.php';

        $pds = new ProductBusinessService();

        $products = $pds->showAll();

        for ($x = 0; $x < count($products); $x++) {

            ?>


            <div class="productContainer" style="display: block; margin: 0 auto;">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100" style="margin: 20px; min-width: 300px;">
                    <img class="card-img-top" style="width: 200px; margin: 0 auto; padding: 5px;" src="product_pics/<?php echo $products[$x]['PHOTO']; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $products[$x]['PRODUCTNAME']; ?></h5>
                        <p class="card-text"><?php echo $products[$x]['DESCRIPTION']; ?></p>
                        <p class="card-text"><?php echo "$ " . $products[$x]['PRICE']; ?></p>
                    </div>
                    <div class="card-footer">
                        <form action="addToCart.php">
                            <input type="hidden" name="id" value="<?php echo $products[$x]['ID']; ?>">
                            <input class="btn btn-primary" type="submit" value="Add to Cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>
            </div>


            <?php
        }
        ?>



</div>

</body>
</html>
