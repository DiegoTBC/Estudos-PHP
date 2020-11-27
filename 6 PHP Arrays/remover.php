<?php declare(strict_types = 1);

namespace Alura;

require "autoload.php";

$correntistas = [
    "Diego",
    "Torres",
    12,
    "Laura",
    "Regina",
    "12"

];

var_dump($correntistas);
ArrayUtils::remover("12", $correntistas);

var_dump($correntistas);


class Veiculo
{
    protected $placa;
    protected $renavam;

    public function __construct($placa, $renavam)
    {
        $this-$placa = $placa;       
        $this->renavam = $renavam;
    }

    
}

?>