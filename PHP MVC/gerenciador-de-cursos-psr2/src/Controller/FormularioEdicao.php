<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHTML;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioEdicao implements RequestHandlerInterface
{
    use RenderizadorDeHTML;

    private \Doctrine\ORM\EntityManagerInterface $entityManager;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repositorioCursos = $this->entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var($request->getQueryParams()['id'], FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            return new Response(302, ['Location' => '/listar-cursos']);
        }

        $curso = $this->repositorioCursos->find($id);

        $html = $this->renderizaHTML('cursos/formulario.php', [
            'curso' => $curso,
            'titulo' => "Alterar Curso " . $curso->getDescricao()
        ]);

        return new Response(200, [], $html);
    }
}
