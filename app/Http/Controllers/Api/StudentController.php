<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return response()->json(['students' =>  $students, 'status' => 200]);
    }

    public function store(Request $request)
    {
        $validetor = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'group' => 'required',
            ]
        );
        if ($validetor->fails()) {
            return response()->json([
                'status' => 422,
                'message' =>  $validetor->messages(),
            ]);
        } else {
            $user_id = 1;
            $student = new Student();
            $student->name = $request->name;
            $student->group = $request->group;
            $student->user_id = $user_id;
            $student->save();
            return response()->json([
                'status' => 200,
                'message' =>  "Successfully inserted",
            ]);
        }
    }

    public  function edit($id)

    {
       
       $student = Student::find($id);
       return response()->json(['student'=> $student, 'status'=> 200]);
    }
    public function update(Request $request)
    {
   
    
      $student = Student::find($request->id);
        $user_id = 1;
        $student->name = $request->name;
        $student->group = $request->group;
        $student->user_id = $user_id;
        $student->update();
        return response()->json([
            'status' => 200,
            'message' =>  "Successfully Update",
        ]);
    }
}
