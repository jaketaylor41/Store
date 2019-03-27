<?php


ini_set('display_errors', 1);

require_once 'UserDataService.php';
require_once 'Products.php';

class UserBusinessService
{

    function showAll()
    {
        // $n is the search string; returns an array of products
        $products = array();

        $dbService = new UserDataService();
        $persons = $dbService->showAllUsers();

        return $persons;
    }

    function findById($id) {
        // id is the number; returns a single person array
        $dbService = new UserDataService();
        $persons = $dbService->findById($id);

        return $persons;
    }


    function findByFirstName($n) {
        // $n is the search string; returns an array of persons
        $persons = array();

        $dbService = new UserDataService();
        $persons = $dbService->findByFirstName($n);

        return $persons;
    }

    function findByLastName ($n) {
        // returns an array of persons by last name
        $persons = array();

        $dbService = new UserDataService();
        $persons = $dbService->findByLastName($n);

        return $persons;
    }

    function deleteItem($id) {
        // id is the number to delete; returns a true (success) or false (failure)
        $dbService = new UserDataService();
        return $dbService->deleteItem($id);
    }

    function makeNew($person) {
        $dbService = new UserDataService();
        return $dbService->makeNew($person);
    }
}
