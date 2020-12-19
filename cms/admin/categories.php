<?php include "includes/admin_header.php";


?>

<div id="wrapper">
    <!-- NAVIGATION -->

    <?php include  "includes/admin_navigation.php";  ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author name</small>
                    </h1>

                    <div class="col-xs-6">
                        <?php
                        if (isset($_POST['cat_submit'])) {
                            $category = $_POST['cat_title'];
                            if (trim($category) != "") {
                                $category = mysqli_real_escape_string($connection, $category);
                                $query = "INSERT INTO categories(cat_title) ";
                                $query .= "VALUES('{$category}')";

                                $res = mysqli_query($connection, $query);
                                if (!$res) {
                                    die("QUERY FAILED : <br>" . mysqli_error($connection));
                                }
                            } else
                                echo "This field should be filled!";
                        }
                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title" id="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="cat_submit" value="Add Category">
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM categories ";
                                $res = mysqli_query($connection, $query);
                                if ($res) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $id = $row['cat_id'];
                                        $title = $row['cat_title'];

                                ?> <tr>

                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $title; ?></td>
                                            <td><a href="categories.php?delete=<?php echo $id ?>">DELETE</a></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>

                                <?php
                                if (isset($_GET['delete'])) {
                                    $delete_id = $_GET['delete'];
                                    $delete_id = mysqli_real_escape_string($connection, $delete_id);

                                    $query = "SELECT * FROM categories ";
                                    $query .= "WHERE cat_id ={$delete_id} ";
                                    $res = mysqli_query($connection, $query);

                                    $found = mysqli_num_rows($res);

                                    if ($found > 0) {

                                        $query =  "DELETE FROM categories ";
                                        $query .= "WHERE cat_id = {$delete_id} ";

                                        $res = mysqli_query($connection, $query);

                                        if (!$res) {
                                            die("QUERY FAILED : <br>" . mysqli_error($connection));
                                        } else
                                            header("Location: categories.php");
                                    } else echo "Category does not exist";
                                }

                                ?>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include  "includes/admin_footer.php" ?>