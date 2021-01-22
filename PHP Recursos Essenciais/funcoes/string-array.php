<?php

//transforma a string em array
$cursos = explode(', ', "Php, c#, Java");
var_dump($cursos);

//transforma a array em string
$a = implode(" - ", $cursos);
var_dump($a);