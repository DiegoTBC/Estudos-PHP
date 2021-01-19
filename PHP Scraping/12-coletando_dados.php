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

$devices = $crawler->filter('article')->each(function ($node) {
    $return['modelo'] = $node->filter('.title')->text();
    $atributos = $node->filter('th')->each(function ($attr) {
        return $attr->text();
    });

    $valores = $node->filter('td')->each(function ($attr) {
        return $attr->text();
    });

    $return = array_merge($return, array_combine($atributos, $valores));
    return $return;
});

var_dump($devices);