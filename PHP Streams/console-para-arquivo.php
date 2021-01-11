<?php


$novoCurso = trim(fgets(STDIN));

file_put_contents('cursos-php.txt', "$novoCurso", FILE_APPEND);