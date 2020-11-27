<?php

class Fruit {
    public $name;
    public $color;

    function setName(string $name){
        $this->name = $name;
    }

    function getName(): string{
        return $this->name;
    }

    function setColor(string $color){
        $this->color = $color;
    }

    function getColor(): string{
        return $this->color;
    }
}

$apple = new Fruit();
$banana = new Fruit();

$apple->setName("Apple");
$apple->setColor("Red");

$banana->setName("Banana");
$banana->setColor("Yellow");

echo $apple->getName()." are ". $apple->getColor()."<br>";
echo $banana->getName()." are ". $banana->getColor()."<br>";

var_dump($apple instanceof Fruit);

//=====================================

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

//Um destruidor é chamado quando o objeto é destruído ou o script é interrompido ou encerrado.
//Se você criar uma função __destruct (), o PHP irá automaticamente chamar esta função no final do script.

class Animal{
    private $name;
    private $color;

    function __construct(string $name, string $color){
        $this->name = $name;
        $this->color = $color;
    }

    function __destruct(){
        echo "O nome do animal é {$this->name} e sua cor é {$this->color} <br>";
    }
}

$cachorro = new Animal("cachorro", "preto");


?>