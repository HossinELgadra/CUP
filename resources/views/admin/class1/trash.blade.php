@extends('layouts.admin')
@section('title')
الصفوف الدراسية المحذوفة
@endsection
 
@section('contentheader')
الصفوف الدراسية المحذوفة
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
          <h3 class="card-title">بيانات الصفوف الدراسية الدراسيةالمحذوفة</h3>
          
          <a href="{{ route('admin.class1.index')}}" class="btn btn-sm btn-success">الرجوع</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
           
          </div>
         
          @if(@isset($datas) && !@empty($datas))
            <table id="example2" class="table table-bordered table-hover">
             
              <thead>
                <th>معرف الصف</th>
                <th>اسم الصف</th>
                <th>اسم السنة الدراسية</th>
                <th>تاريخ الانشاء</th>
                <th>تاريخ التعديل</th>
              </thead>
              <tbody>
                @foreach ($datas as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->class_name}}</td>
                  <td>{{$data->yearname}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>{{$data->updated_at}}</td>
                <td>
                  <form  method="POST">
                    <a class="btn btn-primary" href="{{ route('admin.class1.restore',$data->id) }}">استعادة</a>
                    @csrf
                    @method('PUT')
                    
                </form>

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

