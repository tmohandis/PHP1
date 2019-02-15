<?php

$x = rand(0, 10);
$y = rand(0, 10);

echo "Значения переменных x = {$x}, y = {$y} \n";

function sum($a, $b)
{
    return $a + $b;
}

function sub($a, $b)
{
    return $a - $b;
}

function multp($a, $b)
{
    return $a * $b;
}

function div($a, $b)
{
    if ($b != 0) {
        return $a / $b;
    } else {
        echo "Деление на 0 недопустимо!";
    }
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case sum:
            return sum($arg1, $arg2);
        case sub:
            return sub($arg1, $arg2);
        case multp :
            return multp($arg1, $arg2);
        case div:
            return div($arg1, $arg2);

    }

}

echo "Операция суммы: " . mathOperation($x, $y, "sum") . PHP_EOL;
echo "Операция вычитания: " . mathOperation($x, $y, "sub") . PHP_EOL;
echo "Операция умножения: " . mathOperation($x, $y, "multp") . PHP_EOL;
echo "Операция деления: " . mathOperation($x, $y, "div") . PHP_EOL;