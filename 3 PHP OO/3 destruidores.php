<?php

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