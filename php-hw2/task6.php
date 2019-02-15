<?php

function power($val, $pow) {
    return ($pow > 0) ? $val * power($val, $pow -1): 1;
}

echo power(2,3);