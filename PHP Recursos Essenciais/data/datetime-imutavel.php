<?php

$aniversario = new DateTimeImmutable('2000-11-17');
var_dump($aniversario);
var_dump($aniversario->diff(new DateTimeImmutable('2001-04-10')));

$a = $aniversario->add(new DateInterval('P3M'));
var_dump($a);

var_dump((new DateTime('2021-01-23'))->format('D'));

function diaSemana($strData)
{
    $a =
    $diaSemana = (new DateTime($strData))->format('D');
    switch($diaSemana){
        case 'Sun':
            echo 'Domingo';
            break;
        case 'Mon':
            echo 'Segunda-Feira';
            break;
        case 'Tue':
            echo 'Terça-Feira';
            break;
        case 'Wed':
            echo 'Quarta-Feira';
            break;
        case 'Thu':
            echo 'Quinta-Feira';
            break;
        case 'Fri':
            echo 'Sexta-Feira';
            break;
        case 'Sat':
            echo 'Sábado';
            break;
    }
}
