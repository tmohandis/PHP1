<?php
define('SITE_TITLE', 'Урок 5');

define("TEMPLATES_DIR", "../templates/");
define("ENGINE_DIR", "../engine/");
define("LAYOUTS_DIR", "/layouts/");
define("IMAGE_DIR", "img/gallery/");
define("PREV_IMAGE_DIR", "img/prev/");
/* DB config */
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'engine');

include_once ENGINE_DIR . 'functions.php';
include_once ENGINE_DIR . 'db.php';