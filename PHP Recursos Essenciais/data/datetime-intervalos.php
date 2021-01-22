<?php

$diego = new DateTime('2000-11-17');
$hoje = new DateTime();

$intervalo = $diego->diff($hoje);
var_dump($intervalo->format('%y anos, %m meses e %d dias'));

//adiciona 7 dias a variavel hoje
$hoje->add(new DateInterval('P7D'));
var_dump($hoje);

