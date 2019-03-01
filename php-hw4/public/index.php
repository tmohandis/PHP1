<?php
include "../config/main.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

switch ($page) {
    case 'index':
        break;
    case 'catalog':
        $params = [
            'catalog' =>
            [
                "Спички",
                "Метла",
                "Ведро"
            ]
        ];
        break;
    case 'gallery':
        break;
    case 'load':
        break;

}
//var_dump($params);
//var_dump(__DIR__);
echo render($page, $params);


