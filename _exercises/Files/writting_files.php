<?php

$file = "example.txt";

if ($handle = fopen($file, 'w')) {

    fwrite($handle, "We done did it <3 dasdjkashdkahsd hawhd w djkahdjkawh dkjaw dhkjdhfselkjfh lkasfhkeushfksfaueashf keush fkaseufh iuskefhjke hfks fkues fleku sfku ekufhkjla hfe keuhflkaef");


    fclose($handle);
} else {
    echo "The file was not able to be written";
}
