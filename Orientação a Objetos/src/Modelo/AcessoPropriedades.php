<?php


namespace Alura\Banco\Modelo;


trait AcessoPropriedades
{
    public function __get(string $nomeAtributo)
    {
        $metodo = "recuperar".ucfirst($nomeAtributo);
        return $this->$metodo();
    }
}