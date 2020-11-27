<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Funcionario\{Desenvolvedor, Gerente, Diretor, EditorDeVideo};
use Alura\Banco\Service\ControladorDeBonificacoes;


$umFuncionario = new Desenvolvedor(
    "Diego Torres",
    new Cpf("132.456.749-89"),
    1500.00);

$umaFuncionaria = new Gerente(
    "Laura Regina",
    new Cpf("132.456.749-89"),
    2000.00);

$umaFuncionaria2 = new Diretor(
    "Laura Regina",
    new Cpf("132.456.749-89"),
    2000.00);

$umEditor = new EditorDeVideo(
    "Paulo",
    new Cpf("465.789.123-89"),
    3000.0
);

$controlador = new ControladorDeBonificacoes();
$controlador->adicionarBonificacaoDe($umFuncionario);
$controlador->adicionarBonificacaoDe($umaFuncionaria);
$controlador->adicionarBonificacaoDe($umaFuncionaria2);
$controlador->adicionarBonificacaoDe($umEditor);
$controlador->recuperarTotalBonificacoes();