<?php

$nota = 4;
$nota2 = 9;

//mais recomendado
echo $nota > 5 ? "Aprovado\n" : "Reprovado\n";

//não é recomendado pois perde a legibilidade
echo $nota2 > 5 ? ($nota2 >= 9 ? "Muito bem": "Aprovado") : "Reprovado";