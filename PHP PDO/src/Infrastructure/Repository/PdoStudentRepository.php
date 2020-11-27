<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Phone;
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use PDO;


class PdoStudentRepository implements StudentRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allStudents(): array
    {
        $statement = $this->connection->query('SELECT * FROM students;');
        return $this->hydrateStudentList($statement);
    }

    public function studentsBirthAt(\DateTimeInterface $birthDate): array
    {
        $sqlQuery = 'SELECT * FROM students WHERE birth_date = ?;';
        $statement = $this->connection->prepare($sqlQuery);
        $statement->bindValue(1, $birthDate->format('Y-m-d'));
        $statement->execute();

        return $this->hydrateStudentList($statement);
    }

    public function hydrateStudentList(\PDOStatement $statement): array
    {
        $studentList = [];
        while ($studentDataList = $statement->fetch(PDO::FETCH_ASSOC)) {
            $student = new Student(
                $studentDataList['id'],
                $studentDataList['name'],
                new \DateTimeImmutable($studentDataList['birth_date'])
            );
            $studentList[] = $student;
        }

        return $studentList;
    }

    /*
    private function fillPhonesOf(Student $student): void
    {
        $sqlQuery = 'SELECT id, area_code, number FROM phones WHERE student_id = ?;';
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $student->id(), PDO::PARAM_INT);
        $stmt->execute();

        $phoneDataList = $stmt->fetchAll();
        foreach ($phoneDataList as $phoneData) {
            $phone = new Phone($phoneData['id'], $phoneData['area_code'], $phoneData['number']);
            $student->addPhone($phone);
        }

    }
    */
    public function save(Student $student): bool
    {
        if ($student->id() === null) {
            return $this->insert($student);
        }
        return $this->update($student);
    }

    public function insert(Student $student): bool
    {
        $sqlInsert = "INSERT INTO student (name, birth_date) VALUES (:name, :birth_date);";
        $statement = $this->connection->prepare($sqlInsert);

        $sucess = $statement->execute([
            ':name' => $student->name(),
            ':birth_date' => $student->birthDate()->format('Y-m-d')
        ]);

        if ($sucess) {
            $student->defineId($this->connection->lastInsertId());
        }

        return $sucess;
    }

    public function update(Student $student)
    {
        $sqlUpdate = "UPDATE students SET name = ?, birth_date = ? WHERE id = ?;";
        $statement = $this->connection->prepare($sqlUpdate);
        $statement->bindValue(1, $student->name());
        $statement->bindValue(2, $student->birthDate()->format('Y-m-d'));
        $statement->bindValue(3, $student->id(), PDO::PARAM_INT);

        return $statement->execute();
    }

    public function remove(Student $student): bool
    {
        $sqlDelete = "DELETE FROM students WHERE id = ?;";
        $preparedStatement = $this->connection->prepare($sqlDelete);
        $preparedStatement->bindValue(1, 2, PDO::PARAM_INT);
        return $preparedStatement->execute();
    }

    public function studentsWithPhones(): array
    {
        $sqlQuery = "SELECT students.id, 
                            students.name, 
                            students.birth_date, 
                            phones.id AS phone_id, 
                            phones.area_code, 
                            phones.number
                    FROM students 
                    JOIN phones 
                    ON students.id = phones.student_id;";
        $stmt = $this->connection->query($sqlQuery);
        $result = $stmt->fetchAll();
        $studentList = [];

        foreach ($result as $row) {
            if (!array_key_exists($row['id'], $studentList)) {
                $studentList[$row['id']] =  new Student(
                    $row['id'],
                    $row['name'],
                    new \DateTimeImmutable($row['birth_date'])
                );
            }
            $phone = new Phone($row['phone_id'], $row['area_code'], $row['number']);
            $studentList[$row['id']]->addPhone($phone);

        }

        return $studentList;
    }
}
