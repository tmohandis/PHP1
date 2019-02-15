<?php
$arr = scandir('images/image');

        $arr = scandir('images/image');

        for ($i = 2; $i < count($arr); $i++)
        {
            echo '<img src="images/image/'.$arr[$i].'" data-full_image_url="images/image/'.$arr[$i].' alt="Картинка">';
        }
