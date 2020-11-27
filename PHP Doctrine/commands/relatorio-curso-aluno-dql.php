<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//só disponivel em modo dev
$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$dql = "SELECT aluno, telefones, cursos FROM Alura\\Doctrine\\Entity\\Aluno aluno JOIN aluno.telefones telefones JOIN aluno.cursos cursos";
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();

foreach ($alunoList as $aluno) {
    $telefones = $aluno->getTelefones()->map(function (Telefone $telefone) {
        return $telefone->getNumero();
    })->toArray();

    echo "ID: {$aluno->getId()} \n";
    echo "Nome {$aluno->getNome()} \n";
    echo "Telefones: " . implode(",", $telefones) . "\n";

    /** @var Curso[] $cursos */
    $cursos = $aluno->getCursos();

    foreach ($cursos as $curso) {
        echo "\t ID Curso: {$curso->getId()} \n";
        echo "\t Nome Curso: {$curso->getNome()} \n";
        echo "\n";
    }
    echo "\n";
}

print_r($debugStack);

/** @var Aluno $diego */
$diego = $entityManager->find(Aluno::class, 1);
$teste =  $diego->getTelefones()->map(function (Telefone $telefone) {
    return $telefone->getNumero();
})->toArray() ;
echo implode(",", $teste);