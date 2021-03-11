<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function getAllStudents()
    {
        return response()->json(Student::all());
    }

    public function getStudent(Student $studentId){
        return $studentId;
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'age' => 'required|integer',
            'first_year' => 'required|date_format:Y',
            'id_school_year' => 'required|exists:school_classes,id'
            ]);
        if($validator->fails()) {
            return $validator->errors();
        }

        return Student::create($request->all());
    }

    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'age' => 'required|integer',
            'first_year' => 'required|date_format:Y',
            'id_school_year' => 'required|exists:school_classes,id'
            ]);
        if($validator->fails()) {
            return $validator->errors();
        }

        $student->update($request->all());
        return $student;
    }

    public function delete(Student $student)
    {
        $student->delete();
        return $student;
    }


    public function getStudentsByClass($className)
    {
        $students = DB::table('students')
            ->select('students.id', 'students.first_name', 'students.last_name')
            ->join('school_classes', 'students.id_school_year', '=', 'school_classes.id')
            ->where('school_classes.name', $className)
            ->get();

        return $students;
    }

    public function getMark($studentId)
    {
        $mark = DB::table('marks')
            ->select('students.id', 'students.first_name', 'students.last_name', 'subjects.name', 'marks.score')
            ->join('students', 'students.id', '=', 'marks.id_student')
            ->join('subjects', 'subjects.id', '=', 'marks.id_subject')
            ->where('students.id', $studentId)
            ->get();

        return $mark;
    }
}
