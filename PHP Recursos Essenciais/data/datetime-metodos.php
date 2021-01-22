<?php


$aniversario = (new DateTime('2000-11-17 15:30'))
    ->setTime(16,30)
    ->format('d/m/Y H:i');
var_dump($aniversario);