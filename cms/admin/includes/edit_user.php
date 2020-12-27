<?php
if (isset($_GET['edit_user'])) {
    //global $connection;
    $user_id = $_GET['edit_user'];
    $query = "SELECT * FROM users  WHERE user_id =$user_id ";
    $res = mysqli_query($connection, $query);
    confirm($res);

    while ($row = mysqli_fetch_assoc($res)) {
        $user_username = $row['user_username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
        $role = $row['role'];
?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="user_username">Username</label>
                <input value="<?php echo $user_username; ?>" type="text" name="user_username" class="form-control">
            </div>

            <div class="form-group">
                <label for="user_firstname">First name</label>
                <input value="<?php echo $user_firstname; ?>" type="text" name="user_firstname" class="form-control">
            </div>

            <div class="form-group">
                <label for="user_lastname">Last name</label>
                <input value="<?php echo $user_lastname; ?>" type="text" name="user_lastname" class="form-control">
            </div>

            <div class="form-group">
                <label for="user_email">Email</label>
                <input value="<?php echo $user_email; ?>" type="text" name="user_email" class="form-control">
            </div>
            <div class="form-group">
                <label for="user_password">Password</label>
                <input value="<?php echo $user_password; ?>" type="password" name="user_password" class="form-control">
            </div>

            <div class="form-group">
                <select name="role">
                    <option value="<?php echo $role ?>"><?php echo $role ?></option>

                    <?php

                    if ($role == 'admin')
                        echo " <option value='subscriber'>Subscriber</option>";
                    else


                    ?>
                </select>
            </div>

            <!-- 
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div> -->

            <div class="form-group">
                <input class="btn btn-primary" name="edit_user" type="submit" value="Edit User">
            </div>

        </form>


<?php
}
}

?>
<?php

if (isset($_POST['edit_user'])) {
    editUser();
}


?>