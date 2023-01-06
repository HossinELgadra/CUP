@extends('layouts.admin')
@section('title')
المواد الدراسية المحذوفة
@endsection
 
@section('contentheader')
المواد الدراسية المحذوفة
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
          <h3 class="card-title"> بيانات المواد الدراسيةالمحذوفة</h3>
         
          <a href="{{ route('admin.course.index')}}" class="btn btn-sm btn-success">الرجوع</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
          
          </div>
       
          
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
                @foreach ($courses as $dat)
                <tr>
                  <td>{{$dat->id}}</td>
                  <td>{{$dat->name}}</td>
                  <td>{{$dat->classname}}</td>
                  <td>{{$dat->yearname}}</td>
                  <td>{{$dat->created_at}}</td>
                  <td>{{$dat->updated_at}}</td>
                <td>
                  <form  method="POST">
                    <a class="btn btn-primary" href="{{ route('admin.course.restore',$dat->id) }}">استعادة</a>
                    @csrf
                    @method('PUT')
                    
                </form>

                </td>
                </tr>
               
              </tbody>
              @endforeach
              </table>
              <br>
              {{ $courses->links() }}
            
    
        </div>
      </div>
    </div>
</div>
@endsection

