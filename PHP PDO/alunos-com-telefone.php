<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$conn = ConnectionCreator::creatConnection();
$repository = new PdoStudentRepository($conn);

/**@var \Alura\Pdo\Domain\Model\Student[] $studentList*/
$studentList = $repository->studentsWithPhones();
var_dump($studentList);
