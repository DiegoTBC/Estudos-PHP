<?php

require_once 'autoload.php';

use Alura\Banco\Modelo\Conta\{Conta, Titular};
use Alura\Banco\Modelo\{Cpf, Endereco};


$endereco = new Endereco("Pirapozinho", "Centro", "Rua X", "22");
$c1 = new Conta(new Titular(new Cpf("456.698.785-89"), "Diego Torres", $endereco), 200.0);
$c1->sacar(180);
echo $c1->recuperarSaldo(). "\n";

$c2 = new \Alura\Banco\Modelo\Conta\ContaCorrente(new Titular(new Cpf("456.698.785-89"), "Laura Regina", $endereco), 200.0);

echo $c2->recuperarSaldo(). "\n\n";

echo $c1->recuperarNomeTitular(). "\n";
echo $c1->recuperarCpfTitular(). "\n";
echo $c1->recuperarSaldo(). "\n\n";

echo Conta::recuperaNumeroDeContas(). "\n";

//para demonstrar o destruct
new Conta(new Titular(new Cpf("456.698.785-89"), "Diego Torres", $endereco), 12.6);
unset($c2);

?>