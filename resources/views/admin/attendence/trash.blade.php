@extends('layouts.admin')
@section('title')
الحضور والغياب المحذوف
@endsection
 
@section('contentheader')
الحضور والغياب المحذوف
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
          <h3 class="card-title">بيانات الحضور والغياب المحذوف</h3>
         
          <a href="{{ route('admin.attendence.index')}}" class="btn btn-sm btn-success">الرجوع</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
            
          </div>
          
            @if(@isset($datas) && !@empty($datas))
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
                  @foreach ($datas as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->studentname}}</td>
                  <td>{{$data->classtname}}</td>
                  <td>{{$data->attendence}}</td>
                  <td>{{$data->yearname}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>
                    
                        <a class="btn btn-primary" href="{{ route('admin.attendence.restore',$data->id) }}">استعادة</a>
                        
                 
              
                   
                </td>
                </tr>
                
                </tbody>
                @endforeach
              </table>
              <br>
              {{ $datas->links() }}
            @else
            <div class="alert alert-danger">
                لا توجد بيانات لعرضها
            </div>

            @endif
          
        </div>
      </div>
    </div>
</div>
@endsection

