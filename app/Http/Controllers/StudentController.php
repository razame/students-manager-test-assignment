<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Domain\Student\Application\StudentService;

class StudentController extends Controller
{

    private $service;

    public function __construct(StudentService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Students/Index', ['data' => ['students' => $this->service->getAll()]]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Students/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = $this->service->createStudent(
            request()->get('name'),
            request()->get('email'),
            request()->get('username')
        );
        return to_route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = $this->service->find($id);
        return Inertia::render('Students/Edit', ['data' => ['student' => $student]]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->service->updateStudent(
            $id,
            request()->get('name'),
            request()->get('email'),
            request()->get('username')
        );
        return to_route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->service->deleteStudent($id);
        return to_route('students.index');
    }
}
