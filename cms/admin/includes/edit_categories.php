<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php
        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            $query = "SELECT * FROM categories ";
            $query .= "WHERE cat_id = $edit_id ";

            $res = mysqli_query($connection, $query);
            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['cat_id'];
                    $category = $row['cat_title'];
        ?>
                    <input value="<?php if (isset($category)) echo $category; ?>" type="text" class="form-control" name="cat_title" id="cat_title">

        <?php }
            }
        }

        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="cat_edit" value="Update Category">
    </div>
</form>

<?php
if (isset($_POST['cat_edit'])) {
    $cat_title = mysqli_real_escape_string($connection, trim($_POST['cat_title']));
    if ($cat_title != "") {
        $query = "UPDATE categories ";
        $query .= "SET cat_title='{$cat_title}' ";
        $query .= "WHERE cat_id = {$id}";

        $res =  mysqli_query($connection, $query);
        if (!$res) {
            die("QUERY FAILED: <br>" . mysqli_error($connection));
        }
    }
}


?>