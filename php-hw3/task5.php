<?php

function replaceSpace ($string)
{
    $replace = explode( " " , $string);
    $replace = implode("_", $replace);
    return $replace;
}

$string = "Hello World it is me";
echo replaceSpace($string);