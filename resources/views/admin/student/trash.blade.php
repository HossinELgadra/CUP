@extends('layouts.admin')
@section('title')
  الطلبة المحذوفين
@endsection
 
@section('contentheader')
 الطلبة المحذوفين
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.student.index')}}">  الطلبة </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"> بيانات الطلبةالمحذوفين</h3>
        
          <a href="{{ route('admin.student.index')}}" class="btn btn-sm btn-success">الرجوع</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
           
          </div>
          
          
            <table id="example2" class="table table-bordered table-hover">
             
              <thead>
                <th>معرف الطالب</th>
                <th>اسم الطالب</th>
                <th>معرف المستخدم</th>
                <th>تاريخ الميلاد</th>
                <th>هاتف ولي الامر</th>
                <th>عنوان السكن</th>
                <th>معرف الصف الدراسي</th>
                <th>معرف السنة الدراسية</th>
                
                
              </thead>
              <tbody>
                @foreach ($students as $dat)
                <tr>
                  <td>{{$dat->id}}</td>
                  <td>{{$dat->student_name}}</td>
                  <td>{{$dat->username}}</td>
                  <td>{{$dat->DOB}}</td>
                  <td>{{$dat->parent_mobile}}</td>
                  <td>{{$dat->address}}</td>
                  <td>{{$dat->classname}}</td>
                  <td>{{$dat->yearname}}</td>
                  
                

                <td>
                  <form  method="POST">
                    <a class="btn btn-primary" href="{{ route('admin.student.restore',$dat->id) }}">استعادة</a>
                    @csrf
                    @method('PUT')
                    
                </form>
                </td>
                </tr>
               
              </tbody>
              @endforeach
              </table>
              <br>
              {{ $students->links() }}
           
         
        </div>
      </div>
    </div>
</div>
@endsection


