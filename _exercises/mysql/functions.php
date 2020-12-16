<?php
include 'db.php';

function createData()
{
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (trim($username) &&  trim($password)) {
        echo  $username . ' ' . $password;


        $query = "INSERT INTO users(username,password) ";
        $query .= "VALUES ('$username','$password')";

        $res = mysqli_query($connection, $query);

        if (!$res) {
            die('Query failed' . mysqli_error($connection));
        }
    }
}





function showAllData()
{
    global $connection;
    $query = "SELECT * FROM users ";
    $res = mysqli_query($connection, $query);
    if (!$res) {
        die('Query failed' . mysqli_error($connection));
    }
    while ($row =  mysqli_fetch_assoc(($res))) {
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}


function updateData()
{
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "UPDATE users SET ";
    $query .=  "username = '$username', ";
    $query .=  "password = '$password' ";
    $query .=  "WHERE id = $id ";

    $res = mysqli_query($connection, $query);
    if (!$res) {
        die('Query FAILED : <br>' . mysqli_error($connection) . '<br>');
    }
}


function deleteData()
{

    global $connection;
    $id =  $_POST['id'];
    $query = "DELETE  FROM users ";
    $query .= "WHERE  id = $id ";

    $res =  mysqli_query($connection, $query);

    if (!$res) {
        die('Query FAILED : <br>' . mysqli_error($connection) . '<br>');
    }
}
