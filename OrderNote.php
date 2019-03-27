<?php

class OrderNotes {

    private $id;
    private $nots;
    private $orders_id;
    private $users_ID;

    function __construct($a, $b, $c, $d, $e, $f) {
        $this->id = $a;
        $this->notes = $b;
        $this->orders_id = $c;
        $this->users_ID = $d;
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
    public function getNots()
    {
        return $this->nots;
    }

    /**
     * @return mixed
     */
    public function getOrders_id()
    {
        return $this->orders_id;
    }

    /**
     * @return mixed
     */
    public function getUsers_ID()
    {
        return $this->users_ID;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $nots
     */
    public function setNots($nots)
    {
        $this->nots = $nots;
    }

    /**
     * @param mixed $orders_id
     */
    public function setOrders_id($orders_id)
    {
        $this->orders_id = $orders_id;
    }

    /**
     * @param mixed $users_ID
     */
    public function setUsers_ID($users_ID)
    {
        $this->users_ID = $users_ID;
    }

}