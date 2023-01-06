@extends('layouts.admin')
@section('title')
    التقييم
@endsection
 
@section('contentheader')
التقييم
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
          <h3 class="card-title">بيانات التقييم</h3>
          <input type="hidden" id="token_search" value="{{csrf_token()}}">
          <input type="hidden" id="ajax_search_url" value="{{route('admin.evaluation.ajax_search')}}">
          <a href="{{ route('admin.evaluation.create')}}" class="btn btn-sm btn-success">اضافة تقييم جديد</a>
          <a href="{{ route('admin.evaluation.trash')}}" class="btn btn-sm btn-danger">المحذوفات</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
            <input type="text" id="search" placeholder="بحث باسم الطالب" class="form-control"> <br>
          </div>
          <div id="ajax_responce_serarchDiv">
       
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
              
                <a class="btn btn-primary" href="{{ route('admin.evaluation.edit',$data->id) }}">تعديل</a>
                <a onclick="return confirm('هل تريد حذف التقييم')" class="btn btn-danger" href="{{ route('admin.evaluation.destroy',$data->id)}}">حذف</a>

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
</div>
@endsection

@section('script')
<script src="{{ asset('assets/admin/js/evaluation.js')}}"></script>
@endsection
