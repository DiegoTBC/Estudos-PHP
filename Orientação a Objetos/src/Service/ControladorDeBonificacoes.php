<?php


namespace Alura\Banco\Service;


use Alura\Banco\Modelo\Funcionario\Funcionario;

class ControladorDeBonificacoes
{
    private int $totalBonificacoes = 0;

    public function adicionarBonificacaoDe(Funcionario $funcionario)
    {
        //$this->totalBonificacoes += $funcionario->calcularBonificacao();
    }

    public function recuperarTotalBonificacoes(): float
    {
        return  $this->totalBonificacoes;
    }
}