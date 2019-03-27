<?php

class OrderDetails {

    private $id;
    private $order_id;
    private $product_id;
    private $quantity;
    private $currentprice;
    private $currentdescription;

    function __construct($id, $order_id, $product_id, $quantity, $currentprice, $currentdescription) {
        $this->id = $id;
        $this->order_id = $order_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->currentprice = $currentprice;
        $this->currentdescription = $currentdescription;
    }


    /**
     * @return mixed
     */
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * @return mixed
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $orer_id
     */
    public function setOrder_id($order_id)
    {
        $this->orer_id = $order_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getCurrentprice()
    {
        return $this->currentprice;
    }

    /**
     * @return mixed
     */
    public function getCurrentdescription()
    {
        return $this->currentdescription;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $currentprice
     */
    public function setCurrentprice($currentprice)
    {
        $this->currentprice = $currentprice;
    }

    /**
     * @param mixed $currentdescription
     */
    public function setCurrentdescription($currentdescription)
    {
        $this->currentdescription = $currentdescription;
    }

}