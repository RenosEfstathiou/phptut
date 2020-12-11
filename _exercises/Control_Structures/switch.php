<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch</title>
</head>

<body>

    <?php
    $num = 1;

    switch ($num) {
        case 1:
            echo 'one';
            break;
        case 2:
            echo 'two';
            break;
        case 3:
            echo 'three';
            break;
        case 4:
            echo 'four';
            break;
        default:
            echo 'none of the above';
            break;
    }

    ?>

</body>

</html>