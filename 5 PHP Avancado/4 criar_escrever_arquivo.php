<?php
//Como criar e gravar em um arquivo no servidor.

//Create File - fopen()
//A função fopen () também é usada para criar um arquivo. 
//Talvez um pouco confuso, mas em PHP, um arquivo é criado usando a mesma função usada para abrir arquivos.
//Se você usar fopen() em um arquivo que não existe, 
//ele o criará, desde que o arquivo seja aberto para gravação (w) ou anexação (a).
$myfile = fopen("testfile.txt", "w");//O arquivo será criado no mesmo diretório onde reside o código PHP:


//Write to File - fwrite()
//A função fwrite() é usada para gravar em um arquivo. 
//O primeiro parâmetro de fwrite() contém o nome do arquivo a ser escrito e o 
//segundo parâmetro é a string a ser escrita.
$myfile2 = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Diego Torres\n";
fwrite($myfile2, $txt);
$txt = "Laura Regina\n";
fwrite($myfile2, $txt);
fclose($myfile2);

$myfile3 = fopen("newfile.txt", "r") or die("Unable to open file!");
while (!feof($myfile3)){
    echo fgets($myfile3)."<br>";
}
fclose($myfile3);

//Overwriting
//Agora que "newfile.txt" contém alguns dados, podemos mostrar o que acontece quando abrimos um arquivo existente para escrita. 
//Todos os dados existentes serão APAGADOS e começamos com um arquivo vazio.
$myfile4 = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile4, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile4, $txt);
fclose($myfile4);
?>