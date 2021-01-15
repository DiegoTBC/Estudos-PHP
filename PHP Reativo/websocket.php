<?php

use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\MessageComponentInterface;
use Ratchet\WebSocket\WsServer;

require_once 'vendor/autoload.php';

//Conhecemos o conceito de WebSockets
//Vimos como criar um cliente de WebSocket
//Aprendemos que com as ferramentas certas, programação reativa pode ficar transparente
//Usamos Rachet para criar um servidor de WebSocket
//Falamos sobre o Swoole

$chatComponent = new class implements MessageComponentInterface {

    private SplObjectStorage $connections;

    public function __construct()
    {

        $this->connections = new SplObjectStorage();
    }

    //vai ser executado sempre que a conexão for aberta
    public function onOpen(ConnectionInterface $conn)
    {
        echo "Nova conexão aceita \n";
        $this->connections->attach($conn);
    }

    public function onClose(ConnectionInterface $conn)
    {
        echo "Conexão encerrada \n";
        $this->connections->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "Erro" . $e->getTraceAsString();
    }

    //vai ser executado sempre que uma mensagem chegar no servidor
    public function onMessage(ConnectionInterface $from, MessageInterface $msg)
    {
        /** @var ConnectionInterface $connection */
        foreach ($this->connections as $connection) {
           if ($connection !== $from) {
                $connection->send((string) $msg);
           }
       }
    }
};

//criando servidor websocket com Ratchet
$server = IoServer::factory(
    new HttpServer(
        new WsServer($chatComponent)
    ),
    8002);

$server->run();