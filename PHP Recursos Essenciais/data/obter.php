<?php

//date_default_timezone_set('America/Sao_Paulo');

var_dump(date('d/m/Y H:i'));

var_dump(date('e'), date('P'));

var_dump((new DateTime())->format('D'));

var_dump(time());

$amanha = strtotime('+1 day');
var_dump(date('d/m/Y H:i', $amanha));

function formata_data_para_br ($data){
    $timestamp = strtotime($data);
    return date('d/m/Y', $timestamp);
}

echo formata_data_para_br('2021-01-22');