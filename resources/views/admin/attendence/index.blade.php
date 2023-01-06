@extends('layouts.admin')
@section('title')
الحضور والغياب
@endsection
 
@section('contentheader')
الحضور والغياب
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.attendence.index')}}"> الحضور والغياب </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">بيانات الحضور والغياب</h3>
          <input type="hidden" id="token_search" value="{{csrf_token()}}">
          <input type="hidden" id="ajax_search_url" value="{{route('admin.attendence.ajax_search')}}">
          <a href="{{ route('admin.attendence.create')}}" class="btn btn-sm btn-success">اضافة حضور وغياب</a>
          <a href="{{ route('admin.attendence.trash')}}" class="btn btn-sm btn-danger">المحذوفات</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
            <input type="text" id="search" placeholder="بحث باسم الطالب" class="form-control"> <br>
          </div>
          <div id="ajax_responce_serarchDiv">
       
            <table id="example2" class="table table-bordered table-hover">
                 
              
                <thead>
                  <th>الرقم التعريفي</th>
                  <th>اسم الطالب</th>
                  <th> الفصل الدراسي</th>
                  <th>نوع الحضور والغياب</th>
                 
                  <th> السنة الدراسية</th>
                  <th>تاريخ الانشاء</th>
                  
                  
                </thead>
                <tbody>
                  @foreach ($attendences as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->studentname}}</td>
                  <td>{{$data->classtname}}</td>
                  <td>{{$data->attendence}}</td>
                  
                  <td>{{$data->yearname}}</td>
                  <td>{{$data->created_at}}</td>
                 
                  <td>
                  
                        <a class="btn btn-primary" href="{{ route('admin.attendence.edit',$data->id) }}">تعديل</a>
                        <a onclick="return confirm('هل تريد حذف الحضور والغياب')" class="btn btn-danger" href="{{ route('admin.attendence.destroy',$data->id) }}">حذف</a>  
                </td>
                </tr>
                
                </tbody>
                @endforeach
              </table>
              <br>
              {{ $attendences->links() }}
           
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/admin/js/attendence.js')}}"></script>
@endsection