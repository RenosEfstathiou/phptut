<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array functions</title>
</head>

<body>
    <?php
    // refer in the folllowing page for more functions
    // https://www.php.net/manual/en/ref.array.php

    $arr = [122, 231, 23, -13, 4, 565, 23, 21, 3, 4, -618, 222, 1, 1333];

    echo max($arr) . '<br>';
    echo min($arr) . '<br>';
    sort($arr) . '<br>';
    echo print_r($arr) . '<br>';


    print_r(array_map(function ($val) {
        return $val + 2;
    }, $arr));



    ?>
</body>

</html>