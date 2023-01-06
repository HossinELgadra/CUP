<?php

namespace App\Http\Controllers\Admin;
use App\Models\Attendence;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    public function index(){
        $attendences=Attendence::select('attendence')
        ->leftjoin('year','year.id','attendence.year_id')
        ->leftjoin('student','student.id','attendence.student_id')
        ->leftjoin('class_type','class_type.id','attendence.class_type_id')
        ->select('attendence.*','year.name as yearname','class_type.name as classtname','student.student_name as studentname')
        ->paginate(5);

return view('admin.attendence.index',compact('attendences'));
    }

    public function create(){
        return view('admin.attendence.create');
    }

    public function store(Request $request){
        
        $request->validate([
         'attendence' =>'required',
         'student_id' =>'required|exists:student,id',
         'class_type_id' =>'required|exists:class_type,id',
         'year_id' =>'required|exists:year,id',
        ], [
            'attendence.required' => 'الحضور والغياب مطلوب',
            'student_id.required' => 'معرف الطالب مطلوب',
            'class_type_id.required' => 'معرف الفصل الدراسي مطلوب',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
            'student_id.exists' => 'معرف الطالب غير موجود',
            'class_type_id.exists' => 'معرف الفصل الدراسي غير موجود',
        ]);

        $Attendence = new Attendence;

        $Attendence->attendence = $request->get('attendence');
        $Attendence->student_id = $request->get('student_id');
        $Attendence->class_type_id = $request->get('class_type_id');
        $Attendence->year_id = $request->get('year_id');
        


        $Attendence->save();

         return redirect()->route('admin.attendence.index')->with(['success'=>'تم اضافة الحضور والغياب بنجاح']);

    
 }
 public function edit($id)
 {
     $attendences=Attendence::select()->find($id);
     return view('admin.attendence.edit',['datas'=>$attendences]);
 }

 public function update(Request $request,$id)
 {
     
     $request->validate([
        'attendence' =>'required',
         'student_id' =>'required|exists:student,id',
         'class_type_id' =>'required|exists:class_type,id',
         'year_id' =>'required|exists:year,id',
        ], [
            'attendence.required' => 'الحضور والغياب مطلوب',
            'student_id.required' => 'معرف الطالب مطلوب',
            'class_type_id.required' => 'معرف الفصل الدراسي مطلوب',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
            'student_id.exists' => 'معرف الطالب غير موجود',
            'class_type_id.exists' => 'معرف الفصل الدراسي غير موجود',
        ]);

     $data_to_update['attendence']=$request->attendence;
     $data_to_update['student_id']=$request->student_id;
     $data_to_update['class_type_id']=$request->class_type_id;
     $data_to_update['year_id']=$request->year_id;
     
     

     Attendence::where(['id'=>$id])->update($data_to_update);
     
     
     return redirect()->route('admin.attendence.index')->with(['success'=>'تم تعديل الحضور والغياب بنجاح']);
 }

 public function ajax_search(Request $request){
    if($request->ajax()){
        $search=$request->search;
        $attendences=Attendence::select('attendence')
        ->leftjoin('year','year.id','attendence.year_id')
        ->leftjoin('student','student.id','attendence.student_id')
        ->leftjoin('class_type','class_type.id','attendence.class_type_id')
        ->select('attendence.*','year.name as yearname','class_type.name as classtname','student.student_name as studentname')
        ->where('student.student_name','LIKE',"%{$search}%")
        ->orderBy('id','ASC')
        ->paginate(5);
        
        return view('admin.attendence.ajax_search',['attendences'=>$attendences]);
    }
}

public function trashed(){
    $attendences= Attendence ::
    select('attendence')
        ->leftjoin('year','year.id','attendence.year_id')
        ->leftjoin('student','student.id','attendence.student_id')
        ->leftjoin('class_type','class_type.id','attendence.class_type_id')
        ->select('attendence.*','year.name as yearname','class_type.name as classtname','student.student_name as studentname')
       
    ->onlyTrashed()
    ->orderBy('id','ASC')
    ->paginate(5);
    return view('admin.attendence.trash',['datas'=>$attendences]);
}
public function restore($id){
    $attendences=Attendence::withTrashed()->findOrFail($id);
    if(!empty($attendences)){
        $attendences->restore();
    }
    return redirect()->route('admin.attendence.index')->with(['success'=>'تم استرجاع التقييم بنجاح']);

}

public function destroy($id){
    $attendences =Attendence::find($id);
    $attendences->delete($id);
    return redirect()->route('admin.attendence.index')->with(['success'=>'تم حذف التقييم بنجاح']);
}

}
