<?php

use Alura\Cursos\Controller\IControladorRequisicao;
use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;

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

//qualquer controlador que for executado, será executado com a sessao ja inicializada
$classeControladora = $rotas[$caminho];
/** @var IControladorRequisicao $controlador */
$controlador = new $classeControladora();
$controlador->processaRequisicao();
