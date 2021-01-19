<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();
$browser = new HttpBrowser($client);

$crawler = $browser->request("GET", "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics/login/");

$form = $browser->submitForm("Go", [
    'username' => 'diego',
    'password' => '123'
],
"GET");

$conteudo = $form->html();

var_dump($conteudo);
var_dump($form);


