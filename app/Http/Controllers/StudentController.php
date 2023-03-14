<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::latest()->get();
        return  view('frontend.home', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        $data['students'] = Student::where('user_id',Auth::user()->id)->latest()->get();
        return  view('frontend.student', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user_id = Auth::user()->id;
         $student = new Student();
         $student->name = $request->name;
         $student->group = $request->group;
         $student->user_id = $user_id;
         $student->save();
         return redirect()->back();
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data['students'] = Student::latest()->get();
        // $edit_student= Student::findOrfail($id);
        // return  view('frontend.student-edit', $data,compact('edit_student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['students'] = Student::latest()->get();
        $edit_student= Student::findOrfail($id);
        return  view('frontend.student-edit', $data,compact('edit_student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student =  Student::findOrfail($id);
        $student->name = $request->name;
        $student->group = $request->group;
        $student->update();
        return redirect()->to('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $student =  Student::findOrfail($id);
       $student->delete();
       return redirect()->to('student');
    }
}
