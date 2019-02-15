<?php

$date = date("G i");

function corrDate($date)
{
    $arr = explode(" ", $date);
    $str = "";
    foreach ($arr as $key => $value) {
        $str .= $value;
        switch ($value % 10) {
            case 0:
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
                ($key == 0) ? $str .= " часов " : $str .= " минут";
                break;
            case 2:
            case 3:
            case 4:
                ($key == 0) ? $str .= " часа " : $str .= " минуты";
                break;
            case 1:
                ($key == 0) ? $str .= " час " : $str .= " минута";
                break;
        }

    }
    return $str;
}

echo corrDate($date);