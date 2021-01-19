<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();
$browser = new HttpBrowser($client);

$crawler = $browser->request("GET", "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");
$nomesCelulares = $crawler->filter('article .title')->each(function ($node) {
    return $node->text();
});

//var_dump($nomesCelulares);

foreach ($nomesCelulares as $nomeCelular) {
    echo $nomeCelular . "\n";
}