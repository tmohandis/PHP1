<?php

/**
 *
 * Функция генерации меню
 * @param $array ассоциативный массив с обозначенными ключами: $name - название пункта меню,
 * $address - ссылка пункта меню, $submenu - подпункт меню (использует рекурсивный вызов функции)
 * @return string сгенерированное меню
 */

function menuGen($array)
{

    ob_start();
    echo "<ul>";
    foreach ($array as $item) {
        if (is_array($item)) extract($item);
        (isset($address)) ?: $address = "#";
        (isset($name)) ?: $name = "Пункт меню";
        if (isset($submenu)) {
            echo "<li><a href='{$address}'>{$name}</a>" . menuGen($submenu) . "</li>";

        } else {
            echo "<li><a href='{$address}'>{$name}</a></li>";
        }

    }
    echo "</ul>";
    return ob_get_clean();
}


$arr = [
    ["name" => "Google", "address" => "https://google.com"],
    ["name" => "Google", "address" => "https://google.com"],
    ["name" => "Google", "address" => "https://google.com", "submenu" => [
            ["name" => "Google", "address" => "https://google.com", "submenu" => [
                    ["name" => "Google", "address" => "https://google.com"]]
            ]
    ]
    ]
];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Пример веб-страницы</title>
</head>
<body>
<?= menuGen($arr) ?>
</body>
</html>