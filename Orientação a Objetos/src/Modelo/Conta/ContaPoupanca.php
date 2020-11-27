<?php

namespace Alura\Banco\Modelo\Conta;

require_once 'autoload.php';

class ContaPoupanca extends Conta
{
    protected function percentualTarifa(): float{
        return 0.03;
    }
}
