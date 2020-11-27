<?php 
$age = ["Diego"=>19, "Laura"=>18];
echo json_encode($age);

$cars = ["Volvo", "BMW", "Mercedez"];
echo json_encode($cars);

//json_decode() retorna um objeto por padrão
//a função tem um segundo parâmetro e, quando definido como verdadeiro, 
//os objetos JSON são decodificados em matrizes associativas.
$jsonObj = '{"Diego":19, "Laura":18}';
var_dump(json_decode($jsonObj,true));

$obj = json_decode($jsonObj);
echo $obj->Diego;
echo "<br>";
echo $obj->Laura;
echo "<br>";

$jsonObj = '{"Diego":19, "Laura":18}';
$obj = json_decode($jsonObj,true);
echo $obj['Diego']. "<br>";
echo $obj['Laura'];

?>