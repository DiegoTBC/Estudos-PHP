<?php

$arquivo = fopen('lista-cursos.txt', 'r');

/*
 * le o arquivo linha a linha
 * while (!feof($arquivo)) {
    $curso = fgets($arquivo);
    echo $curso;
}
*/

/*
 * le o arquivo inteiro
 * $tamanhoDoArquivo = filesize('lista-cursos.txt');
$cursos = fread($arquivo, $tamanhoDoArquivo);
echo $cursos;

fclose($arquivo);*/

//função que simplifica a leitura de arquivos
$cursos = file_get_contents('lista-cursos.txt');
echo $cursos;