<?php

namespace App\Http\Controllers\Admin;
use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Class1;
use Illuminate\Support\Facades\DB;
class CourseController extends Controller
{
    public function index(){
       $courses=Course::select('courses')
                     ->leftjoin('class1','class1.id','courses.class_id')
                     ->leftjoin('year','year.id','courses.year_id')
                     ->select('courses.*','class1.class_name as classname','year.name as yearname')
                     ->paginate(5);
             
        return view('admin.course.index',compact('courses'));
        
    }

    public function create(){
        return view('admin.course.create');
    }

    public function store(Request $request){
        
        $request->validate([
         'name' =>'required',
         'class_id' =>'required|exists:class1,id',
         'year_id' =>'required|exists:year,id',
        
        ],[
            'name.required' => 'اسم الفصل مطلوب',
            'class_id.required' => 'معرف الفصل مطلوب',
            'class_id.exists' => 'المعرف غير موجود',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
            
        ]);

        $Course = new Course;

        $Course->name = $request->get('name');
        $Course->class_id = $request->get('class_id');
        $Course->year_id = $request->get('year_id');
        


        $Course->save();

         return redirect()->route('admin.course.index')->with(['success'=>'تم اضافة مادة بنجاح']);

    
 }
 public function edit($id)
 {
     $courses=Course::select()->find($id);
     return view('admin.course.edit',['datas'=>$courses]);
 }

 public function update(Request $request,$id)
 {
     
     $request->validate([
        'name' =>'required',
         'class_id' =>'required|exists:class1,id',
         'year_id' =>'required|exists:year,id',
        ],[
            'name.required' => 'اسم الفصل مطلوب',
            'class_id.required' => 'معرف الفصل مطلوب',
            'class_id.exists' => 'المعرف غير موجود',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
            
        ]);

     $data_to_update['name']=$request->name;
     $data_to_update['class_id']=$request->class_id;
     $data_to_update['year_id']=$request->year_id;
     
     

     Course::where(['id'=>$id])->update($data_to_update);
     
     
     return redirect()->route('admin.course.index')->with(['success'=>'تم تعديل المادة بنجاح']);
 }

 public function ajax_search(Request $request){
    if($request->ajax()){
        $search=$request->search;
        $courses=Course::select('courses')
                     ->leftjoin('class1','class1.id','courses.class_id')
                     ->leftjoin('year','year.id','courses.year_id')
                     ->select('courses.*','class1.class_name as classname','year.name as yearname')
                     ->where('courses.name','LIKE',"%{$search}%")
                     ->orderBy('id','ASC')
                     ->paginate(5);
       
        return view('admin.course.ajax_search',['courses'=>$courses]);
    }
}

public function trashed(){
    $courses= Course ::
    select('courses')
                     ->leftjoin('class1','class1.id','courses.class_id')
                     ->leftjoin('year','year.id','courses.year_id')
                     ->select('courses.*','class1.class_name as classname','year.name as yearname')
                    
    ->onlyTrashed()
    ->orderBy('id','ASC')
    ->paginate(5);
    return view('admin.course.trash',['courses'=>$courses]);
}
public function restore($id){
    $courses=Course::withTrashed()->findOrFail($id);
    if(!empty($courses)){
        $courses->restore();
    }
    return redirect()->route('admin.course.index')->with(['success'=>'تم استرجاع المادة بنجاح']);

}

public function destroy($id){
    $courses =Course::find($id);
    $courses->delete($id);
    return redirect()->route('admin.course.index')->with(['success'=>'تم حذف المادة بنجاح']);
}
}