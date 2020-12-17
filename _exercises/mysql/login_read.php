<?php
include 'db.php';

$query = "SELECT * FROM users ";

$res = mysqli_query($connection, $query);

if (!$res) {
    die('Query failed' . mysqli_error($connection));
}

?>

<?php include "includes/header.php" ?>

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

<?php include "includes/footer.php" ?>