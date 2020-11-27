<?php

$contas = [
    "titular" => "Diego",
    "saldo" => 1000
];

$contas2 = [
    "titular" => "Laura",
    "saldo" => 1500
];

$todasContas = [
    21212 => $contas, 
    212132 => $contas2
];


echo $contas['titular'];
echo $contas2["titular"];
echo $todasContas[21212]['saldo'];

echo "<br>";

foreach($todasContas as $chave => $value){
    echo $chave;
    echo "<br>";
}


//-------------------------


$contasCorrente = [
    31231221 => [
        "titular" => "Diego",
        "saldo" => 1000
    ],
    433213123 => [
        "titular" => "Laura",
        "saldo" => 1500
    ]
];

foreach($contasCorrente as $cpf => $conta){
    echo $cpf;
}

//---------------------------

$array = [
    2 => "a",
    "1" => "b",
    1.6 => "c",
    true => "d",
];

echo "<br>";
foreach ($array as $key => $value) {
    echo $key;
    echo "<br>";
}

?>