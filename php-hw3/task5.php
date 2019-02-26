<?php

function replaceSpace ($string)
{
    $replace = str_replace(" ", "_", $string);
    return $replace;
}

$string = "Hello World it is me";
echo replaceSpace($string);