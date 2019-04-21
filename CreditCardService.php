<?php

require_once 'header.php';

class CreditCardService
{

    private $ccName = "";
    private $ccNumber = "";
    private $ccExpMon = "";
    private $ccExpYr = "";
    private $ccCvv = "";


    function __construct($ccName, $ccNumber, $ccExpMon, $ccExpYr, $ccCvv)
    {


        $this->name = $ccName;
        $this->number = $ccNumber;
        $this->expMon = $ccExpMon;
        $this->expYr = $ccExpYr;
        $this->cvv = $ccCvv;

    }

    public function authenticate()
    {

        if ($this->name == "Jake Taylor" && $this->number == "1234 1234 1234 1234" && $this->expMon == 01 && $this->expYr == 22 && $this->cvv = 420) {

            return true;

        } else {
            return false;
        }

    }
}