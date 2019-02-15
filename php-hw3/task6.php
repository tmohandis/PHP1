<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Пример веб-страницы</title>
 </head>
 <body>
 <?php
 function menuGen ($array, $sub = 0){
     echo "<ul>";
     foreach ($array as $el){
         if (sub == 0) echo "<li> {$el} </li>";
         else {
             "<li>".$el.menuGen($sub)."</li>";
         }
     }
     echo "</ul>";
 }

 $arr = ['Пункт1', 'Пункт2', 'Пункт3'];

 //menuGen($arr);
 menuGen($arr,$arr)
 ?>
 </body>
</html>