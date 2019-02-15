<?php
$connection = mysqli_connect(
    'localhost',
    'root',
    '',
    'GEEK_PROJECT'
);

$sql = "select * from `IMAGES`";

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
       img {
            max-height: 200px;
           max-width: 300px;
        }
    </style>
</head>
<body>
<?php foreach ($arr as $key) :?>

<img src="<? echo $key["path"]?>" alt="image">
<?php endforeach;?>
</body>
</html>