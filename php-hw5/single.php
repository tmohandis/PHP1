<?php
$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'GEEK_PROJECT'
);

$sql = "select * from `IMAGES` where id = 2";

$result = mysqli_query($connection, $sql);


$arr = [];

while ($row = mysqli_fetch_assoc($result)) {
    $arr[] = $row;
};
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Пример веб-страницы</title>
    <style type="text/css">

    </style>
</head>
<body>
<?php foreach ($arr as $key) :?>

    <img src="<? echo $key["name"]?>" alt="image">
<?php endforeach;?>
</body>
</html>