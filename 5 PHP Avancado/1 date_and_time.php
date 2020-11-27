<?php

//A função PHP date() é usada para formatar uma data e/ou hora.
//date(format,timestamp)
//format = requerido. Especifica o formato do carimbo de data/hora
//timestamp = opcional. Especifica um carimbo de data / hora. O padrão é a data e hora atuais
//Um carimbo de data / hora é uma sequência de caracteres, denotando a data e/ou hora em que um determinado evento ocorreu.

//====GET A DATE=====

echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l") . "<br>"; //L minusculo representa o dia da semana

//TIP - Automatic Copyright Year
echo "&copy 2010-". date("Y") . "<br>";

//======GET A TIME=====
//Aqui estão alguns caracteres comumente usados ​​para horários:
// * H - formato de 24 horas de uma hora (00 a 23)
// * h - formato de 12 horas de uma hora com zeros à esquerda (01 a 12) 
// * i - Minutos com zeros à esquerda (00 a 59)
// * s - segundos com zeros à esquerda (00 a 59)
// * a - Ante meridiem minúsculo e Post meridiem (am ou pm)
echo "The time is " . date("h:i:sa") . "<br>";

//=======Get Your Time Zone========
date_default_timezone_set("America/Sao_Paulo");
echo "The time is " . date("h:i:sa"). "<br>";

//=======Create a Date With mktime()========
//O parâmetro opcional timestamp na função date () especifica um timestamp.
//Se omitido, a data e a hora atuais serão usadas (como nos exemplos acima).
//mktime(hour, minute, second, month, day, year)
$d=mktime(15, 15, 54, 11, 17, 2000);
echo "Created date is " . date("Y-m-d h:i:sa", $d). "<br>";

//======Create a Date From a String With strtotime()======
//A função PHP strtotime () é usada para converter uma string de data legível por humanos
//em um carimbo de data/hora Unix (o número de segundos desde 1º de janeiro de 1970 00:00:00 GMT).
//strtotime(time, now)
$d=strtotime("10:30pm April 15 2014");
echo "Created date is " . date("Y-m-d h:i:sa", $d). "<br>";
//PHP é muito inteligente para converter uma string em uma data, então você pode colocar vários valores:
$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";

//--------------EXEMPLOS---------------------
$dataInicial = strtotime("Today");
$dataFinal = strtotime("+1 month");

while($dataInicial < $dataFinal){
    echo date("M d", $dataInicial). "<br>";
    $dataInicial = strtotime("+1 week", $dataInicial);
}

switch (date('l')) {
    case 'Sunday':
        echo "Domingo";
        break;
    case "Monday":
        echo "Segunda";
        break;
    case "Tuesday":
        echo "Terça-feira";
        break;
    case "Wednesday":
        echo "Quarta-feira";
        break;
    case "Thursday":
        echo "Quinta-feira";
        break;
    case "Friday":
        echo "Sexta-feira";
        break;
    case "Saturday":
        echo "Sabádo";
     break;
}


?>