<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\school;
Use App\student;
class StudentController extends Controller
{
public function newstudent($id)
{
    $data2 = school::where('id',$id)->first();

    return view('newstudent',['shule'=>$data2]);
}

public function savestudent(Request $request)
{
    $y=1;
    $totmat=$request['totalinputs']/4;

  $z=1;
  $tag = date("Y-m-d H:i:s");
  for ($x = 1; $x <= $totmat; $x++) {

  $student = new  student();

        $student->name = $request[$z];
          $z=$z+1;
        $student->age = $request[$z];
        $z=$z+1;
        $student->class = $request[$z];
          $z=$z+1;
        $student->stream = $request[$z];


        $student->registeredby = auth()->user()->id;

        $student->school = $request['shule'];

          $z++;
        $student->save();

        return redirect()->route('viewschool',[$request['shule']])->with(['message' => 'Student(s) Registered successfully']);


}
}
}
