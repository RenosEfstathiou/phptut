<?php
class Car
{
    function MoveWheels()
    {

        echo "wheels moved";
    }
}

if (method_exists("Car", "MoveWheels")) {
    echo "The Method Exists";
} else {
    echo "Method does not exist";
}
