<?php

function divisao($dividendo, $divisor){
    if ($divisor === 0){
        //lançando exceções
        throw new Exception ("Divisão por zero!!!");
    } 
    return $dividendo/$divisor."<br>";
}

try {
    echo divisao(5,0);
    //pegando excecoes
} catch (Exception $erro){
    echo $erro->getMessage();
} finally {
    echo "Processo completo.";
}

try {
    echo divisao(5,0);
    //pegando excecoes
} catch (Exception | Error $erro){
    echo $erro->getMessage();
} finally {
    echo "Processo completo.";
}

try {
    echo divisao(5,0);
    //pegando excecoes
} catch (Throwable $erro){
    echo $erro->getMessage();
} finally {
    echo "Processo completo.";
}

//criar exceções
//Exceção de Dominio = exceção que faça sentido para as regras de negócio.
class MinhaExececao extends DomainException
{

}
//throw new MinhaExececao()
?>