<?php

use App\Http\Controllers\StudentController;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


/*
|--------------------------------------------------------------------------
| Routes : CLASSES
|--------------------------------------------------------------------------
|*/

// Nous retourne toutes les classes
Route::get('/classes', function () {
    return SchoolClass::all();
});

// On ajoute une classe
Route::post('/classes', function (Request $request) {
    return SchoolClass::create($request->all());
});

// Modifie une classe
Route::put('/classes/{classesId}', function ($classesId, Request $request) {
    $class = SchoolClass::findOrFail($classesId);
    $class->update($request->all());
    return $class;
});

/*
|--------------------------------------------------------------------------
| FIN Routes : CLASSES
|--------------------------------------------------------------------------
|*/

/*
|--------------------------------------------------------------------------
| Routes : STUDENT
|--------------------------------------------------------------------------
|*/

// Nous retourne toute la liste des étudiants
Route::get('/students', function () {
    return Student::all();
});

// Nous retourne un étudiant en particulier
Route::get('/students/{studentId}', function ($studentId) {
    return Student::findOrFail($studentId);
});

// Modifie un étudiant choisi
Route::put('/students/{StudentId}', function ($studentId, Request $request) {
    $student = Student::findOrFail($studentId);
    $student->update($request->all());
    return $student;
});

// Supprimer un étudiant choisi
Route::delete('/students/{studentId}', function ($studentId) {
    return Student::findOrFail($studentId)->delete();
});

// On ajoute un étudiant
Route::post('/students', function (Request $request) {
    return Student::create($request->all());
});

// Nous retourne la liste des étudiants selon la promotion
Route::get('/students/class/{className}', [StudentController::class, 'getStudentsByClass']);

/*
|--------------------------------------------------------------------------
| FIN Routes : STUDENT
|--------------------------------------------------------------------------
|*/
