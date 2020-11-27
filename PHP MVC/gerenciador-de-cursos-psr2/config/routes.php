<?php

$rotas = [
    '/listar-cursos' => \Alura\Cursos\Controller\ListarCursos::class,
    '/novo-curso' => \Alura\Cursos\Controller\FormularioInsercao::class,
    '/salvar-curso' => \Alura\Cursos\Controller\Persistencia::class,
    '/excluir-curso' => \Alura\Cursos\Controller\Exclusao::class,
    '/alterar-curso' => \Alura\Cursos\Controller\FormularioEdicao::class,
    '/login' => \Alura\Cursos\Controller\FormularioLogin::class,
    '/realiza-login' => \Alura\Cursos\Controller\RealizarLogin::class,
    '/logout' => \Alura\Cursos\Controller\Deslogar::class,
    '/cursosEmJson' => \Alura\Cursos\Controller\CursosEmJson::class
];

return $rotas;