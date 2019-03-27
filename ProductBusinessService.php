<?php


ini_set('display_errors', 1);

require_once 'ProductDataService.php';

class ProductBusinessService
{

    function showAll()
    {
        // $n is the search string; returns an array of products
        $products = array();

        $dbService = new ProductDataService();
        $products = $dbService->displayAll();

        return $products;
    }


    function findById($id) {
        // id is the number; returns a single person array
        $dbService = new ProductDataService();
        $products = $dbService->findById($id);

        return $products;
    }

    function deleteItem($id) {
        // id is the number to delete; returns a true (success) or false (failure)
        $dbService = new ProductDataService();
        return $dbService->deleteItem($id);
    }

    function makeNew($product) {
        $dbService = new ProductDataService();
        return $dbService->makeNew($product);
    }

    function findByProductName($n) {
        // $n is the search string; returns an array of persons
        $products = array();

        $dbService = new ProductDataService();
        $products = $dbService->findByProductName($n);

        return $products;
    }


}
