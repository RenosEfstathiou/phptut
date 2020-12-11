<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function params</title>
</head>

<body>
    <?php


    function greet($fName, $lName)
    {
        echo 'First name : ' . $fName . '<br>';
        echo 'Last name : ' . $lName . '<br>';
        echo 'Your sum  is  : ' . calculate(43, 63) . ' $<br>';
    }

    function calculate($num1, $num2)
    {
        return  $num1 + $num2;
    }

    greet('Renos', 'Efstathiou');






    ?>
</body>

</html>