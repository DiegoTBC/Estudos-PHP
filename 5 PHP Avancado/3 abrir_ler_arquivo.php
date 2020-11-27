<?php
//Como abrir, ler e fechar um arquivo no servidor.

//Open File - fopen()
//Um método melhor para abrir arquivos é com a função fopen().
//Esta função oferece mais opções do que a função readfile().
//O primeiro parâmetro de fopen () contém o nome do arquivo a ser aberto e o segundo parâmetro 
//especifica em qual modo o arquivo deve ser aberto.
//O exemplo a seguir também gera uma mensagem se a função fopen () não conseguir abrir o 
//arquivo especificado:
$myfile = fopen("teste.txt","r") or die("Unable to open file!");

//Read File - fread()
//O primeiro parâmetro de fread () contém o nome do arquivo a ser lido e o segundo parâmetro especifica 
//o número máximo de bytes a ler.
echo fread($myfile,filesize("teste.txt"));

//Close File - fclose()
//É uma boa prática de programação fechar todos os arquivos depois de terminá-los. 
//Você não quer um arquivo aberto rodando em seu servidor, consumindo recursos!
//O fclose() requer o nome do arquivo (ou uma variável que contém o nome do arquivo) que queremos fechar:
fclose($myfile);
echo "<br>";

//Read Single Line - fgets()
//A função fgets() é usada para ler uma única linha de um arquivo.
$myfile2 = fopen("teste.txt", "r") or die("Unable to open file!");
echo fgets($myfile2); //linha 1
echo fgets($myfile2); //linha 2
fclose($myfile2);
echo "<br>";
//Observação: após uma chamada à função fgets (), o ponteiro do arquivo foi movido para a próxima linha.

//Check End-Of-File - feof()
//A função feof() verifica se o "fim do arquivo" (EOF) foi atingido.
//A função feof() é útil para percorrer dados de comprimento desconhecido.
$myfile3 = fopen("teste.txt", "r") or die("Unable to open file!");
while(!feof($myfile3)){
    echo fgets($myfile3)."<br>";
}
fclose($myfile3);

//Read Single Character - fgetc()
//A função fgetc() é usada para ler um único caractere de um arquivo.
$myfile4 = fopen("teste.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
while(!feof($myfile4)) {
  echo fgetc($myfile4);
}
fclose($myfile4);
?>