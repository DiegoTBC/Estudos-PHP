<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Helper\RenderizadorDeHTML;

class FormularioLogin implements IControladorRequisicao
{
    use RenderizadorDeHTML;

    public function processaRequisicao(): void
    {
       echo $this->renderizaHTML('login/formulario.php', ['titulo' => 'FormularioLogin']);
    }
}