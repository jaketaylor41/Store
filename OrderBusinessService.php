<?php

require_once 'OrderDataService.php';
require_once 'ProductBusinessService.php';

class OrderBusinessService {

    function checkOut($order, $cart) {

        $db = new db_connector();
        $connection = $db->getConnection();

        $connection->autocommit(FALSE);
        $connection->begin_transaction();







    }

    function makeNew($order, $connection) {

        $dbService = new OrderDataService();
        return $dbService->createNew($order, $connection);
    }

    function getAllOrders() {

        $dbService = new OrderDataService();
        $orders = $dbService->getAllOrders();

        return $orders;
    }

    function deleteItem($id) {

        $dbService = new OrderDataService();
        return $dbService->deleteItem($id);
    }

    function findById($id) {

        $dbService = new OrderDataService();
        $orders = $dbService->findbyID($id);

        return $orders;
    }

    function updateONe($id, $order) {

        $dbService = new OrderDataService();
        return $dbService->updateOne($id, $order);
    }

    function getOrderDetais($id) {

        $dbService = new OrderDataService();
        return $dbService->getOrderDetails($id);
    }

}