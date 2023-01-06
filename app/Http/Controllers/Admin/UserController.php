<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function index(){
        $users=User::select('users')
        
                     ->leftjoin('year','year.id','users.year_id')
                     ->select('users.*','year.name as yearname')
                     ->paginate(5);
             
        return view('admin.user.index',compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function store(Request $request){
        
           $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'user_type' =>'required',
            'password' =>'required',
            'year_id' =>'required|exists:year,id',
           ],[
            'name.required' => 'اسم المستخدم مطلوب',
            'email.required' => 'البريد الالكتروني مطلوب',
            'password.required' => 'الرمز السري مطلوب',
            'user_type.required' => 'نوع المستخدم مطلوب',
            'year_id.required' => 'معرف السنة مطلوب',
            'year_id.exists' => 'معرف السنة غير موجود',
           ]);

           $user = new User;

          
           $user->name = $request->get('name');
           $user->email = $request->get('email');
           $user->user_type = $request->get('user_type');
           $user->password = $request->get('password');
           $user->year_id = $request->get('year_id');
   
           $user->save();
   
            return redirect()->route('admin.user.index')->with(['success'=>'تم اضافة مستخدم بنجاح']);

       
    }
    public function edit($id)
    {
        $users=User::select()->find($id);
        return view('admin.user.edit',['datas'=>$users]);
    }

    public function update(Request $request,$id)
    {
        
            $request->validate([
                'name' =>'required',
                'email' =>'required|email',
                'user_type' =>'required',
                'year_id' =>'required|exists:year,id',
               ],[
                'name.required' => 'اسم المستخدم مطلوب',
                'email.required' => 'البريد الالكتروني مطلوب',
                'password.required' => 'الرمز السري مطلوب',
                'user_type.required' => 'نوع المستخدم مطلوب',
                'year_id.required' => 'معرف السنة مطلوب',
                'year_id.exists' => 'معرف السنة غير موجود',
               ]);
   
        $data_to_update['name']=$request->name;
        $data_to_update['email']=$request->email;
        $data_to_update['user_type']=$request->user_type;
        $data_to_update['year_id']=$request->year_id;

        User::where(['id'=>$id])->update($data_to_update);
        
        
        return redirect()->route('admin.user.index')->with(['success'=>'تم تعديل المستخدم بنجاح']);
    }

    public function ajax_search(Request $request){
        if($request->ajax()){
            $search=$request->search;
            $users=User::select('users')
            ->leftjoin('year','year.id','users.year_id')
            ->select('users.*','year.name as yearname')
            ->where('users.name','LIKE',"%{$search}%")
            ->orderBy('id','ASC')
            ->paginate(5);
            
            return view('admin.user.ajax_search',['users'=>$users]);
        }
    }

    

    public function trashed_users(){
        $users= User::select('users')
        ->leftjoin('year','year.id','users.year_id')
        ->select('users.*','year.name as yearname')
       
        
        
        ->onlyTrashed()
        ->orderBy('id','ASC')
        ->paginate(5);
        return view('admin.user.trash',['users'=>$users]);
    }
    public function restore($id){
        $users=User::withTrashed()->findOrFail($id);
        if(!empty($users)){
            $users->restore();
        }
        return redirect()->route('admin.user.index')->with(['success'=>'تم استرجاع المستخدم بنجاح']);

    }

    public function destroy($id){
        $user =User::find($id);
        $user->delete($id);
        return redirect()->route('admin.user.index')->with(['success'=>'تم حذف المستخدم بنجاح']);
    }
    

    
}