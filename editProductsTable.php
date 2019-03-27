<?php


require_once 'ProductBusinessService.php';
require_once 'User.php';

$id = $_GET['id'];

$bs = new ProductBusinessService();

$product = $bs->findById($id);

?>

<!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link href="MDB-Free_4.7.1/css/addons/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/js/mdb.min.js"></script>
    <script type="text/javascript" src="MDB-Free_4.7.1/js/addons/datatables.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Update an Account</h2>
    <form action="processUpdateProduct.php">

        <div class="form-group">
            <input type="hidden" class="form-control" id="id" value="<?php echo $product->getId(); ?>" name="id">
        </div>

        <div class="form-group">
            <label for="productname">Product Name</label>
            <input type="text" class="form-control" id="productname" value="<?php echo $product->getProductName(); ?>" name="productname">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" value="<?php echo $product->getDescription(); ?>" name="description">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" value="<?php echo $product->getPrice(); ?>" name="price">
        </div>



        <button id="save" type="submit" class="btn btn-primary">Save changes</button>



    </form>
</div>


</body>
</html>


