<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function getAllTeachers()
    {
        return response()->json(Teacher::all());
    }

    public function getTeacher(Teacher $teacherId){
        return $teacherId;
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'first_year' => 'required|date_format:Y',
            ]);
        if($validator->fails()) {
            return $validator->errors();
        }

        return Teacher::create($request->all());
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'first_year' => 'required|date_format:Y',
            ]);
        if($validator->fails()) {
            return $validator->errors();
        }

        $teacher->update($request->all());
        return $teacher;
    }
}
