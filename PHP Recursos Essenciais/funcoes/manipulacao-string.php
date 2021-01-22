<?php

$frase = "Treinaweb Cursos";
var_dump(strpos($frase, 'r', 5));

var_dump(str_replace('r', '*', $frase));
var_dump(str_replace(['r', 'w'], ['*', '#'], $frase));

var_dump(substr($frase, 6,3));