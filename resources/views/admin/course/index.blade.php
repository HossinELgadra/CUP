@extends('layouts.admin')
@section('title')
المواد الدراسية
@endsection
 
@section('contentheader')
المواد الدراسية
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.course.index')}}"> المواد الدراسية </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">بيانات المواد الدراسية</h3>
          <input type="hidden" id="token_search" value="{{csrf_token()}}">
          <input type="hidden" id="ajax_search_url" value="{{route('admin.course.ajax_search')}}">
          <a href="{{ route('admin.course.create')}}" class="btn btn-sm btn-success">اضافة مادة جديدة </a>
          <a href="{{ route('admin.course.trash')}}" class="btn btn-sm btn-danger">المحذوفات</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
            <input type="text" id="search" placeholder="بحث باسم المادة" class="form-control"> <br>
          </div>
          <div id="ajax_responce_serarchDiv">
         
            <table id="example2" class="table table-bordered table-hover">
             
              <thead>
                <th>معرف المادة</th>
                <th>اسم المادة</th>
                <th>اسم الصف الدراسي</th>
                <th>اسم السنة الدراسية</th>
                <th>تاريخ الانشاء</th>
                <th>تاريخ التعديل</th>
              </thead>
              <tbody>

                @foreach ($courses as $dat ) 
  
                <tr>
                <td>{{$dat->id}}</td>
                <td>{{$dat->name}}</td>
                <td>{{$dat->classname}}</td>
                <td>{{$dat->yearname}}</td>
                <td>{{$dat->created_at}}</td>
                <td>{{$dat->updated_at}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.course.edit',$dat->id) }}">تعديل</a>
                    <a onclick="return confirm('هل تريد حذف المادة')" class="btn btn-danger" href="{{ route('admin.course.destroy',$dat->id)}}">حذف</a>
                </td>
                </tr> 
                <thead>

                </thead>        
                @endforeach 
              </tbody>
              </table>
              <br>
              {{ $courses->links() }}
           
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/admin/js/course.js')}}"></script>
@endsection