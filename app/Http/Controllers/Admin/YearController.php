<?php

namespace App\Http\Controllers\Admin;
use App\Models\Year;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class YearController extends Controller
{
    public function index(){
        $data=Year::select()->orderby('id','ASC')->paginate(5);
        return view('admin.year.index',['datas'=>$data]);
    }

    public function create(){
        return view('admin.year.create');
    }

    public function store(Request $request){
        
        $request->validate([
         'name' =>'required',
        
        ],[
            'name.required' => 'اسم السنة مطلوب'
        ]);

        $Year = new Year;

        $Year->name = $request->get('name');
       

        $Year->save();

         
         return redirect()->route('admin.year.index')->with(['success'=>'تم اضافة سنة دراسية بنجاح']);

    
 }
  public function edit($id)
    {
        $years=Year::select()->find($id);
        return view('admin.year.edit',['datas'=>$years]);
    }

    public function update(Request $request,$id)
    {
        
        $request->validate([
            'name' =>'required',
            
           ],[
            'name.required' => 'اسم السنة مطلوب'
           ]);
   
        $data_to_update['name']=$request->name;
        

        Year::where(['id'=>$id])->update($data_to_update);
        
        
        return redirect()->route('admin.year.index')->with(['success'=>'تم تعديل السنة الدراسية بنجاح']);
    }
    public function ajax_search(Request $request){
        if($request->ajax()){
            $search=$request->search;
            $years=Year::where('name','LIKE',"%{$search}%")->orderBy('id','ASC')->paginate(5);
            return view('admin.year.ajax_search',['datas'=>$years]);
        }
    }

    public function trashed(){
        $years= Year ::onlyTrashed()->orderBy('id','ASC')->paginate(5);
        return view('admin.year.trash',['datas'=>$years]);
    }
    public function restore($id){
        $years=Year::withTrashed()->findOrFail($id);
        if(!empty($years)){
            $years->restore();
        }
        return redirect()->route('admin.year.index')->with(['success'=>'تم استرجاع السنة الدراسية بنجاح']);

    }

    public function destroy($id){
        $years=Year::find($id);
        $years->delete();
        return redirect()->route('admin.year.index')->with(['success'=>'تم حذف السنة الدراسية بنجاح']);

    }

    public function show(Year $year)
    {
        return view('admin.year.show',['datas'=>$year]);
    }
}
