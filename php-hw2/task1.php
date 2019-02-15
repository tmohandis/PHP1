<?php

$a = rand(-10, 10);
$b = rand(-10, 10);

if ($a >= 0 & $b >= 0) {
    echo $a - $b;
} else {
    if ($a < 0 & $b < 0) {
        echo $a * $b;
    } else {
        echo $a + $b;
    }
}
