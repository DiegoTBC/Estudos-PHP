<?php


namespace Alura\Banco\Modelo;


trait AlteraPropriedades
{
    public function __set(string $name, string $value)
    {
        $this->$name = $value;
    }
}