<?php

use Alura\Cursos\Controller\IControladorRequisicao;
use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Http\Server\RequestHandlerInterface;

require_once __DIR__ . '/../vendor/autoload.php';

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . "/../config/routes.php";

if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit();
}

//executar esse codigo antes de mandar qualquer codigo de saida pro navegador
session_start();

$ehRotaLogin = stripos($caminho, 'login');

if (!isset($_SESSION['logado']) && $ehRotaLogin === false) {
    header('Location: /login');
    exit();
}

//cria uma fabrica
$psr17Factory = new Psr17Factory();

//cria um request
$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory: busca dados do servidor (_GET, _POST)
    $psr17Factory, // UriFactory: dados que identificam cada parte da url
    $psr17Factory, // UploadedFileFactory: dados de um possivel arquivo enviado
    $psr17Factory  // StreamFactory: dados de stream para ler a requisição como um todo
);

//request montada
$request = $creator->fromGlobals();

//qualquer controlador que for executado, será executado com a sessao ja inicializada
$classeControladora = $rotas[$caminho];

/** @var \Psr\Container\ContainerInterface $container */
$container = require __DIR__ . '/../config/dependencies.php';

/** @var RequestHandlerInterface $controlador */
$controlador = $container->get($classeControladora);

$resposta = $controlador->handle($request);

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();
