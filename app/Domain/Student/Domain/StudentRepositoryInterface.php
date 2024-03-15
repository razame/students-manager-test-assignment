<?php

namespace App\Domain\Student\Domain;

use App\Models\Student as StudentModel;
use Illuminate\Database\Eloquent\Collection;

interface StudentRepositoryInterface
{
    public function save(Student $student): void;

    public function update(Student $student): void;

    public function destroyById(int $id): void;

    public function findById(string $id): ?StudentModel;

    public function getAll(): ?Collection;
}
