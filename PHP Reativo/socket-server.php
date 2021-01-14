<?php

$socket = stream_socket_server('tcp://localhost:8000');

//essa chamada faz com que o script fique esperando até que alguem se conecte
$con = stream_socket_accept($socket);

$espera = rand(1,5);
sleep($espera);

fwrite($con, "Resposta do socket após $espera segundos \n");

fclose($con);