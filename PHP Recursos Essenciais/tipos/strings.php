<?php


$nome = "Diego";
var_dump($nome[0]);

//echo "<h1 style='color: red'>Oi</h1>";
echo "<h1 style=\"color: red\">Oi</h1>\n";

echo "EU tenho R\$mil reais \n";

echo "\\123.123.10\minhapasta\\\n";

echo "----------------------------------------\n\n";

//heredoc
$conteudo = <<<HTML
      <h1>Olá</h1>
       <p>Bem vindo</p>
HTML;

echo $conteudo;