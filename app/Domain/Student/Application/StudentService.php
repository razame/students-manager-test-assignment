<?php

namespace App\Domain\Student\Application;

use App\Domain\Student\Domain\Student;
use App\Domain\Student\Domain\StudentRepositoryInterface;
use App\Models\Student as StudentModel;
use Illuminate\Database\Eloquent\Collection;

class StudentService
{
    private $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAll(): ?Collection
    {
        return $this->studentRepository->getAll();
    }

    public function find($id): ?StudentModel
    {
        return $this->studentRepository->findById($id);
    }

    public function createStudent(string $name, string $email, string $username): Student
    {
        $student = new Student($name, $email, $username);
        $this->studentRepository->save($student);
        return $student;
    }

    public function updateStudent(int $id, string $name, string $email, $username): StudentModel
    {
        $student = new Student($name, $email, $username, $id);
        $this->studentRepository->update($student);
        $student = $this->studentRepository->findById($id);
        return $student;
    }

    public function deleteStudent(int $id): void
    {
        $this->studentRepository->destroyById($id);
    }
}
