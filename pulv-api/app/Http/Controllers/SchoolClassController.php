<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolClassController extends Controller
{
    public function getAllClasses()
    {
        return response()->json(SchoolClass::all());
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'school_year' => 'required|string'
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }

        return SchoolClass::create($request->all());
    }

    public function update(Request $request, SchoolClass $class)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'school_year' => 'required|string'
        ]);
        if($validator->fails()) {
            return $validator->errors();
        }

        $class->update($request->all());
        return $class;
    }
}
