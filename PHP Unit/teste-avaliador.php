<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

$leilao = new Leilao('Fiat 147 0KM');

$diego = new Usuario('Diego');
$laura = new Usuario('Laura');

$leilao->recebeLance(new Lance($diego, 2000));
$leilao->recebeLance(new Lance($laura, 2500));

$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);

$maiorValor = $leiloeiro->maiorValor();

echo $maiorValor;

$array = $leilao->getLances();
arsort($array);
echo var_dump($array[1]->getValor());