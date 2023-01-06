<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Evaluation;
use illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;
class EvaluationController extends Controller
{
    use HttpResponses;
    public function Evaluation(){
       if($user=Auth::user()->id) {
        $evaluations=Evaluation::select('evaluation')
        ->leftjoin('student','student.id','evaluation.student_id')
        ->leftjoin('courses','courses.id','evaluation.course_id')
        ->select('student.student_name as studentname','courses.name as coursename','student_behavior','academic_evaluation', 'evaluation.created_at' )
        ->where('student.user_id',$user)
        ->get();
            return response()->json($evaluations); 
       }else{
              return $this->errorResponse('User not found', 404);
                } }
}
