<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    
    function __construct($carModel, $carPrice, $carMiles)
    {
        $this->make_model = $carModel;
        $this->price = $carPrice;
        $this->miles = $carMiles;
    }
    function getModel ()
    {
          return $this->make_model;
    }
    function setModel ($userModel)
    {
        $this->make_model = $userModel;
    }
    function getPrice ()
    {
        return $this->price;
    }
    function setPrice ($userPrice)
    {
        $this->price = $userPrice;
    }
    function getMiles ()
    {
        return $this->miles;
    }
    function setMiles ($userMiles)
    {
        $this->miles = $userMiles;
    }
}


?>
