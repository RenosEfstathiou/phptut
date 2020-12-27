<?php
// checks if there was an error exequting the query;
function confirm($res)
{
    global $connection;
    if (!$res) {
        die("QUERY FAILED: <br>" . mysqli_error($connection));
    }
}

/*
 
 * *** Categorie functions *** *
 
  */
// inserts  a new category
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

//prints all categories in the categories page
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

// removes a category from the database
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

/*

* *** Post functions *** *

*/
// Create a new post
function addPost()
{
    global $connection;
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];


    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');



    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content,post_tags,post_status ) ";
    $query .= "VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}') ";

    $res = mysqli_query($connection, $query);

    confirm($res);
}

/*

* *** Comment functions *** *

*/

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

/*

    * *** User functions *** *
*/

function addUser()
{
    global $connection;
    $user_username = $_POST['user_username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $role = $_POST['role'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $user_username = mysqli_real_escape_string($connection, $user_username);
    $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
    $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);

    $query = "INSERT INTO  users(user_username,user_firstname,user_lastname,role,user_email,user_password,user_image,randSalt) ";
    $query .= " VALUES ('{$user_username}','{$user_firstname}', '{$user_lastname}','{$role}','{$user_email}','{$user_password}' , '','' )";

    $res = mysqli_query($connection, $query);

    confirm($res);

    echo "User Created: " . " " . "<a href='users.php'>View Users </a> ";
}

function deleteUser()
{
    global $connection;
    $delete_id = $_GET['delete'];
    if (is_numeric($delete_id)) {
        $query = "DELETE FROM  users ";
        $query .= "WHERE user_id={$delete_id}";

        $res = mysqli_query($connection, $query);
        confirm($res);
        header("Location:users.php");
    }
}

function changeToAdmin()
{
    $user_id = $_GET['change_to_admin'];
    if (is_numeric($user_id)) {
        global $connection;
        $query = "UPDATE users  SET  role = 'admin' WHERE user_id = $user_id ";

        $res = mysqli_query($connection, $query);
        confirm($res);
        header("Location: users.php");
    }
}

function changeToSub()
{
    $user_id = $_GET['change_to_sub'];
    if (is_numeric($user_id)) {
        global $connection;
        $query = "UPDATE users  SET  role = 'subscriber' WHERE user_id = $user_id ";

        $res = mysqli_query($connection, $query);
        confirm($res);
        header("Location: users.php");
    }
}

function editUser()
{
    global $connection;
    $user_id = $_GET['edit_user'];
    $user_username = $_POST['user_username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $role = $_POST['role'];

    $user_username = mysqli_real_escape_string($connection, $user_username);
    $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
    $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);

    $query = "UPDATE users SET  ";
    $query .= "user_username = '{$user_username}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "role = '{$role}' ";
    $query .= "WHERE user_id =$user_id ";

    $res = mysqli_query($connection, $query);

    confirm($res);
    header("Location: users.php?source=edit_user&edit_user={$user_id}");
}

function updateProfile($user_id)
{
    global $connection;
    $user_id = $user_id;
    $user_username = $_POST['user_username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $role = $_POST['role'];

    $user_username = mysqli_real_escape_string($connection, $user_username);
    $user_firstname = mysqli_real_escape_string($connection, $user_firstname);
    $user_lastname = mysqli_real_escape_string($connection, $user_lastname);
    $user_email = mysqli_real_escape_string($connection, $user_email);
    $user_password = mysqli_real_escape_string($connection, $user_password);

    $query = "UPDATE users SET  ";
    $query .= "user_username = '{$user_username}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "role = '{$role}' ";
    $query .= "WHERE user_id =$user_id ";

    $res = mysqli_query($connection, $query);

    confirm($res);
    header("Location: profile.php");
}
