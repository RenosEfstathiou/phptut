<table class=" table table-bordered table-responsive table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Content</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Aprove</th>
            <th>Unapprove</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody>


        <?php
        showAllComments();
        ?>

    </tbody>
</table>


<?php
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    deleteComment($delete_id);
}
?>

<?php
if (isset($_GET['approve'])) {
    $approve_id = $_GET['approve'];
    approveComment($approve_id);
}
?>

<?php
if (isset($_GET['unapprove'])) {
    $unappove_id = $_GET['unapprove'];
    unapproveComment($unappove_id);
}
?>