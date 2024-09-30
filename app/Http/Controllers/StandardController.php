<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StandardController extends Controller
{
    public function __construct()
    {
       $this->middleware("auth");
    }
    public function index(){

        $user =auth()->user();
        $students=Student::where('teacher_id', $user->id)->get();
        return view('home', compact('students'));
    }
    public function show(){
        return view('contact');
    }
    public function create(){

       return view('layouts.create');
    }
    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'class'=>'required|numeric',
            'address'=>'required|string|max:225',
            'roll_no'=>'required|',
            'contact'=>'required',
            'section'=>'required'
        ]);
        $students = Student::create([
            'name' => $data['name'],
            'class' => $data['class'],
            'address' => $data['address'],
            'roll_no' => $data['roll_no'],
            'contact' => $data['contact'],
            'section' => $data['section'],
            'teacher_id' => auth()->user()->id,  // Associate with the current teacher
        ]);
        $students->save();
        return redirect('home')->with('status','Successfully Student added');
}

}
