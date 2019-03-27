<?php

require_once 'OrderDataService.php';

class OrdersBusinessService {

    function checkOut($order, $cart) {
        $db = new Database();
        $conn = $db->getConnection();

        $conn->autocommit(false);
        $conn->begin_transaction();

//         $checkingBalance = $this->getCheckingBalance();
//         $checking = new CheckingAccountDataService($conn);
//         $okChecking = $checking->updateBalance($checkingBalance - $transfer);

//         $savingBalance = $this->getSavingBalance();
//         $saving = new SavingAccountDataService($conn);
//         $okSaving = $saving->updateBalance($savingBalance + $transfer);

//         echo "Checking: " . $okChecking;
//         echo "Saving: " . $okSaving;

        if ($okChecking && $okSaving && $checkingBalance > 0 && $savingBalance > 0) {
            echo "Committed";
            $conn->commit();
        } else {
            echo "Rolback";
            $conn->rollback();
        }

        $conn->close();
    }

    function makeNew($order, $conn) {

        $dbService = new OrderDataService();
        return $dbService->createNew($order, $conn);
    }

    function getAllOrders() {

        $dbService = new OrderDataService();
        $orders = $dbService->getAlOrders();

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