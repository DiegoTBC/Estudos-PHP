<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();
$browser = new HttpBrowser($client);

$crawler = $browser->request("GET", "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");
$codigos = $crawler->filter('article .img-thumbnail')->each(function ($node) {
    return $node->attr('alt');
});

var_dump($codigos);
