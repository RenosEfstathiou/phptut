<?php

function confirm($res)
{
    global $connection;
    if (!$res) {
        die("QUERY FAILED: <br>" . mysqli_error($connection));
    }
}


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


function showAllComments()
{
    global $connection;
    $query = "SELECT * FROM  comments ";
    $res = mysqli_query($connection, $query);

    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $com_id = $row['com_id'];
            $com_post_id = $row['com_post_id'];
            $com_author = $row['com_author'];
            $com_email = $row['com_email'];
            $com_status = $row['com_status'];
            $com_content = $row['com_content'];
            $com_date = $row['com_date'];

            echo "<tr>";
            echo "<td>$com_id</td>";
            echo "<td>$com_author </td>";
            echo "<td>$com_content</td>";
            echo "<td>$com_email</td>";
            echo "<td>$com_status</td>";
            $query = "SELECT * FROM posts WHERE post_id = $com_post_id ";
            $p_id_res =  mysqli_query($connection, $query);

            while ($row1 = mysqli_fetch_assoc($p_id_res)) {
                $post_id = $row1['post_id'];
                $post_title = $row1['post_title'];
                echo  " <td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            }
            echo "<td>$com_date </td>";
            echo "<td><a href='comments.php?approve={$com_id}'>Aprove</a></td>";
            echo "<td><a href='comments.php?unapprove={$com_id}'>Unaprove</a></td>";
            echo "<td><a href='comments.php?delete={$com_id}'>Delete</a></td>";
            echo "<tr>";
        }
    }
}

function deleteComment($delete_id)
{
    global $connection;
    if (is_numeric($delete_id)) {
        $query = "DELETE FROM  comments ";
        $query .= "WHERE com_id={$delete_id}";

        $res = mysqli_query($connection, $query);
        confirm($res);
        header("Location: comments.php");
    }
}


function unapproveComment($unapprove_id)
{
    global $connection;
    if (is_numeric($unapprove_id)) {
        $query = "UPDATE comments  SET com_status = 'unapproved' ";
        $query .= "WHERE com_id = $unapprove_id ";
        $res =  mysqli_query($connection, $query);
        confirm($res);
        header("Location: comments.php");
    }
}

function approveComment($approve_id)
{
    global $connection;
    if (is_numeric($approve_id)) {
        $query = "UPDATE comments  SET com_status = 'approved' ";
        $query .= "WHERE com_id = $approve_id ";
        $res =  mysqli_query($connection, $query);
        confirm($res);
        header("Location: comments.php");
    }
}
