<?php 

$cars = array();

var_dump($cars);

class Car {
    function Car(){
        $this->model = "VW";
    }
}

$herbie = new Car();

echo $herbie->model;

$numero = null;

var_dump($numero);

$nome = "Diego Torres";

echo strlen($nome);

if (strlen($nome) <= 5){
    echo "Nome pequeno";
} else {
    echo "Nome grande";
}

echo str_word_count($nome);
echo "<br>";
echo strrev($nome);
echo "<br>";
echo strpos($nome, "Torres");
echo "<br>";
echo str_replace("Torres", "Barbosa", $nome);

$numero = 5;

echo "<br>";

var_dump(is_nan($numero));

$x = 5689;
$y = "5689.9";

var_dump(is_numeric($x));
var_dump(is_numeric($y));


//casting
$int_cast = (float)$y;
echo $int_cast;
echo "<br>";


//criando constantes
define("VALOR", 50);
echo VALOR;
echo "<br>";

define("CARROS", [
    "Ford",
    "Chevrolet",
    "Toyota"
]);
echo CARROS[1];
echo "<br>";

var_dump(7 <=> 8);
var_dump(8 <=> 8);
var_dump(9 <=> 8);

$false = false;
$true = true;

var_dump($false xor $true);

$txt1 = "Hello";
$txt2 = " World";
echo $txt1.$txt2;
$txt1 .= $txt2;
echo "<br>";
echo $txt1;

echo "<br>";
echo $false = false ? "Sim" : "Não";
echo "<br>";

$valor = 0;
switch($valor){
    case 1:
        echo "Falso";
        break;
    case 2:
        echo "Falso";
        break;
    case 0:
        echo "Verdadeiro";
        break;
    default:
        echo "Nenhum";
        break;
}


for ($i = 0; $i < 10; $i++){
    if ($i == 5)
        continue;
    echo "$i <br>";
}

$colors = array("red", "green", "blue", "yellow"); 

foreach ($colors as $value){
    echo "$value <br>";
}

$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

foreach($age as $x => $val) {
  echo "$x = $val<br>";
}

?>