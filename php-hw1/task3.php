<?php
    $a = 5;
    $b = '05';
    var_dump($a == $b);         // Почему true? Так как данный оператор сравнивает значения переменных, преобразовывая их
    var_dump((int)'012345');     // Почему 12345? Так как в целочисленных записях 0 слева отбрасывается
    var_dump((float)123.0 === (int)123.0); // Почему false? Так как float неидентичен integer
    var_dump((int)0 === (int)'hello, world'); // Почему true? Целочисленные переменные идентичны
?>