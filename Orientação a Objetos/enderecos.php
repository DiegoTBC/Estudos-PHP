<?php

use Alura\Banco\Modelo\Endereco;

require_once "autoload.php";

$umEndereco = new Endereco("Pira", "Centro", "Rua X", "22");
$outroEndereco = new Endereco("PP", "Vila", "Rua Y", "11");

echo $umEndereco."\n";
echo $outroEndereco."\n";
echo $umEndereco->rua."\n";
$umEndereco->cidade = "Sandovalina";
echo $umEndereco->cidade;