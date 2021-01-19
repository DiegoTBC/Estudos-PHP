<?php

require_once 'vendor/autoload.php';

$client = \Symfony\Component\HttpClient\HttpClient::create();
$browser = new \Symfony\Component\BrowserKit\HttpBrowser($client);

$crawler = $browser->request("GET", "https://g1.globo.com/sp/presidente-prudente-regiao/");
$resultado = $crawler->filter(".feed-post-body")->each(function ($node) {
    /** @var \Symfony\Component\DomCrawler\Crawler $node */
    $return['titulo'] = $node->filter(".feed-post-body-title > div > a")->text();
    $return['resumo'] = $node->filter(".feed-post-body-resumo")->text();
    $return['link'] = $node->filter(".feed-post-body-title > div > a")->attr('href');
    $return['data'] = $node->filter(".feed-post-metadata > span")->text();
    return $return;
});

var_dump($resultado);