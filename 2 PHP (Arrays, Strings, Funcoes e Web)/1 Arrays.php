<?php

$idades = array(21,23,43,65,78);

list($idadeVinicius, $idadeJoao, $idadeMaria) = $idades;

$idades2 = [32,54,76,45,43];


echo $idades[1];
echo "<br>";
echo $idades2[3];
echo "<br>";
echo $idades[4] + $idades2[2];
echo "<br>";
array_push($idades, 12);
echo "<br>";
$idades[] = 10;
echo "<br>";
echo "Tamanho da lista ".count($idades);
echo "<br>";
echo "Tamanho da lista ".count($idades2);
echo "<br><br>";

foreach($idades as $valor){
    echo $valor;
    echo "<br>";
}

?>