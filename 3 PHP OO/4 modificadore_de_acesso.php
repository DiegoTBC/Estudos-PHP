<?php

//Propriedades e métodos podem ter modificadores de acesso que controlam onde eles podem ser acessados.
//Existem três modificadores de acesso:

//public - a propriedade ou método pode ser acessado de qualquer lugar. Este é o padrão 
//protected - a propriedade ou método pode ser acessado dentro da classe e por classes derivadas dessa classe
//private - a propriedade ou método SÓ pode ser acessado dentro da classe

class Fruit{
    public $name;
    private $color;
    protected $description;

    function setColor(string $color){
        $this->color = $color;
    }

    function getColor(){
        return $this->color;
    }

}

$banana = new Fruit();
$banana->name = "Banana"; //Ok
//$banana->color = "Yellow"; //Error
//$banana->description = "A yellow fruit"; //Error

$banana->setColor("Amarelo");

echo $banana->name."<br>";
echo $banana->getColor();

?>