<div class="col-md-4">

    <!-- Login Form -->
    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Enter Username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Password" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" name="login" value="Login" class="btn btn-primary">
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Search Well -->

    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>


    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php
                    $query = "SELECT * FROM categories ";

                    $cat_res = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($cat_res)) {
                        $category = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                    ?>
                        <li><a href="category.php?category=<?php echo $cat_id; ?>"><?php echo strtoupper($category)  ?></a>
                        <?php
                    }
                        ?>

                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widgets.php" ?>

</div>