<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::creatConnection();
$repository = new PdoStudentRepository($pdo);
$studentList = $repository->allStudents();

var_dump($studentList);


/*
$statement = $pdo->query('SELECT * FROM students;');

//tras uma linha de cada vez sem afetar a memoria do servidor
while ($studentDataList = $statement->fetch(PDO::FETCH_ASSOC)) {
    $student = new Student(
        $studentDataList['id'],
        $studentDataList['name'],
        new DateTimeImmutable($studentDataList['birth_date'])
    );

    echo $student->id() . "\n";
    echo $student->name() . "\n";
    echo $student->age() . "\n";
}

$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData['id'],
        $studentData['name'],
        new DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);
*/