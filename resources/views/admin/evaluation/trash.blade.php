@extends('layouts.admin')
@section('title')
    التقييمات المحذوفة
@endsection
 
@section('contentheader')
التقييمات المحذوفة
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.evaluation.index')}}"> التقييم  </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">بيانات التقييمات المحذوفة</h3>
        
          <a href="{{ route('admin.evaluation.index')}}" class="btn btn-sm btn-success">الرجوع</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
          
          </div>
          
         
          <table id="example2" class="table table-bordered table-hover">
           
            <thead>
              <th>معرف التقييم</th>
              <th>اسم الطالب</th>
              <th>اسم المادة</th>
              <th>سلوك الطالب</th>
              <th>التقييم الاكاديمي</th>
              <th> السنة الدراسية</th>
              <th>تاريخ التعديل</th>
            </thead>
            <tbody>
              @foreach ($evaluations as $data)
              <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->studentname}}</td>
                <td>{{$data->coursename}}</td>
                <td>{{$data->student_behavior}}</td>
                <td>{{$data->academic_evaluation}}</td>
                <td>{{$data->yearname}}</td>
                <td>{{$data->updated_at}}</td>

              <td>
             
                <a class="btn btn-primary" href="{{ route('admin.evaluation.restore',$data->id) }}">استعادة</a>
               
              </td>
              </tr>

             
             
            </tbody>
            @endforeach
              </table>
              <br>
              {{ $evaluations->links() }}
          
        
        </div>
      </div>
    </div>
</div>
@endsection


