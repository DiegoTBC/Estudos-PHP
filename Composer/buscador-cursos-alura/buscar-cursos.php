<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

//Esse erro é bem comum e acontece quando o seu código não consegue verificar o certificado do site acessado,
//a solução mais simples é desativar essa verificação como mostrado nesse tópico:
$cliente = new Client(['verify' => false]);
$crawler = new Crawler();

$buscador = new Buscador($cliente, $crawler);
$cursos = $buscador->buscar("https://www.terra.com.br/esportes/futebol/brasileiro-serie-a/tabela/", "td.team-name");

foreach ($cursos as $curso){
    echo $curso."\n";
}

$cliente = new Client(['verify' => false]);
$crawler = new Crawler();
$buscador = new Buscador($cliente, $crawler);
$pontos = $buscador->buscar("https://www.terra.com.br/esportes/futebol/brasileiro-serie-a/tabela/", "td.points");

$lista = array_combine($cursos, $pontos);
foreach ($lista as $time=>$pontos){
    echo $time.":". $pontos. "\n";
}