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
            response()->json($validator->errors(), 400);
        }

        return Teacher::create($request->all());
    }

    public function update(Request $request, Teacher $teacherId)
    {
        $teacher = Teacher::find($teacherId);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'first_year' => 'required|date_format:Y',
            ]);
        if($validator->fails()) {
            response()->json($validator->errors(), 400);
        }

        $teacher->update($request->all());
        return response()->json($teacher);
    }
}
