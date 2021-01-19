<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();
$browser = new HttpBrowser($client);

$crawler = $browser->request("GET", "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");
$imagensCelulares = $crawler->filter('article .img-thumbnail')->images();

if (!is_dir('images')) {
    mkdir('images');
}

foreach ($imagensCelulares as $imagens) {
    $url = $imagens->getUri();
    $nome = basename($url); //retorna o nome do arquivo
    file_put_contents('images/'.$nome, file_get_contents($url));
}