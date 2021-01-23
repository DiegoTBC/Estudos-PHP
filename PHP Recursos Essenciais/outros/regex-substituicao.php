<?php

$aniversarios = "Diego 17/11 Laura 08/02 Regina Laura 08/02";

$nomes = preg_replace('/[0-9\/]+/', '', $aniversarios);
var_dump($nomes);

$nomes2 = preg_replace(['/[a-z]+/i', '/[0-9\/]+/'], ['Nome', "Data"], $aniversarios, 8);
var_dump($nomes2);

$aniversarios2 = "Diego 2000-11-17 Laura 2002-02-08 Regina Laura 2002-02-08";
$formatado = preg_replace_callback(
    '/[0-9-]+/',
    'tratar',
    $aniversarios2
);

function tratar(array $item): string{
    return DateTime::createFromFormat('Y-m-d', $item[0])->format('d/m/Y');
}

var_dump($formatado);