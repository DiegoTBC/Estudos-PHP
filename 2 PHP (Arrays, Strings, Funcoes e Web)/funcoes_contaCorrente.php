<?php

$contasCorrente = [
    31231221 => [
        "titular" => "Diego",
        "saldo" => 1000
    ],
    43321312 => [
        "titular" => "Laura",
        "saldo" => 1500
    ],
    43328498 => [
        "titular" => "Alberto",
        "saldo" => 2500
    ]
];

function sacar(array &$conta, float $valor = 0): array
{
    if ($valor >= $conta['saldo']){
        echo "Não foi possivel realizar o saque";
    } else {
        $conta['saldo'] -= $valor;
    }
    return $conta;
}

function depositar(array &$conta, float $valor = 0): array
{
    if($valor > 0){
        $conta['saldo'] += $valor;
    } else {
        echo "Não foi possivel realizar o deposito";
    }  
    return $conta;
}

function tranferir(array &$contaRemetente, array &$contaDestinatario, float $valor){
    if($valor <= $contaRemetente['saldo']){
        $contaRemetente['saldo'] -= $valor;
        $contaDestinatario['saldo'] += $valor;
    } else {
        echo "Não foi possivel realizar a tranferência";
        echo "<br>";
    }
}

function exibeConta(array $conta)
{
    //echo "<li> Titular: $conta[titular]. Saldo : {$conta['saldo']} </li>";
    ['titular' => $titular, 'saldo' => $saldo] = $conta;
    echo "<li>Titular: $titular. Saldo: $saldo</li>";
}

?>