<?php

namespace Alura\Banco\Modelo\Conta;

abstract class Conta
{
    protected $titular;
    protected $saldo = 0;
    private static $numeroDeContas = 0;

    public function __construct(Titular $titular, float $saldo)
    {
        $this->titular = $titular;
        $this->saldo = $saldo;

        self::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }

    public function sacar(float $valorASacar){
        $tarifaSaque = $valorASacar * $this->percentualTarifa();
        $valorSaque = $valorASacar + $tarifaSaque;
        if ($valorSaque> $this->saldo){
            echo "Saldo Indisponivel";
            return;
        }

        $this->saldo -= $valorSaque;

    }

    public function depositar(float $valorADepositar){
        if($valorADepositar < 0){
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function recuperarSaldo(): float{
        return $this->saldo;
    }

    public function recuperarNomeTitular(): string{
        return $this->titular->recuperarNome();
    }
    
    public function recuperarCpfTitular(): string{
        return $this->titular->recuperarCpf();
    }

    public static function recuperaNumeroDeContas():int{
        return self::$numeroDeContas;
    }

    abstract protected function percentualTarifa(): float;
}

?>