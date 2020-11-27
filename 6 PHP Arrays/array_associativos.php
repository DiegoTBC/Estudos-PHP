<?php
namespace Alura;
require "autoload.php";

$correntistas = [
    "Diego",
    "Laura",
    "Regina"
];

$correntistasNaoPagantes = [
    "Diego"
];

$saldos = [
    2500,
    3001,
    1000
];

$correntistasPagantes = array_diff($correntistas, $correntistasNaoPagantes);
var_dump($correntistasPagantes);
$relacionados = array_combine($correntistas, $saldos);
var_dump($relacionados);

if (array_key_exists("Joao", $relacionados)){
    echo "Existe";
} else {
    echo "Não encontrado";
}

$maiores = ArrayUtils::saldoMaior(3000, $relacionados);
var_dump($maiores);
?>