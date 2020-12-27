<?php

if (isset($_POST['create_post'])) {

    addPost();
}

?>




<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">

        <select clas="form-" name="post_category_id">
            <?php
            $query = "SELECT * FROM categories ";
            $res = mysqli_query($connection, $query);

            confirm($res);
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['cat_id'];
                $title = $row['cat_title'];


                echo "<option value='{$id}'>{$title}</option>";
            }

            ?>

        </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" name="create_post" type="submit" value="Post">
    </div>




</form>