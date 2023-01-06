@extends('layouts.admin')
@section('title')
    الفصول الدراسية
@endsection
 
@section('contentheader')
الفصول الدراسية
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
          <h3 class="card-title">بيانات الفصول الدراسية</h3>
          <input type="hidden" id="token_search" value="{{csrf_token()}}">
          <input type="hidden" id="ajax_search_url" value="{{route('admin.class_type.ajax_search')}}">
          <a href="{{ route('admin.class_type.create')}}" class="btn btn-sm btn-success">اضافة فصل جديد </a>
          <a href="{{ route('admin.class_type.trash')}}" class="btn btn-sm btn-danger">المحذوفات</a>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="col-md-4">
            <input type="text" id="search" placeholder="بحث باسم الفصل" class="form-control"> <br>
          </div>
          <div id="ajax_responce_serarchDiv">
          
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
                @foreach ($class_types as $data)
                <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->classname}}</td>
                <td>{{$data->yearname}}</td>
                <td>{{$data->created_at}}</td>
                <td>{{$data->updated_at}}</td>

                <td>
               
                    <a class="btn btn-primary" href="{{ route('admin.class_type.edit',$data->id) }}">تعديل</a>
                   
                    
                      <a onclick="return confirm('هل تريد حذف الفصل الدراسي')" class="btn btn-danger" href="{{ route('admin.class_type.destroy',$data->id) }}">حذف</a>
                     
                      
                  
                </form>
                </td>
                </tr>
               
              </tbody>
              @endforeach
              </table>
              <br>
              {{ $class_types->links() }}
          </div>
        </div>
      </div>
    </div>
</div>
@endsection


@section('script')
<script src="{{ asset('assets/admin/js/class_type.js')}}"></script>
@endsection