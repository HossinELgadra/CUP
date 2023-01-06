@extends('layouts.admin')
@section('title')
   الطلبة
@endsection
 
@section('contentheader')
الطلبة
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.student.index')}}"> الطلبة</a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">بيانات الطلبة</h3>
          <input type="hidden" id="token_search" value="{{csrf_token()}}">
          <input type="hidden" id="ajax_search_url" value="{{route('admin.student.ajax_search')}}">
          <a href="{{ route('admin.student.create')}}" class="btn btn-sm btn-success">اضافة طالب جديد </a>
          <a href="{{ route('admin.student.trash')}}" class="btn btn-sm btn-danger">المحذوفات</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
            <input type="text" id="search" placeholder="بحث باسم الطالب" class="form-control"> <br>
          </div>
          <div id="ajax_responce_serarchDiv">

            <table id="example2" class="table table-bordered table-hover">
             
              <thead>
                <th>معرف الطالب</th>
                <th>اسم الطالب</th>
                <th>اسم ولي الامر</th>
                <th>تاريخ الميلاد</th>
                <th>هاتف ولي الامر</th>
                <th>عنوان السكن</th>
                <th>اسم الصف الدراسي</th>
                <th>اسم السنة الدراسية</th>
                
               
                
              </thead>
              <tbody>
                @foreach ($students as $data)
                <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->student_name}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->DOB}}</td>
                <td>{{$data->parent_mobile}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->classname}}</td>
                <td>{{$data->yearname}}</td>
                
               

                <td>
                  <a class="btn btn-primary" href="{{ route('admin.student.edit',$data->id) }}">تعديل</a>
              <a onclick="return confirm('هل تريد حذف الطالب')" class="btn btn-danger" href="{{ route('admin.student.destroy',$data->id) }}">حذف</a>
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
</div>
@endsection

@section('script')
<script src="{{ asset('assets/admin/js/student.js')}}"></script>
@endsection
