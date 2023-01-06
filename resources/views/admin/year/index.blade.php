@extends('layouts.admin')
@section('title')
    السنة الدراسية
@endsection
 
@section('contentheader')
    السنة الدراسية
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.year.index')}}"> السنة الدراسية </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">بيانات السنة الدراسية</h3>
          <input type="hidden" id="token_search" value="{{csrf_token()}}">
          <input type="hidden" id="ajax_search_url" value="{{route('admin.year.ajax_search')}}">
          <a href="{{ route('admin.year.create')}}" class="btn btn-sm btn-success">اضافة سنة دراسية</a>
          <a href="{{ route('admin.year.trash')}}" class="btn btn-sm btn-danger"> المحذوفات</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
            <input type="text" id="search" placeholder="بحث باسم السنة" class="form-control"> <br>
          </div>
          <div id="ajax_responce_serarchDiv">
          @if(@isset($datas) && !@empty($datas))
          <table id="example2" class="table table-bordered table-hover">
           
            <thead>
              <th>معرف السنة</th>
              <th>اسم السنة</th>
              <th>تاريخ الانشاء</th>
              <th>تاريخ التعديل</th>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->created_at}}</td>
              <td>{{$data->updated_at}}</td>

              <td>
                <a class="btn btn-primary" href="{{ route('admin.year.edit',$data->id) }}">تعديل</a>
                  <a onclick="return confirm('هل تريد حذف السنة')" class="btn btn-danger" href="{{ route('admin.year.destroy',$data->id) }}">حذف</a>
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
</div>
@endsection

@section('script')
<script src="{{ asset('assets/admin/js/year.js')}}"></script>
@endsection
