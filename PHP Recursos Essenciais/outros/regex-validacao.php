<?php

$email = "teste@gmail.com";

$padrao = "/^[a-z0-9_.-]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?/i";
if (preg_match($padrao, $email) === 1) {
    echo 'valido';
} else {
    echo 'invalido';
}

$emails = [$email, 'elton', 'diego@gmail.com'];

$validos = preg_grep($padrao, $emails);
var_dump($validos);
