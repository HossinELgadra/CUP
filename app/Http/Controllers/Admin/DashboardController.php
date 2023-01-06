<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Class1;


class DashboardController extends Controller
{
    public function index(){
        $students=Student::select()->orderby('id','ASC')->paginate(5);
        $users=User::select()->orderby('id','ASC')->paginate(5);
        $class1s=Class1::select()->orderby('id','ASC')->paginate(5);

        return view('dashboard',compact('students','users','class1s'));   
    }
}
