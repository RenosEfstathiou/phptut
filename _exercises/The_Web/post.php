<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Post</title>
</head>

<body>
    <?php
    echo  $_POST['text1'];

    ?>
    <form action="post.php" method="post" class="m-3">
        <div class="form-group mt-1">
            <label for="text1">Enter some text</label>
            <input type="text" name="text1" id="text1" class="form-control">
        </div>
        <input type="submit" value="Submit" class="mt-1 btn btn-primary">
    </form>

</body>

</html>