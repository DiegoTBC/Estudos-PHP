<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();

$browser = new HttpBrowser($client);

$crawler = $browser->request("GET", "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");

$html = $crawler->html();

//navegando no site
$login = $browser->clickLink("Login");
$htmlLogin = $login->html();
var_dump($htmlLogin);