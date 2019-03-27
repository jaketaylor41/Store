<?php


//require_once 'ProductBusinessService.php';
//require_once 'Product.php';

//$bs = new ProductBusinessService();
//$products = $bs->getAllProducts();

?>

<div class="container">
    <h2>Create a New Product</h2>
    <form class="inputForm" action="processNewProduct.php">
        <div class="form-group">
            <label for="productname">
                Product Name:
            </label>
            <input class="form-control" name="productname" type="text">
        </div>
        <div class="form-group">
            <label for="productdescription">
                Description:
            </label>
            <textarea class="form-control" name="productdescription" rows="4" cols="45"></textarea>
        </div>
        <div class="form-group">
            <label for="productprice">
                Price:
            </label>
            <input class="form-control" name="productprice" type="text">
        </div>
        <div class="form-group">
            <label for="productphoto">
                Photo:
            </label>
            <input class="form-control" name="productphoto" type="text">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>