<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $names = ['John', 'Renos', 'Nick', 'Huncho'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $umin = 4;
        $pmin = 6;
        if (strlen($username) < $umin) {
            echo 'Username must be longer than five <br> ';
        }
        if (strlen($password) < $pmin) {
            echo 'Password must be more that 6 characters <br>';
        }

        if (!in_array($username, $names)) {
            echo 'User not found';
        } else {
            echo 'Welcome';
        }
    }
}
