<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendence;
use App\Models\User;
use illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;


class AttendenceController extends Controller
{
    use HttpResponses;
    public function Attendence(){
       if($user=Auth::user()->id) {
        $attendences=Attendence::select('attendence')
        ->leftjoin('student','student.id','attendence.student_id')
        ->select('attendence','student.student_name as studentname', 'attendence.created_at')
        ->where('student.user_id',$user)
        ->get();
            return response()->json($attendences); 
       }else{
              return $this->errorResponse('User not found', 404);
                } }

           
         
        
    
}