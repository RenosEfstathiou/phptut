<?php

$host = "localhost";
$user = "root";
$password = "";
$name = "cms";

$connection = mysqli_connect($host, $user, $password, $name);

if (!$connection) {
    die("Database faild to connect :<br>" . mysqli_error($connection));
}
