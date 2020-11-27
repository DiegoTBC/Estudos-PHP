<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Helper\RenderizadorDeHTML;

class FormularioInsercao implements IControladorRequisicao
{
    use RenderizadorDeHTML;

    public function processaRequisicao(): void
    {
        /*$titulo = "Novo Curso";*/
        echo $this->renderizaHTML('cursos/formulario.php', ['titulo' => "Novo Curso"]);
        /*require __DIR__ . "/../../view/cursos/formulario.php";*/
    }
}