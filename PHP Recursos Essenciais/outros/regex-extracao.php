<Thyrso Bottura?php

$aniversarios = "Diego 17/11 Laura 08/02 Regina Laura 08/02";

$datas = preg_split('/[a-z]+\s/i', $aniversarios, -1, PREG_SPLIT_NO_EMPTY);

var_dump($datas);

$endereco = "Av Paulista, 100 - Sao Paulo/SP";

preg_match('/([a-zA-Z_\s]+),\s([0-9]+)\s-\s([a-zA-Z\s]+)\/([A-Z]{2})/', $endereco, $partes);

var_dump($partes);

preg_match('/([0-9]{2})\/([0-9]{2})/', $aniversarios, $partes2);

var_dump($partes2);