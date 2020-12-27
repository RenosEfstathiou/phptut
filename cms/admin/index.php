<?php include "includes/admin_header.php" ?>

<div id="wrapper">
    <!-- NAVIGATION -->
    <?php include  "includes/admin_navigation.php" ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>
                </div>

            </div>
            <?php include "includes/stats.php" ?>
            <hr>

            <div class="row">
                <?php
                $query = "SELECT * FROM  posts WHERE post_status = 'draft' ";
                $res = mysqli_query($connection, $query);
                confirm($res);
                $draft_posts = mysqli_num_rows($res);

                $query = "SELECT * FROM  posts WHERE post_status = 'published' ";
                $res = mysqli_query($connection, $query);
                confirm($res);
                $publishedt_posts = mysqli_num_rows($res);

                $query = "SELECT * FROM comments WHERE com_status = 'unapproved' ";
                $res = mysqli_query($connection, $query);
                confirm($res);
                $unapproverd_comments = mysqli_num_rows($res);

                $query = "SELECT * FROM users WHERE role = 'subscriber' ";
                $res = mysqli_query($connection, $query);
                confirm($res);
                $subscribers = mysqli_num_rows($res);
                ?>


                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],
                            <?php
                            $text = ['Active Posts', 'Draft Posts', 'Published Posts', 'Categories', 'Users', 'Subs', 'Comments', 'Pending Coms'];
                            $count = [$post_count, $draft_posts, $publishedt_posts, $cat_count, $user_count, $subscribers, $comment_count, $unapproverd_comments];

                            for ($i = 0; $i < 8; $i++) {
                                echo "['{$text[$i]}'" . "," . "{$count[$i]}],";
                            }

                            ?>
                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div class="xs-12 md-12 sm-12 lg-12" id="columnchart_material" style="width: auto; height: 500px;"></div>


            </div>






        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include  "includes/admin_footer.php" ?>