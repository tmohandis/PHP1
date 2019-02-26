<?php

$a = 0;

do {
    if ($a == 0) {
        echo  $a . " - это ноль\n";
    }
    if ($a % 2 != 0) {
        echo $a . " - нечетное число\n";
    } else {
        echo $a . " - четное число\n";
    }
    $a++;
} while ($a <= 10);