<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();
$browser = new HttpBrowser($client);

$crawler = $browser->request("GET", "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");
$arquivos = $crawler->filter("link[rel='stylesheet'], script[src]")->each(function ($node) {
    if ($node->attr('src')){
        return $node->attr('src');
    }
    return $node->attr('href');
});

if (!is_dir('arquivo_baixados')){
    mkdir('arquivos_baixados');
}

foreach ($arquivos as $arquivo){
    $nome = basename($arquivo);
    file_put_contents('arquivos_baixados/'.$nome, file_get_contents($arquivo));
}