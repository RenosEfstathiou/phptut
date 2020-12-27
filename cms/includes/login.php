<?php include "db.php";
include "../functions.php"; ?>

<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username !== '' || $password !== '' || !empty($password) || !empty($username)) {

        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT  * FROM users  WHERE user_username = '{$username}' ";
        $res = mysqli_query($connection, $query);
        confirm($res);

        if (mysqli_num_rows($res) > 0) {

            while ($row = mysqli_fetch_assoc($res)) {
                $db_id = $row['user_id'];
                $db_username = $row['user_username'];
                $db_firstname = $row['user_firstname'];
                $db_lastname = $row['user_lastname'];
                $db_password = $row['user_password'];
                $db_role = $row['role'];
            }


            if ($username !== $db_username && $password !== $db_password) {
                header("Location: ../index.php");
            } else if ($username == $db_username && $password == $db_password) {
                $_SESSION['user_id'] = $db_id;
                $_SESSION['username'] = $db_username;
                $_SESSION['firstname'] = $db_firstname;
                $_SESSION['lastname'] = $db_lastname;
                $_SESSION['role'] = $db_role;
                header("Location: ../admin");
            } else {
                header("Location: ../index.php");
            }
        } else {
            header("Location: ../index.php");
        }
    } else {
        echo "Please fill in the required fields to login";
    }
}

?>