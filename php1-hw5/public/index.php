<?php
include "../config/main.php";

$url_array = explode("/", $_SERVER['REQUEST_URI']);


if ($url_array[1] == "")
    $page = "index";
else
    $page = $url_array[1];

$params = prepareVariables($page);


echo render($page, $params);


closeDb();