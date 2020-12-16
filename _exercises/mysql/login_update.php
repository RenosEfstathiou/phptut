<?php include 'db.php'; ?>
<?php include 'functions.php'; ?>

<?php

if (isset($_POST['submit'])) {
    updateData();
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
            <form action="login_update.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>

                <div class="form-group my-1">
                    <select name="id" id="id">

                        <?php
                        showAllData()
                        ?>

                    </select>
                </div>
                <input type="submit" name='submit' value="Update" class="btn btn-primary">

            </form>



        </div>
    </div>

</body>

</html>