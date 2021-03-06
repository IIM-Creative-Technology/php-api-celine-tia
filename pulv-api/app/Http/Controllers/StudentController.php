<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function getStudentsByClass($className)
    {
        $students = DB::table('students')
            ->select('students.id', 'students.first_name', 'students.last_name')
            ->join('school_classes', 'students.id_school_year', '=', 'school_classes.id')
            ->where('school_classes.name', $className)

            ->get();

        return $students;
    }
}
