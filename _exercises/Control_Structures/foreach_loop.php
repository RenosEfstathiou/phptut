<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach loop</title>
</head>

<body>
    <?php
    $arr = [1, 2, 3, 4, 6, 6, 8, 7];

    foreach ($arr as $key => $value) {
        echo 'Foreach' . ' ' . $value . '<br>';
    }


    ?>
</body>

</html>