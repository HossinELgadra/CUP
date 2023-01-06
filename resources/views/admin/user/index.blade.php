@extends('layouts.admin')
@section('title')
    المستخدمين
@endsection
 
@section('contentheader')
    المستخدمين
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.user.index')}}"> المستخدمين </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">بيانات المستخدمين</h3>
          <input type="hidden" id="token_search" value="{{csrf_token()}}">
          <input type="hidden" id="ajax_search_url" value="{{route('admin.user.ajax_search')}}">
          <a href="{{ route('admin.user.create')}}" class="btn btn-sm btn-success">اضافة مستخدم</a>
          <a href="{{ route('admin.user.trash')}}" class="btn btn-sm btn-danger">المحذوفات</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
            <input type="text" id="search" placeholder="بحث باسم المستخدم" class="form-control"> <br>
          </div>
          <div id="ajax_responce_serarchDiv">
           
            <table id="example2" class="table table-bordered table-hover">
                 
              
                <thead>
                  <th>الرقم التعريفي</th>
                  <th>اسم المستخدم</th>
                  <th>البريد الالكتروني</th>
                  <th>نوع المستخدم</th>
                  <th>اسم السنة الدراسية</th>
                  <th>تاريخ الانشاء</th>
                  <th>تاريخ التعديل</th>
                </thead>
                <tbody>
                  @foreach ($users as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->user_type}}</td>
                  <td>{{$data->yearname}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>{{$data->updated_at}}</td>
                  <td>
               
                        <a class="btn btn-primary" href="{{ route('admin.user.edit',$data->id) }}">تعديل</a>
                    <a onclick="return confirm('هل تريد حذف المستخدم')" class="btn btn-danger" href="{{ route('admin.user.destroy',$data->id)}}">حذف</a>
                  
                   
                </td>
                </tr>
                
                </tbody>
                @endforeach
              </table>
              <br>
              {{ $users->links() }}
            
          </div>  
        </div>
      </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/admin/js/user.js')}}"></script>
@endsection
