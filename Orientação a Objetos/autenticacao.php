<?php

use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Endereco;
use Alura\Banco\Modelo\Funcionario\Diretor;
use Alura\Banco\Modelo\Funcionario\Gerente;
use Alura\Banco\Service\Autenticador;

require_once 'autoload.php';

$autenticador = new Autenticador();
$umDiretor = new Diretor("Diego", new Cpf("456.798.132-89"), 2000.0);
$umGerente = new Gerente("Diego", new Cpf("456.798.132-89"), 2000.0);
$umTitular= new Titular(new Cpf("456.798.132-89"), "Diego", new Endereco("Pirapozinho","Centro", "Rua X", "22"));

$autenticador->tentaLogin($umDiretor, "1234");
$autenticador->tentaLogin($umGerente, "12345");
$autenticador->tentaLogin($umTitular, "132456");
