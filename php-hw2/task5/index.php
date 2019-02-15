<?php


function renderTemplate($page, $content = '')
{
    ob_start();
    $fileName = $page . ".php";
    include $fileName;
    return ob_get_clean();
}

//Вам нужно поменять только выражение ниже
//чтобы зарендерить и main и about внутри него
echo renderTemplate('main', file_get_contents("about.php"));
