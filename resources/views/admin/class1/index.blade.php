@extends('layouts.admin')
@section('title')
الصفوف الدراسية
@endsection
 
@section('contentheader')
الصفوف الدراسية
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.class1.index')}}"> الصفوف الدراسية </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">بيانات الصفوف الدراسية</h3>
          <input type="hidden" id="token_search" value="{{csrf_token()}}">
          <input type="hidden" id="ajax_search_url" value="{{route('admin.class1.ajax_search')}}">
          <a href="{{ route('admin.class1.create')}}" class="btn btn-sm btn-success">اضافة صف جديد </a>
          <a href="{{ route('admin.class1.trash')}}" class="btn btn-sm btn-danger">المحذوفات</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
            <input type="text" id="search" placeholder="بحث باسم الصف" class="form-control"> <br>
          </div>
          <div id="ajax_responce_serarchDiv">
        
            <table id="example2" class="table table-bordered table-hover">
             
              <thead>
                <th>معرف الصف</th>
                <th>اسم الصف</th>
                <th>اسم السنة الدراسية</th>
                <th>تاريخ الانشاء</th>
                <th>تاريخ التعديل</th>
              </thead>
              <tbody>
                @foreach ($class1s as $data)
                <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->class_name}}</td>
                <td>{{$data->yearname}}</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->updated_at}}</td>
                <td>
                  
                    <a class="btn btn-primary" href="{{ route('admin.class1.edit',$data->id) }}">تعديل</a>
                    <a onclick="return confirm('هل تريد حذف الصف الدراسي')" class="btn btn-danger" href="{{ route('admin.class1.destroy',$data->id)}}">حذف</a>


                </td>
                </tr>
               
              </tbody>
              @endforeach
              </table>
              <br>
              {{ $class1s->links() }}
          
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/admin/js/class1.js')}}"></script>
@endsection