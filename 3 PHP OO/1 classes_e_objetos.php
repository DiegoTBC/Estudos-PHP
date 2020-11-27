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

?>