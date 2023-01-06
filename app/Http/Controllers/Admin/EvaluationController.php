<?php

namespace App\Http\Controllers\Admin;
use App\Models\Evaluation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    public function index(){
        $evaluations=Evaluation::select('evaluation')
        ->leftjoin('year','year.id','evaluation.year_id')
        ->leftjoin('student','student.id','evaluation.student_id')
        ->leftjoin('courses','courses.id','evaluation.course_id')
        ->select('evaluation.*','year.name as yearname','student.student_name as studentname','courses.name as coursename')
        ->paginate(5);

return view('admin.evaluation.index',compact('evaluations'));
    }

    public function create(){
        return view('admin.evaluation.create');
    }

    public function store(Request $request){
        
        $request->validate([
         'student_behavior' =>'required',
         'academic_evaluation' =>'required',
         'student_id' =>'required|exists:student,id',
         'course_id' =>'required|exists:courses,id',
         'year_id' =>'required|exists:year,id',
        ],[
            'student_behavior.required' => 'سلوك الطالب مطلوب',
            'academic_evaluation.required' => 'تقييم الطالب مطلوب',
            'student_id.required' => 'معرف الطالب مطلوب',
            'student_id.exists' => 'المعرف غير موجود',
            'course_id.required' => 'معرف المادة مطلوب',
            'course_id.exists' => 'معرف المادة غير موجود',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
            
        ]);

        $Evaluation = new Evaluation;

        $Evaluation->student_behavior = $request->get('student_behavior');
        $Evaluation->academic_evaluation = $request->get('academic_evaluation');
        $Evaluation->student_id = $request->get('student_id');
        $Evaluation->course_id = $request->get('course_id');
        $Evaluation->year_id = $request->get('year_id');


        $Evaluation->save();

         return redirect()->route('admin.evaluation.index')->with(['success'=>'تم اضافة تقييم بنجاح']);

    
 }
 public function edit($id)
 {
     $evaluations=Evaluation::select()->find($id);
     return view('admin.evaluation.edit',['datas'=>$evaluations]);
 }

 public function update(Request $request,$id)
 {
     
     $request->validate([
        'student_behavior' =>'required',
         'academic_evaluation' =>'required',
         'student_id' =>'required|exists:student,id',
         'course_id' =>'required|exists:courses,id',
         'year_id' =>'required|exists:year,id',
        ],[
            'student_behavior.required' => 'سلوك الطالب مطلوب',
            'academic_evaluation.required' => 'تقييم الطالب مطلوب',
            'student_id.required' => 'معرف الطالب مطلوب',
            'student_id.exists' => 'المعرف غير موجود',
            'course_id.required' => 'معرف المادة مطلوب',
            'course_id.exists' => 'معرف المادة غير موجود',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
            
        ]);

     $data_to_update['student_behavior']=$request->student_behavior;
     $data_to_update['academic_evaluation']=$request->academic_evaluation;
     $data_to_update['student_id']=$request->student_id;
     $data_to_update['course_id']=$request->course_id;
     $data_to_update['year_id']=$request->year_id;
     
     

     Evaluation::where(['id'=>$id])->update($data_to_update);
     
     
     return redirect()->route('admin.evaluation.index')->with(['success'=>'تم تعديل التقييم بنجاح']);
 }

 public function ajax_search(Request $request){
    if($request->ajax()){
        $search=$request->search;
        $evaluations=Evaluation::select('evaluation')
        ->leftjoin('year','year.id','evaluation.year_id')
        ->leftjoin('student','student.id','evaluation.student_id')
        ->leftjoin('courses','courses.id','evaluation.course_id')
        ->select('evaluation.*','year.name as yearname','student.student_name as studentname','courses.name as coursename')
        ->where('student.student_name','LIKE',"%{$search}%")
        ->orderBy('id','ASC')
        ->paginate(5);
        return view('admin.evaluation.ajax_search',['evaluations'=>$evaluations]);
    }
}

public function trashed(){
    $evaluations= Evaluation ::
    select('evaluation')
        ->leftjoin('year','year.id','evaluation.year_id')
        ->leftjoin('student','student.id','evaluation.student_id')
        ->leftjoin('courses','courses.id','evaluation.course_id')
        ->select('evaluation.*','year.name as yearname','student.student_name as studentname','courses.name as coursename')
       
    ->onlyTrashed()
    ->orderBy('id','ASC')
    ->paginate(5);
    return view('admin.evaluation.trash',['evaluations'=>$evaluations]);
}
public function restore($id){
    $evaluations=Evaluation::withTrashed()->findOrFail($id);
    if(!empty($evaluations)){
        $evaluations->restore();
    }
    return redirect()->route('admin.evaluation.index')->with(['success'=>'تم استرجاع التقييم بنجاح']);

}

public function destroy($id){
    $evaluations =Evaluation::find($id);
    $evaluations->delete($id);
    return redirect()->route('admin.evaluation.index')->with(['success'=>'تم حذف التقييم بنجاح']);
}

}