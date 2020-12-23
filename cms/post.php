<!-- DB Conection -->
<?php include "includes/db.php" ?>
<!-- Header -->
<?php
include "includes/header.php";
?>

<!-- Navigation -->

<?php
include "includes/navigation.php";
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <?php
            if (isset($_GET['p_id'])) {

                $search_id = $_GET['p_id'];

                $query = "SELECT * FROM posts WHERE post_id = $search_id ";

                $res = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($res)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

            ?>
                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content ?></p>

                    <hr>

                    <?php
                    if (isset($_POST['com_submit'])) {
                        submitPost();
                    }
                    ?>


                    <!-- Comments Form -->
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label for="com_author">Author</label>
                                <input class="form-control" type="text" name="com_author">
                            </div>
                            <div class="form-group">
                                <label for="com_email">Email</label>
                                <input type="text" class="form-control" name="com_email">
                            </div>
                            <div class="form-group">
                                <label for="com_content">Comment</label>
                                <textarea class="form-control" name="com_content"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary " value="Comment" name="com_submit">
                            </div>
                        </form>
                    </div>

                    <hr>

                    <!-- Posted Comments -->

                    <?php
                    showComments();

                    ?>










                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            <!-- Nested Comment -->
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Nested Start Bootstrap
                                        <small>August 25, 2014 at 9:30 PM</small>
                                    </h4>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                </div>
                            </div>
                            <!-- End Nested Comment -->
                        </div>
                    </div>
            <?php
                }
            }


            ?>



        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"  ?>

    </div>
    <!-- /.row -->

    <hr>

    <?php
    include "includes/footer.php";
    ?>