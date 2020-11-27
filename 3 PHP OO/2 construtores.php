<?php 

//Construtores e destruidores ajudam a reduzir a quantidade de código

//Um construtor permite que você inicialize as propriedades de um objeto na criação do objeto.
//Se você criar uma função __construct (), o PHP irá automaticamente chamar esta função quando você criar um objeto de uma classe.

class Car{
    private $name;
    private $color;

    function __construct(string $name, string $color){
        $this->name = $name;
        $this->color = $color;
    }

    function getName(): string{
        return $this->name;
    }

    function getColor(): string{
        return $this->color;
    }
}

$mercedez = new Car("Mercedez", "Vermelho");
$porsche = new Car("Porsche", "Cinza");

echo $mercedez->getName()." ".$porsche->getColor()."<br>";
echo $porsche->getName()." ".$porsche->getColor()."<br>";

?>