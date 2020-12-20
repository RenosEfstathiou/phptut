<?php
function insertCategories()
{
    global $connection;
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
}


function findAllCategories()
{
    global $connection;

    $query = "SELECT * FROM categories ";
    $res = mysqli_query($connection, $query);
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $id = $row['cat_id'];
            $title = $row['cat_title'];

            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$title}</td>";
            echo "<td><a href='categories.php?delete={$id}'>DELETE</a></td>";
            echo "<td><a href='categories.php?edit={$id}'>EDIT</a></td>";
            echo "</tr>";
        }
    }
}


function deleteCategory()
{
    global $connection;
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
}
