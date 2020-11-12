<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\school;
Use App\student;
class SchoolController extends Controller
{
 public function newschool()
 {
     return view('newschool');
 }

 public function savenewschool(Request $request)
 {
    $request->validate([

        'name' => 'required|unique:schools',
        'location' => 'required',

    ]);

    $data = new school();
    $data->name = $request['name'];
    $data->location = $request['location'];
    $data->save();

    return redirect()->route('schools')->with(['message' => 'School added successfully']);

 }
 public function schools()
 {
     $data = school::orderBy('name','asc')->get();
     return view('schools',['school'=>$data]);
 }

 public function viewschool($id)
 {
     $data = student::where('school',$id)->orderBy('name','asc')->get();
     $data2 = school::where('id',$id)->first();

     return view('viewschool',['school'=>$data2, 'student'=>$data]);
 }
}
///
