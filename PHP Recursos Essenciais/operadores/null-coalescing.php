<?php

$cursos = [
    'php' => 7.4,
    'python' => 3
];
;
//echo isset($cursos['c#']) ? $cursos['c#'] : "Curso não existe\n";

//se o valor estiver setado apresenta ele, senão apresenta a mensagem padrão
echo $cursos['c#'] ?? "Curso não encontrado";