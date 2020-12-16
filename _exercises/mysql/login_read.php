<?php
include 'db.php';

$query = "SELECT * FROM users ";

$res = mysqli_query($connection, $query);

if (!$res) {
    die('Query failed' . mysqli_error($connection));
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
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <pre>
                <?php
                print_r($row);
                ?>
               </pre>
            <?php

            }


            ?>
        </div>
    </div>

</body>

</html>