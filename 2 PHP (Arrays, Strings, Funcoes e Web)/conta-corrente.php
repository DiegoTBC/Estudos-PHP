<?php

//se o include nao encontrar o arquivo, ele só da um aviso
//é mais usado para arquivos não essenciais
//include 'funcoes_contaCorrente.php';

//se tentar importar o msm arquivo duas vezes ele vai dar erro
//então é bom usar include_once ou require_once, garantindo que o arquivo será incluído apenas uma vez

//REQUIRE é mais usado para arquivos importantes
require 'funcoes_contaCorrente.php';

//$contasCorrente[31231221] = sacar($contasCorrente[31231221], 100);
sacar($contasCorrente[31231221], 100);
//$contasCorrente[43321312] = depositar($contasCorrente[43321312], 600);
depositar($contasCorrente[43321312], 600);
tranferir($contasCorrente[31231221], $contasCorrente[43321312], 500);

unset($contasCorrente[43328498]); //remove item de uma lista ou variavel

/*
foreach($contasCorrente as $cpf => $conta){
    echo $cpf ." ". $conta['titular'] ." ". $conta['saldo'];
    echo "<br>";
    echo "<br>";
    echo "$cpf : $conta[titular] || $conta[saldo]";
    echo "<br>";
    echo "<br>";
    echo "CPF: $cpf || Titular: {$conta['titular']} || Saldo: {$conta['saldo']} <br>";
    //usando list pra atribuir valores de uma array pra variaveis associativas
    //['titular' => $titular, 'saldo' => $saldo] = $conta;
    //echo "$titular $saldo";
}*/
echo "<ul>";
foreach($contasCorrente as $cpf => $conta){
    exibeConta($conta);
}
echo "</ul>";

?>