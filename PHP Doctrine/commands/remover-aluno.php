<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//alternativa do comando find(), pois ele faz um SELECT e dps DELETE
//enquanto o getReference poupa uma ida ao BD
$aluno = $entityManager->getReference(Aluno::class, 4 );

$entityManager->remove($aluno);
$entityManager->flush();