<?php

namespace Tests\Feature;

use App\Models\Student as StudentModel;
use App\Domain\Student\Application\StudentService;
use App\Domain\Student\Domain\StudentRepositoryInterface;
use App\Domain\Student\Infrastructure\StudentRepository;
use App\Domain\Student\Domain\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_create_new_student(): void
    {
        $studentService = new StudentService(new StudentRepository(new StudentModel()));
        $result = $studentService->createStudent('New Student', 'new@example.com',  'new_student');
        $this->assertDatabaseCount('students', 1);
    }

    /**
     * A basic test example.
     */
    public function test_read_all_students(): void
    {
        $studentService = new StudentService(new StudentRepository(new StudentModel()));
        $result = $studentService->createStudent('New Student 2', 'new2@example.com',  'new_student2');
        $result = $studentService->createStudent('New Student 3', 'new3@example.com',  'new_student3');
        $result = $studentService->createStudent('New Student 4', 'new4@example.com',  'new_student4');
        $this->assertDatabaseCount('students', 3);
    }

     /**
     * A basic test example.
     */
    public function test_edit_existing_student(): void
    {

        $studentService = new StudentService(new StudentRepository(new StudentModel()));
        $result = $studentService->updateStudent(1, 'New Student 1', 'new1@example.com',  'new_student1');
        $this->assertDatabaseHas('students', ['name' => 'New Student 1']);
    }

    
     /**
     * A basic test example.
     */
    public function test_delete_student(): void
    {

        $studentService = new StudentService(new StudentRepository(new StudentModel()));
        $result = $studentService->deleteStudent(1);
        $this->assertDatabaseMissing('students', ['name' => 'New Student 1']);
    }

}
