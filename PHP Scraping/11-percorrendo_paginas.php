<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();
$browser = new HttpBrowser($client);

$crawler = $browser->request("GET", "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");
$totalPaginas = $crawler->filter("body > section.section-content.padding-y > div > div > main > header > div > span")->text();
$totalPaginas = preg_replace('/\D/', '', $totalPaginas);
$totalPaginas = ceil($totalPaginas/10);



$modelos = $crawler->filter('article .title')->each(function ($node) {
    return $node->text();
});

for ($i = 2; $i <= $totalPaginas; $i++) {
    $crawler = $browser->request("GET", "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//".$i);
    $modelos = array_merge($modelos, $crawler->filter('article .title')->each(function ($node) {
        return $node->text();
    }));
}

var_dump($modelos);