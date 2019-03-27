<?php

class Order {

    private $id;
    private $date;
    private $users_ID;
    private $addresses_id;
    private $total;

    function __construct($id, $date, $user_ID, $address_id, $total) {
        $this->id = $id;
        $this->date = $date;
        $this->users_ID = $user_ID;
        $this->addresses_id = $address_id;
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getUsers_ID()
    {
        return $this->users_ID;
    }

    /**
     * @return mixed
     */
    public function getAddresses_id()
    {
        return $this->addresses_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $users_ID
     */
    public function setUsers_ID($users_ID)
    {
        $this->users_ID = $users_ID;
    }

    /**
     * @param mixed $addresses_id
     */
    public function setAddresses_id($addresses_id)
    {
        $this->addresses_id = $addresses_id;
    }

}