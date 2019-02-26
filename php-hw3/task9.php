<?php

function translateRus($string)
{
    $alpabet = [
        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'sch',
        'ы' => 'i',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya'
    ];

    $string = str_replace(array_keys($alpabet), $alpabet, $string);
    return $string;
}


function replaceSpace ($string)
{
    $replace = str_replace(" ", "_", $string);
    return $replace;
}

$string = "привет мир это тестовый текст";
echo replaceSpace(translateRus($string));