<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function() {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
/*
|--------------------------------------------------------------------------
| Routes : CLASSES
|--------------------------------------------------------------------------
|*/

// Retourne toutes les classes
Route::get('/classes', [SchoolClassController::class, 'getAllClasses']);

// Ajoute une classe
Route::post('/classes', [SchoolClassController::class, 'create']);

// Modifie une classe
Route::put('/classes/{classesId}', [SchoolClassController::class, 'update']);

// Retourne la liste des étudiants selon la promotion
Route::get('/class/{className}', [StudentController::class, 'getStudentsByClass']);


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

// Retourne toute la liste des étudiants
Route::get('/students', [StudentController::class, 'getAllStudents']);

// Retourne un étudiant en particulier
Route::get('/students/{studentId}', [StudentController::class, 'getStudent']);


// Modifie un étudiant choisi
Route::put('/students/{StudentId}', [StudentController::class, 'update']);

// Supprime un étudiant choisi
Route::delete('/students/{studentId}', [StudentController::class, 'delete']);

// Ajoute un étudiant
Route::post('/students', [StudentController::class, 'create']);

// Retourne la liste des notes de l'étudiant
Route::get('/students/marks/{studentId}', [StudentController::class, 'getMark']);

/*
|--------------------------------------------------------------------------
| FIN Routes : STUDENT
|--------------------------------------------------------------------------
|*/

/*
|--------------------------------------------------------------------------
| Routes : INTERVENANTS
|--------------------------------------------------------------------------
|*/

// Retourne toutes les intervenants
Route::get('/teacher', [TeacherController::class, 'getAllTeachers']);

// Retourne un intervenant
Route::get('/teacher/{teacherId}', [TeacherController::class, 'getTeacher']);

// Ajoute un intervenant
Route::post('/teacher', [TeacherController::class, 'create']);

// Modifie un intervenant
Route::put('/teacher/{teacherId}', [TeacherController::class, 'update']);

/*
|--------------------------------------------------------------------------
| FIN Routes : INTERVENANTS
|--------------------------------------------------------------------------
|*/

/*
|--------------------------------------------------------------------------
| Routes : MATIERE
|--------------------------------------------------------------------------
|*/

// Retourne toutes les matières
Route::get('/subjects',  [SubjectController::class, 'getAllSubjects']);

// Retourne une matière
Route::get('/subjects/{subjectId}',  [SubjectController::class, 'getSubject']);

// Ajoute une matière
Route::post('/subjects', [SubjectController::class, 'create']);

// Modifie une matière
Route::put('/subjects/{subjectsId}', [SubjectController::class, 'update']);

/*
|--------------------------------------------------------------------------
| FIN Routes : MATIERE
|--------------------------------------------------------------------------
|*/

/*
|--------------------------------------------------------------------------
| Routes : NOTES
|--------------------------------------------------------------------------
|*/


// Ajoute une note
Route::post('/mark', [MarkController::class, 'create']);



/*
|--------------------------------------------------------------------------
| FIN Routes : NOTES
|--------------------------------------------------------------------------
|*/
