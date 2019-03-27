<?php

class OrderDataService {

    function deleteItem($id) {

    }

    function findByID($id) {

    }

    function getAllOrders() {

    }

    function updateOne($id, $order) {

    }

    function createNew($order, $connection) {

         $db = new db_connector();
         $connection = $db->getConnection();

        $stmt = $connection->prepare("INSERT INTO ORDERS (DATE, TOTALPRICE, USERSID, ADDRESSID)
                                      VALUES (?, ?, ?, ?)");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }

        $order_id = $order->getId();
        $order_date = $order->getDate();
        $order_total = $order->getTotal();
        $user_id = $order->getUser_id();
        $user_address__id = $order->getAddress_id();

        $stmt->bind_param("ssii", $order_date, $order_total, $user_id, $user_address__id);
        $stmt->execute();

        if ($stmt->affectedrows > 0) {
            //$connection->close();
            return $connection->insert_id;
        } else {
            //$connection->close();
            echo "Nothing inserted into the database during new order process.";
            return false;
        }
    }

    function addDetailsLine($order_id, $orderDetails, $connection) {

        $stmt = $connection->prepare("INSERT INTO ORDERDETAILS (QUANTITY, CURRENTPRICE,
                                            CURRENTDESCRIPTION, ORDERSID, PRODUCTSID)                                            
                                      VALUES (?, ?, ?, ?, ?)");
        if(!$stmt) {
            echo "Something wrong in the binding process. SQL statement error?";
            return -1;
        }

        $quantity = $orderDetails->getQuantity();
        $price = $orderDetails->getCurrent_price();
        $description = $orderDetails->getCurrent_description();
        $product_id = $orderDetails->getProduct_id();

        $stmt->bind_param("issii", $quantity, $price, $description, $order_id, $product_id);
        $stmt->execute();

        if ($stmt->affected_rows() > 0) {
            return $connection->insert_id;
        } else {
            return -1;
        }
    }

    function getOrdersBetweenDates($date1, $date2) {

    }

    function getOrderDetails($id) {

    }

    function getOrderWithDetails($id) {

    }
}