<?php
class Car
{
    var $wheels = 4;
    var $hood = 1;
    var $engine = 1;
    var $doors = 5;


    function __construct()
    {
        echo $this->engine = 10;
    }

    function MoveWheels()
    {

        echo "wheels moved";
    }

    /**
     * Get the value of wheels
     */
    public function getWheels()
    {
        return $this->wheels;
    }

    /**
     * Set the value of wheels
     *
     * @return  self
     */

    public function setWheels($wheels)
    {
        $this->wheels = $wheels;

        return $this;
    }
}

$car1 = new Car();
