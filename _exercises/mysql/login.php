<?php
include 'db.php';
include 'functions.php';
if (isset($_POST['submit'])) {

    createData();
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Login php</title>
</head>

<body>

    <div class="container">
        <div class="col-sm-6">
            <form action="login.php" class="form-group" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name='username' class="form-control">
                </div>
                <div class="form-group mb-1">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <input type="submit" value="Submit" name='submit' class="btm btn-primary">

            </form>

        </div>
    </div>

</body>

</html>