<?php

namespace Alura\Banco\Modelo;

abstract class Pessoa
{
    protected $nome;
    protected $cpf;

    public function __construct(string $nome, Cpf $cpf)
    {
        $this->validaNome($nome);
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function recuperarNome(): string{
        return $this->nome;
    }

    public function recuperarCpf(): string{
        return $this->cpf->recuperarNumero();
    }

    final protected function validaNome($nomeTitular){
        if (strlen($nomeTitular) < 5){
            echo "Nome precisa ter pelo menos 5 letras";
            exit();
        }
    }
}


?>