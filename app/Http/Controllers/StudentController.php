<?php

namespace App\Http\Controllers;

use App\Models\User;

Use App\Models\Student;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class StudentController extends Controller
{
public function index()
{
    $students = Student::all();
    return view('index',compact('students'));
}

public function edit(Student $student)
{
    return view('edit', compact('student'));
}
public function update(Request $request, Student $student)
{
    $request->validate([
        'name' => 'required',
        'nis' => 'required',
        'alamat' => 'required'
    ]);

    $student->update([
        'name' => $request->name,
        'nis' => $request->nis,
        'alamat' => $request->alamat,
    ]);

    return redirect()->route('students.index');
}

}
