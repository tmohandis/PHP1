
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php 
    define ("TITLE", "website");
    $currentYear = 	date("Y");
    echo TITLE . $currentYear;  
    ?> </title>
</head>
<body>

<?php
    $a = "Hello, username";
    echo "<h1>{$a}</h1>"
?>

<h2> <?php $b = 5;
var_dump (b); ?> </h2>
    
</body>
</html>