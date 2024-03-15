<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return to_route('students.index');
})->name('index');


Route::resource('students', StudentController::class);
// ('/', function () {
//     return Inertia::render('Students/Index', ['data' => ['students' => Student::all()]]);
// })->name('students.index');

// Route::get('/', function () {
//     return Inertia::render('Students/Index', ['data' => ['students' => Student::all()]]);
// })->name('students.index');

// Route::get('/create', function () {
//     return Inertia::render('Students/Create', ['data' => ['students' => Student::all()]]);
// })->name('students.create');

// Route::post('/store', function () {
//     $request = request()->only(['name', 'email', 'username']);
//     $student = Student::create($request);
//     return to_route('students.index');
// });

// Route::get('/edit/{id}', function ($id) {
//     $student = Student::find($id);
//     return Inertia::render('Students/Edit', ['data' => ['student' => $student]]);
// });

// Route::put('/update/{id}', function ($id) {
//     $student = Student::find($id);
//     $student->update(request()->only(['name', 'email', 'username']));
//     return to_route('students.index');
// });
