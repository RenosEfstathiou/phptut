<?php include "includes/admin_header.php"; ?>
<?php ob_start(); ?>


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
                        <?php insertCategories(); ?>
                        <!-- Add Category Form -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title" id="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="cat_submit" value="Add Category">
                            </div>
                        </form>
                        <!-- Edit Category Form -->
                        <?php
                        if (isset($_GET['edit'])) {
                            $id = $_GET['edit'];
                            $id = mysqli_real_escape_string($connection, $id);
                            include "includes/edit_categories.php";
                        }

                        ?>


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
                                <?php findAllCategories(); ?>

                                <?php
                                deleteCategory();
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