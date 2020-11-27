<?php

namespace Alura\Banco\Modelo\Conta;

require_once 'autoload.php';

class ContaCorrente extends Conta
{   
    protected function percentualTarifa(): float{
        return 0.05;
    }

    public function transferir(float $valorATransferir, Conta $contaDestino){
        if ($valorATransferir > $this->saldo){
            echo "Saldo insuficiente";
            return;
        }

        $this->sacar($valorATransferir);
        $contaDestino->depositar($valorATransferir);
    }
}
