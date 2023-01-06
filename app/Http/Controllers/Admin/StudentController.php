<?php

namespace App\Http\Controllers\Admin;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        $students=Student::
                     select('student')
                     ->leftjoin('year','year.id','student.year_id')
                     ->leftjoin('users','users.id','student.user_id')
                     ->leftjoin('class1','class1.id','student.class_id')
                     ->select('student.*','year.name as yearname','class1.class_name as classname','users.name as username')
                     ->paginate(5);
                     
             
        return view('admin.student.index',compact('students'));
    }

    public function create(){
        return view('admin.student.create');
    }

    public function store(Request $request){
        
        $request->validate([
         'student_name' =>'required',
         'user_id' =>'required|exists:users,id',
         'DOB' =>'required',
         'parent_mobile' =>'required',
         'address' =>'required',
         'class_id' =>'required|exists:class1,id',
         'year_id' =>'required|exists:year,id',
        ],[
            'student_name.required' => 'اسم الطالب مطلوب',
            'DOB.required' => 'تاريخ ميلاد الطالب مطلوب',
            'user_id.required' => 'معرف ولي الامر مطلوب',
            'user_id.exists' => 'المعرف غير موجود',
            'parent_mobile.required' => 'رقم هاتف ولي الامر مطلوب',
            'address.required' => 'عنوان السكن مطلوب',
            'class_id.required' => 'معرف الصف مطلوب',
            'class_id.exists' => 'معرف الصف غير موجود',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
            
        ]);

        $Student = new Student;

        $Student->student_name = $request->get('student_name');
        $Student->user_id = $request->get('user_id');
        $Student->DOB = $request->get('DOB');
        $Student->parent_mobile = $request->get('parent_mobile');
        $Student->address = $request->get('address');
        $Student->class_id = $request->get('class_id');
        $Student->year_id = $request->get('year_id');
        $Student->save();

         
         return redirect()->route('admin.student.index')->with(['success'=>'تم اضافة طالب بنجاح']);

    
 }
  public function edit($id)
    {
        $students=Student::select()->find($id);
        return view('admin.student.edit',['datas'=>$students]);
    }

    public function update(Request $request,$id)
    {
        
        $request->validate([
            'student_name' =>'required',
            'user_id' =>'required|exists:users,id',
            'DOB' =>'required',
            'parent_mobile' =>'required',
            'address' =>'required',
            'class_id' =>'required|exists:class1,id',
            'year_id' =>'required|exists:year,id',
           ],[
            'student_name.required' => 'اسم الطالب مطلوب',
            'DOB.required' => 'تاريخ ميلاد الطالب مطلوب',
            'user_id.required' => 'معرف المستخدم مطلوب',
            'user_id.exists' => 'المعرف غير موجود',
            'parent_mobile.required' => 'رقم هاتف ولي الامر مطلوب',
            'address.required' => 'عنوان السكن مطلوب',
            'class_id.required' => 'معرف الصف مطلوب',
            'class_id.exists' => 'معرف الصف غير موجود',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
            
        ]);
   
        $data_to_update['student_name']=$request->student_name;
        $data_to_update['user_id']=$request->user_id;
        $data_to_update['DOB']=$request->DOB;
        $data_to_update['parent_mobile']=$request->parent_mobile;
        $data_to_update['address']=$request->address;
        $data_to_update['class_id']=$request->class_id;
        $data_to_update['year_id']=$request->year_id;

        Student::where(['id'=>$id])->update($data_to_update);
        
        
        return redirect()->route('admin.student.index')->with(['success'=>'تم تعديل الطالب بنجاح']);
    }
    public function ajax_search(Request $request){
        if($request->ajax()){
            $search=$request->search;
            $students=student::select('student')
            ->leftjoin('year','year.id','student.year_id')
            ->leftjoin('users','users.id','student.user_id')
            ->leftjoin('class1','class1.id','student.class_id')
            ->select('student.*','year.name as yearname','class1.class_name as classname','users.name as username')
            ->where('student_name','LIKE',"%{$search}%")
            ->orderBy('id','ASC')
            ->paginate(5);
            return view('admin.student.ajax_search',['students'=>$students]);
        }
    }

    public function trashed(){
        $students= Student :: 
                          select('student')
                          ->leftjoin('year','year.id','student.year_id')
                          ->leftjoin('users','users.id','student.user_id')
                          ->leftjoin('class1','class1.id','student.class_id')
                          ->select('student.*','year.name as yearname','class1.class_name as classname','users.name as username')
                          ->onlyTrashed()
                          ->orderBy('id','ASC')
                          ->paginate(5);
        return view('admin.student.trash',['students'=>$students]);
    }
    public function restore($id){
        $students=Student::withTrashed()->findOrFail($id);
        if(!empty($students)){
            $students->restore();
        }
        return redirect()->route('admin.student.index')->with(['success'=>'تم استرجاع الطالب بنجاح']);

    }

    public function destroy($id){
        $students =Student::find($id);
        $students->delete($id);
        return redirect()->route('admin.student.index')->with(['success'=>'تم حذف الطالب بنجاح']);
    }
}
