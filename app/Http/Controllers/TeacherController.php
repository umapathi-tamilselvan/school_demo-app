<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user = auth()->user();
        $students = Student::where('teacher_id', $user->id)->get();

        return view('home', compact('students'));
    }

    public function create()
    {

        return view('layouts.create');
    }

    public function store(Request $request)
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
        $imageName = time() . '.' . $request->file->extension();

        $request->file->storeAs('public/images', $imageName);

          if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/students'), $imageName);
        } else {
            $imageName = null;
        }
         $students = Student::create([
            'name' => $data['name'],
            'class' => $data['class'],
            'address' => $data['address'],
            'roll_no' => $data['roll_no'],
            'contact' => $data['contact'],
            'section' => $data['section'],
            'dob' => $data['dob'],
            'blood_group' => $data['blood_group'],
           'image' => $imageName,
            'teacher_id' => auth()->user()->id,
        ]);


        $students->save();

        return redirect('home')->with('status', 'Successfully Student added');
    }
}
