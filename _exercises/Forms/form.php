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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>

<body>
    <form action="form.php" method="post">
        <input type="text" placeholder="Enter name" name='username'>
        <input type="Password" placeholder="Enter password" name="password">
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>