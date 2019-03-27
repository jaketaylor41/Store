<?php


require_once 'db_connector.php';
require_once 'Products.php';

class ProductDataService
{

    function displayAll()
    {
        // Returns an array of persons. Every in the database.

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM products;");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            echo "Assume the SQL statement has an error.<br>";
            return null;
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            //echo "I found " . $result->num_rows . " results!<br>";

            $product_array = array();
            while ($product = $result->fetch_assoc()) {
                array_push($product_array, $product);
            }
            return $product_array;
        }
    }

    function findById($id) {
        // id is the number; returns a product object

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM PRODUCTS WHERE ID = ? LIMIT 1");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }

        //$like_n = "%" . $n . "%";
        $stmt->bind_param("s", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            echo "Assume the SQL statement has an error.<br>";
            return null;
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            $products_array = array();
            while ($p = $result->fetch_assoc()) {
                array_push($products_array, $p);
            }
            $p = new Products($products_array[0]['ID'], $products_array[0]['PRODUCTNAME'], $products_array[0]['DESCRIPTION'],
                $products_array[0]['PRICE'], $products_array[0]['PHOTO']);
            return $p;
        }
    }


    function findByProductName($n) {
        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT `ID`, `PRODUCTNAME`, `DESCRIPTION`, `PRICE`, `PHOTO`
                      FROM `PRODUCTS` WHERE `PRODUCTNAME` LIKE ?;");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }

        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            echo "Assume the SQL statement has an error.<br>";
            return null;
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            //echo "I found " . $result->num_rows . " results!<br>";

            $product_array = array();
            while ($product = $result->fetch_assoc()) {
                array_push($product_array, $product);
            }
            return $product_array;
        }
    }



    function deleteItem($id) {
        // id is the number to delete; returns a true (success) or false (failure)

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM PRODUCTS WHERE ID = ? LIMIT 1;");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }

        //$like_n = "%" . $n . "%";
        $stmt->bind_param("s", $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    function makeNew($product) {
        // Accepts a $product object. Inserts a new product into the poducts table.

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("INSERT INTO PRODUCTS (PRODUCTNAME, DESCRIPTION, PRICE, PHOTO)
                                      VALUES (?, ?, ?, ?)");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }



        $pn = $product->getProductName();
        $pd = $product->getDescription();
        $pp = $product->getPrice();
        $p = $product->getPhoto();

        $stmt->bind_param("ssis", $pn, $pd, $pp, $p);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }

    }
}

