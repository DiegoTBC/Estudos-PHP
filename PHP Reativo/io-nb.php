<?php

$streamList = [
    //só arquivos e sockets podem ser setados como não bloqueantes
    stream_socket_client('tcp://localhost:8080'), //abrindo um cliente socket
    stream_socket_client('tcp://localhost:8000'),
    fopen('arquivo1.txt', 'r'),
    fopen('arquivo2.txt', 'r')
];

fwrite($streamList[0], 'GET /http-server.php HTTP/1.1' . "\r\n". "\r\n");

//seta a lista toda como não bloqueante
//caso o arquivo não conseguir ser lido, ele não bloqueara o processador e passará para o outro arquivo
foreach ($streamList as $stream) {
    stream_set_blocking($stream, false);
}

//verifica se possui arquivos prontos para leitura
do {
    $copyReadStream = $streamList;
    $numeroDeStreams = stream_select($copyReadStream, $write, $except, 0, 200000);

    if ($numeroDeStreams === 0 || $numeroDeStreams === false) {
        echo "Ainda não tem arquivo pronto !!! \n";
        continue;
    }

    foreach ($copyReadStream as $key => $stream) {
        $conteudo = stream_get_contents($stream);
        $posicaoFimHttp = strpos($conteudo, "\r\n\r\n");
        if ($posicaoFimHttp !== false) {
            echo substr($conteudo, $posicaoFimHttp + 4) . "\n";
        } else {
            echo $conteudo . "\n";
        }

        fclose($stream);
        unset($streamList[$key]);
    }

} while (!empty($streamList));

echo "Todos os streams foram lidos \n";