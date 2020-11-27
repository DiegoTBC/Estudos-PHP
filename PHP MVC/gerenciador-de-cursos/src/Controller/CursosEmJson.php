<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CursosEmJson implements RequestHandlerInterface
{

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repostorioDeCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repostorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $cursos = $this->repostorioDeCursos->findAll();
        return new Response(200, ['Content-Type' => 'application/json'], json_encode($cursos));
    }
}