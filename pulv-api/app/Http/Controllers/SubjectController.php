<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function getAllSubjects()
    {
        return response()->json(Subject::all());
    }

    public function getSubject(Subject $subject){
        return $subject;
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
            'date_begin' => 'required|date_format:Y-m-d',
            'date_end' => 'required|date_format:Y-m-d|after:date_begin',
            'id_school_year' => 'required|exists:school_classes,id',
            'id_teacher' => 'required|exists:teachers,id'
            ]);
        if($validator->fails()) {
            response()->json($validator->errors(), 400);
        }

        return Subject::create($request->all());
    }

    public function update(Request $request, Subject $subjectId)
    {
        $subject = Subject::find($subjectId);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'date_begin' => 'required|date_format:Y-m-d',
            'date_end' => 'required|date_format:Y-m-d|after:date_begin',
            'id_school_year' => 'required|exists:school_classes,id',
            'id_teacher' => 'required|exists:teachers,id'
            ]);
        if($validator->fails()) {
            response()->json($validator->errors(), 400);
        }

        $subject->update($request->all());
        return response()->json($subject);
    }
}
