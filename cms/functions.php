<?php

function confirm($res)
{
    global $connection;
    if (!$res) {
        die("QUERY FAILED: <br>" . mysqli_error($connection));
    }
}


function submitComment()
{
    global $connection;
    $post_id =  $_GET['p_id'];
    $com_author = $_POST["com_author"];
    $com_email = $_POST["com_email"];
    $com_content = $_POST["com_content"];

    $com_author = mysqli_real_escape_string($connection, $com_author);
    $com_email = mysqli_real_escape_string($connection, $com_email);
    $com_content = mysqli_real_escape_string($connection, $com_content);

    $query = "INSERT INTO comments(com_post_id,com_author
    ,com_email,com_content,com_status,com_date)  ";
    $query .= "VALUES ($post_id, '{$com_author}','{$com_email}','{$com_content}','unaproved', now() )";

    $res = mysqli_query($connection, $query);

    confirm($res);

    $query = "UPDATE posts SET  post_comment_count = post_comment_count + 1 ";
    $query .= " WHERE  post_id = $post_id ";

    $res1 = mysqli_query($connection, $query);

    confirm($res);
}

function  showComments()
{
    if (isset($_GET['p_id'])) {
        global $connection;
        $p_id = $_GET['p_id'];
        $query = "SELECT * FROM comments WHERE com_post_id = $p_id ";
        $query .= "AND com_status = 'approved' ";
        $query .= "ORDER BY  com_id DESC ";
        $res = mysqli_query($connection, $query);

        while ($row =  mysqli_fetch_assoc($res)) {
            $com_author  = $row['com_author'];
            $com_date  = $row['com_date'];
            $com_email  = $row['com_email'];
            $com_content  = $row['com_content'];
?>

            <!-- Comment -->
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $com_author ?>
                        <small>
                            <?echo $com_date?></small>
                    </h4>
                    <?php echo $com_content ?>
                </div>
            </div>

<?php

        }
    }
}
