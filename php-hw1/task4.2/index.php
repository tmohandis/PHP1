<?php
define ("TITLE", "website ");
$currentYear = 	date("Y");
$a = "Hello, username";
$b = 5;

$site = file_get_contents('site.tpl');
$site = str_replace("{{TITLEYEAR}}",TITLE.$currentYear, $site);
$site = str_replace("{{VARA}}",$a, $site);
$site = str_replace("{{VARB}}",$b, $site);
echo $site;