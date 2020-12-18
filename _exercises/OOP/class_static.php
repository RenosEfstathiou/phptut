<?php
class Car
{
    static $wheels = 4;
    protected $hood = 1;
    private $engine = 1;
    var $doors = 5;


    function MoveWheels()
    {

        echo "wheels moved";
    }

    function showProperty()
    {
        echo  $this->engine;
    }


    /**
     * Get the value of wheels
     */
    public function getWheels()
    {
        return Car::$wheels;
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

$car = new Car();

echo $car->getWheels();
