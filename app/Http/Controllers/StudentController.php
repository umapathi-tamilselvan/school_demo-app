<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index($id)
    {

        $student = Student::find($id);

        return view('layouts.view', compact('student'));
    }

    public function show($id)
    {
        $student = Student::find($id);

        return view('layouts.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|numeric',
            'address' => 'required|string|max:225',
            'roll_no' => 'required',
            'contact' => 'required|string|max:15',
            'section' => 'required',
            'dob' => 'required|date',
            'blood_group' => 'required|string',
          'file'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        
        $student = Student::find($id);
        $student->update($data);

        return redirect('home')->with('success', 'Edited successfully!');
    }

    public function destroy($id)
    {

        $students = Student::find($id)->delete();

        return redirect('home')->with('delete', 'Deleted sucessfully');
    }
}
