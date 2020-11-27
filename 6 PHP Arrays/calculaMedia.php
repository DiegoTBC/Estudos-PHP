<?php

require_once 'Calculadora.php';

$notas = [12,7,9,4,10];

$calculadora = new Calculadora();
$media = $calculadora->calculaMedia($notas);
echo $media;

foreach($notas as $a){

}

var_dump($notas);
sort($notas);
var_dump($notas);

$nomes = "Diego, Laura, Regina";

//transforma em array
$arrayNomes = explode(",", $nomes);
var_dump($arrayNomes);

//transforma em string
$nomesJuntos = implode(", ", $arrayNomes);
echo $nomesJuntos;

?>