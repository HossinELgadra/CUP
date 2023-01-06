<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Class1;
use App\Models\Student;
use illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;

class HomePageController extends Controller
{
    use HttpResponses;
    public function HomePage(){
       if($user=Auth::user()->id) {
        $classes=Class1::select('class1')
        ->leftjoin('student','student.class_id','class1.id')
        ->select('student.student_name as studentname','class1.class_name as classname',)
        ->where('student.user_id',$user)
        ->get();
            return response()->json($classes); 
       }else{
              return $this->errorResponse('User not found', 404);
                } }
}
