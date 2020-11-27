<?php

use Alura\Banco\Modelo\Conta\Conta;
use Alura\Banco\Modelo\Conta\ContaCorrente;
use Alura\Banco\Modelo\Conta\Titular;
use Alura\Banco\Modelo\Cpf;
use Alura\Banco\Modelo\Endereco;

require_once 'autoload.php';

$conta = new ContaCorrente(
    new Titular(
        new Cpf("465.789.123-89"),
        "Diego Torres", 
        new Endereco("Pirapozinho", "Centro", "Rua X", "22")),
        100.54);