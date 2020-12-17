<?php include 'db.php'; ?>
<?php include 'functions.php'; ?>

<?php

if (isset($_POST['submit'])) {
    deleteData();
}
?>

<?php include "includes/header.php" ?>

<div class="container">
    <div class="col-sm-6">
        <form action="login_delete.php" method="post">
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

<?php include "includes/footer.php" ?>