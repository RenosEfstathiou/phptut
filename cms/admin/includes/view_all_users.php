<table class=" table table-bordered table-responsive table-hover ">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody>


        <?php
        $query = "SELECT * FROM  users";
        $res = mysqli_query($connection, $query);

        if ($res) {
            while ($row = mysqli_fetch_assoc($res)) {
                $user_id = $row['user_id'];
                $user_username = $row['user_username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
                $role = $row['role'];
                $randSalt = $row['randSalt'];

                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$user_username </td>";


                // $query = "SELECT * FROM categories WHERE cat_id ={$user_category_id} ";
                // $c_id_res = mysqli_query($connection, $query);
                // while ($row1 = mysqli_fetch_assoc($c_id_res)) {
                //     $cat_id = $row1['cat_id'];
                //     $cat_title = $row1['cat_title'];
                //     echo "<td>$cat_title</td>";
                // }





                echo "<td>$user_firstname</td>";
                echo "<td>$user_lastname</td>";
                echo "<td>$user_email </td>";
                echo "<td>$role </td>";
                echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
                echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                echo "<tr>";
            }
        }
        ?>

    </tbody>
</table>


<?php
if (isset($_GET['delete'])) {
    deleteUser();
}
if (isset($_GET['change_to_admin'])) {
    changeToAdmin();
}
if (isset($_GET['change_to_sub'])) {
    changeToSub();
}

?>