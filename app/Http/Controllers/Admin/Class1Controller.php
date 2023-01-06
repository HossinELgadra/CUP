<?php

namespace App\Http\Controllers\Admin;
use App\Models\Class1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Class1Controller extends Controller
{
    public function index(){
        $class1s=Class1::select('class1')
                     ->leftjoin('year','year.id','class1.year_id')
                     ->select('class1.*','year.name as yearname')
                     ->paginate(5);
             
        return view('admin.class1.index',compact('class1s'));
    }

    public function create(){
        return view('admin.class1.create');
    }

    public function store(Request $request){
        
        $request->validate([
         'class_name' =>'required',
         'year_id' =>'required|exists:year,id',
        ],[
            'class_name.required' => 'اسم الصف مطلوب',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
        ]);

        $Class1 = new Class1;

        $Class1->class_name = $request->get('class_name');
        $Class1->year_id = $request->get('year_id');

        $Class1->save();

         return redirect()->route('admin.class1.index')->with(['success'=>'تم اضافة صف دراسي بنجاح']);

    
 }
 public function edit($id)
 {
     $class1s=Class1::select()->find($id);
     return view('admin.class1.edit',['datas'=>$class1s]);
 }

 public function update(Request $request,$id)
 {
     
     $request->validate([
         
         'class_name' =>'required',
         'year_id' =>'required|exists:year,id',
        ],[
            'class_name.required' => 'اسم الصف مطلوب',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
        ]);

     $data_to_update['class_name']=$request->class_name;
     $data_to_update['year_id']=$request->year_id;
     

     Class1::where(['id'=>$id])->update($data_to_update);
     
     
     return redirect()->route('admin.class1.index')->with(['success'=>'تم تعديل الصف الدراسي بنجاح']);
 }

 public function ajax_search(Request $request){
    if($request->ajax()){
        $search=$request->search;
        $class1s=Class1::select('class1')
        ->leftjoin('year','year.id','class1.year_id')
        ->select('class1.*','year.name as yearname')
        ->where('class_name','LIKE',"%{$search}%")
        ->orderBy('id','ASC')
        ->paginate(5);
       
        return view('admin.class1.ajax_search',['class1s'=>$class1s]);
    }
}

public function trashed(){
    $class1s= Class1 ::
    select('class1')
                     ->leftjoin('year','year.id','class1.year_id')
                     ->select('class1.*','year.name as yearname')
                     
    ->onlyTrashed()
    ->orderBy('id','ASC')
    ->paginate(5);
    return view('admin.class1.trash',['datas'=>$class1s]);
}
public function restore($id){
    $class1s=Class1::withTrashed()->findOrFail($id);
    if(!empty($class1s)){
        $class1s->restore();
    }
    return redirect()->route('admin.class1.index')->with(['success'=>'تم استرجاع الصف الدراسي بنجاح']);

}

public function destroy($id){
    $class1s =Class1::find($id);
    $class1s->delete($id);
    return redirect()->route('admin.class1.index')->with(['success'=>'تم حذف الصف الدراسي بنجاح']);
}

}
