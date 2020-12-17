<?php
include 'db.php';
include 'functions.php';
if (isset($_POST['submit'])) {

    createData();
}

?>
<?php include "includes/header.php" ?>

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

<?php include "includes/footer.php" ?>