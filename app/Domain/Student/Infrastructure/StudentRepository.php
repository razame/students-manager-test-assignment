<?php

namespace App\Domain\Student\Infrastructure;

use App\Domain\Student\Domain\Student;
use App\Domain\Student\Domain\StudentRepositoryInterface;
use App\Models\Student as StudentModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class StudentRepository implements StudentRepositoryInterface
{
    private Model $model;

    public function __construct(StudentModel $model)
    {
        $this->model = $model;
    }

    public function save(Student $student): void
    {
        $this->model->create(
            [
                'name' => $student->getName(),
                'email' => $student->getEmail(),
                'username' => $student->getUsername(),
            ]
        );
    }

    public function update(Student $student): void
    {
        $this->model->updateOrCreate(
            [
                'id' => $student->getId(),
            ],
            [
                'name' => $student->getName(),
                'email' => $student->getEmail(),
                'username' => $student->getUsername(),
            ]
        );
    }

    public function destroyById(int $id): void
    {
        $this->model->find($id)->delete();
    }

    public function getAll(): ?Collection
    {
        return $this->model->all();
    }

    public function findById(string $id): ?StudentModel
    {
        return $this->model->find($id);
    }
}
