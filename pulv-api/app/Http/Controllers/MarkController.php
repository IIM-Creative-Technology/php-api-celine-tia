<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarkController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'id_student' => 'required|exists:students,id',
            'id_subject' => 'required|exists:subjects,id',
            'score' => 'required|numeric|min:0|lte:20'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }

        return Mark::create($request->all());
    }
}
