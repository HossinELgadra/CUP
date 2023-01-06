<?php

namespace App\Http\Controllers\Admin;
use App\Models\Class_type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Class_typeController extends Controller
{
    public function index(){
        $class_types=Class_type::select('class_type')
                     ->leftjoin('year','year.id','class_type.year_id')
                     ->leftjoin('class1','class1.id','class_type.class_id')
                     ->select('class_type.*','year.name as yearname','class1.class_name as classname')
                     ->paginate(5);
             
        return view('admin.class_type.index',compact('class_types'));
    }

    public function create(){
        return view('admin.class_type.create');
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

        $Class_type = new Class_type;

        $Class_type->name = $request->get('name');
        $Class_type->class_id = $request->get('class_id');
        $Class_type->year_id = $request->get('year_id');

        $Class_type->save();

         return redirect()->route('admin.class_type.index')->with(['success'=>'تم اضافة فصل دراسي بنجاح']);

    
 }
 public function edit($id)
 {
     $class_types=Class_type::select()->find($id);
     return view('admin.class_type.edit',['datas'=>$class_types]);
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
     

     Class_type::where(['id'=>$id])->update($data_to_update);
     
     
     return redirect()->route('admin.class_type.index')->with(['success'=>'تم تعديل الفصل الدراسي بنجاح']);
 }

 public function ajax_search(Request $request){
    if($request->ajax()){
        $search=$request->search;
        $class_types=Class_type::select('class_type')
        ->leftjoin('year','year.id','class_type.year_id')
        ->leftjoin('class1','class1.id','class_type.class_id')
        ->select('class_type.*','year.name as yearname','class1.class_name as classname')
        ->where('class_type.name','LIKE',"%{$search}%")
        ->orderBy('id','ASC')
        ->paginate(5);
       
        return view('admin.class_type.ajax_search',['class_types'=>$class_types]);
    }
}

public function trashed(){
    $class_types= Class_type ::

    select('class_type')
                     ->leftjoin('year','year.id','class_type.year_id')
                     ->leftjoin('class1','class1.id','class_type.class_id')
                     ->select('class_type.*','year.name as yearname','class1.class_name as classname')
                     
    ->onlyTrashed()
    ->orderBy('id','ASC')
    ->paginate(5);
    return view('admin.class_type.trash',['datas'=>$class_types]);
}
public function restore($id){
    $class_types=Class_type::withTrashed()->findOrFail($id);
    if(!empty($class_types)){
        $class_types->restore();
    }
    return redirect()->route('admin.class_type.index')->with(['success'=>'تم استرجاع الفصل الدراسي بنجاح']);

}

public function destroy($id){
    $class_types =Class_type::find($id);
    $class_types->delete($id);
    return redirect()->route('admin.class_type.index')->with(['success'=>'تم حذف الفصل الدراسي بنجاح']);
}


}
