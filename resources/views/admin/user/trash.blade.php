@extends('layouts.admin')
@section('title')
    المستخدمين
@endsection
 
@section('contentheader')
    المستخدمين المحذوفين
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
          <h3 class="card-title">بيانات المستخدمين المحذوفين</h3>
         
          <a href="{{ route('admin.user.index')}}" class="btn btn-sm btn-success">الرجوع</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
           
          </div>
          
           
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
                    <form  method="POST">
                        <a class="btn btn-primary" href="{{ route('admin.user.restore',$data->id) }}">استرجاع</a>
                        @csrf
                        @method('PUT')
                        
                    </form>
                 
                  
                   
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
@endsection

