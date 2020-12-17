<?php

$name = "someName";
$value = 100;
$expire =  time() + (60 * 60 * 24 * 7);
setcookie($name, $value, $expire);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>

<body>

    <?php

    if (isset($_COOKIE["someName"])) {

        $cookieValue = $_COOKIE["someName"];
    } else
        $cookieValue = 'no cookie';

    echo $cookieValue;
    ?>

</body>

</html>