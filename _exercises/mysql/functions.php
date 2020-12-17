<?php
include 'db.php';

function createData()
{
    global $connection;
    // get submited values from post method
    $username = $_POST['username'];
    $password = $_POST['password'];
    // trim string so that we dont save empty fields in db

    if (trim($username) &&  trim($password)) {
        echo  $username . ' ' . $password;
        // we clean string from sqli ;
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        $hashFormat = "$2y$10$";
        $salt = "IssaKnife21savageMetro";
        $hashFnSalt = $hashFormat . $salt;
        $encript_password = crypt($password, $hashFnSalt);

        // create the query
        $query = "INSERT INTO users(username,password) ";
        $query .= "VALUES ('$username','$encript_password ')";
        // submit query
        $res = mysqli_query($connection, $query);
        // check if the query worked
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
