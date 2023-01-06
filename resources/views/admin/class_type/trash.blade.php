@extends('layouts.admin')
@section('title')
    الفصول الدراسية المحذوفة
@endsection
 
@section('contentheader')
الفصول الدراسية المحذوفة
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.class_type.index')}}"> الفصول الدراسية </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">بيانات الفصول الدراسية المحذوفة</h3>
        
          <a href="{{ route('admin.class_type.index')}}" class="btn btn-sm btn-success">الرجوع</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
           
          </div>
         
            @if(@isset($datas) && !@empty($datas))
            <table id="example2" class="table table-bordered table-hover">
             
              <thead>
                <th>معرف الفصل</th>
                <th>اسم الفصل</th>
                <th>اسم الصف الدراسي</th>
                <th>اسم السنة الدراسية</th>
                <th>تاريخ الانشاء</th>
                <th>تاريخ التعديل</th>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->classname}}</td>
                  <td>{{$data->yearname}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>{{$data->updated_at}}</td>

                <td>
               
                    <a class="btn btn-primary" href="{{ route('admin.class_type.restore',$data->id) }}">استعادة</a>
                   
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


