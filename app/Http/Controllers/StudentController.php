<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\school;
Use App\student;
class StudentController extends Controller
{
public function newstudent()
{
    return view('newstudent');
}
}
