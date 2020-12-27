<?php
if (isset($_GET['pid']))
    $edit_id = $_GET['pid'];
if (is_numeric($edit_id)) {


    $query = "SELECT * FROM  posts ";
    $query .= "WHERE post_id={$edit_id}";

    $res = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($res)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_image = $row['post_image'];
        $post_status = $row['post_status'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    }
}

if (isset($_POST['update_post'])) {
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {

        $query = "SELECT * FROM posts  WHERE  post_id =$post_id ";
        $imgres = mysqli_query($connection, $query);

        confirm($imgres);
        while ($row = mysqli_fetch_assoc($imgres)) {
            $post_image = $row['post_image'];
        }
    }

    $query = " UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$post_id}";

    $res =  mysqli_query($connection, $query);

    confirm($res);
}
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" name="post_title" class="form-control">
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
        <input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <select name="post_status">
            <option value="<?php echo $post_status ?>"><?php echo $post_status ?></option>

            <?php
            if ($post_status === 'draft') {
                echo "<option value='published'> Published </option>";
            } else {
                echo " <option value='draft'> Draft </option>";
            }
            ?>
        </select>
    </div>


    <div class="form-group ">
        <img width="200" src="../images/<?php echo $post_image; ?>">
        <input type='file' name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" name="update_post" type="submit" value="Update Post">
    </div>
</form>