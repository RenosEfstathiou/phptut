<?php

$file = "example.txt";

if ($handle = fopen($file, 'r')) {

    $content = fread($handle, filesize($file)); // each byte equals a character;

    echo $content;

    fclose($handle);
} else {
    echo "The file was not able to be written";
}
