<?php

/*
 * escreve no arquivo
$arquivo = fopen('cursos-php.txt', 'a');

$curso = "\nDesign Patterns PHP II";

fwrite($arquivo, $curso);

fclose($arquivo);
*/

$curso = "\nDesign Patterns PHP I";
file_put_contents('cursos-php.txt', $curso, FILE_APPEND);