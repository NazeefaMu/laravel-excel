<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= Student::latest()->paginate('5');
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'studentName'=>'required',//names in model
            'Course'=>'required',
            'Fees'=>'required',
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success','Students creatd successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
            $students = Student::find($student);
        return view('students.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        $students = Student::find($student);
        return view('students.edit')->with('students', $students);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //

//        $students = Student::find($student);
//        $input = $request->all();
//        $students->update($input);
//        return redirect('students')->with('flash_message', 'Contact Updated!');

        $request->validate([
            'studentName'=>'required',//names in model
            'Course'=>'required',
            'Fees'=>'required',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success','Students updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        Student::destroy($student);
        return redirect('students')->with('flash_message', 'Contact deleted!');
    }
}
