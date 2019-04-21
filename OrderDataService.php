<?php

class OrderDataService {

    function deleteItem($id){




    }



    function findById($id){




    }


    function getAllOrders(){



    }



    function updateOne($id, $order){




    }


    function createNew($order, $connection){

//    $db = new db_connector();
//    $connection = $db->getConnection();

    $stmt = $connection->prepare("INSERT INTO ORDERS (DATE, USERSID, ADDRESSID, TOTALPRICE) VALUES (?,?,?,?)");

    if(!$stmt){
        echo "Something went wrong in the binding process. SQL error?";
        exit;
    }

    $order_id = $order->getId();
    $order_date = $order->getDate();
    $user_id = $order->getUsers_ID();
    $user_address_id = $order->getAddresses_id();
    $order_total = $order->getTotal();

    $stmt->bind_param("siid", $order_date, $user_id, $user_address_id, $order_total);


        $stmt->execute();

        if($stmt->affected_rows() > 0){

            //success
            return $connection->insert_id;

        } else {
            //fail

            return -1;
        }


    }



    function addDetailsLine($order_id, $orderDetails, $connection ){
// create a new line in the orders detail table
        //return the id number of the last item inserted

        $stmt = $connection->prepare("INSERT INTO ORDERDETAILS(QUANTITY, CURRENTPRICE, CURRENTDESCRIPTION, ORDERSID, PRODUCTSID) VALUES (?, ?, ?, ?, ?)");

        if(!$stmt){
            echo "Something wrong in the binding process. SQL statement error?";
            return -1;
        }

        //$orderDetails = new OrderDetails($id, $order_id, $product_id, $quantity, $currentprice, $currentdescription);

        $product_id = $orderDetails->getProduct_id();
        $quantity = $orderDetails->getQuantity();
        $price = $orderDetails->getCurrentprice();
        $description = $orderDetails->getCurrentdescription();

        $stmt->bind_param("iiids", $order_id, $product_id, $quantity, $price, $description);

        $stmt->execute();

        if($stmt->affected_rows() > 0){

            //success
            return $connection->insert_id;

        } else {
            //fail

            return -1;
        }






    }

    function getOrdersBetweenDates($date1, $date2){

        $db = new db_connector();
        $connection = $db->getConnection();

        $stmt = $connection->prepare("SELECT * FROM ORDERS WHERE DATE >= ? and DATE <= ?");



    }

    function getOrderDetails($id){




    }

    public function getOrderWithDetails($id){




    }
















}