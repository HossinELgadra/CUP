@extends('layouts.admin')
@section('title')
   الطلبة
@endsection
 
@section('contentheader')
الطلبة
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.student.index')}}"> الطلبة </a>
@endsection

@section('contentheaderactive')
    تعديل
@endsection

@section('content')
 
 <!-- Main content -->
 <section class="content">
    <div style="display: flex; align-items: center; justify-content: center" class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title " style="float: right;">تعديل طالب </h3>

           
          </div>
          <div class="card-body">
            @if(@isset($datas) && !@empty($datas))
            <form action="{{ route('admin.student.edit',$datas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="inputName">معرف الطالب</label>
              <input name="id" id="id" class="form-control" value="{{$datas->id}}">
              @error('id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputName">اسم الطالب</label>
              <input name="student_name" id="student_name" class="form-control" value="{{$datas->student_name}}">
              @error('student_name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputName">معرف المستخدم</label>
              <input name="user_id" type="user_id" id="user_id" class="form-control" value="{{$datas->user_id}}">
              @error('user_id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="Date">تاريخ الميلاد</label>
              <input name="DOB" type="Date" id="DOB" class="form-control" value="{{$datas->DOB}}">
              @error('DOB')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
              
            <div class="form-group">
              <label for="inputName">هاتف ولي الامر</label>
              <input name="parent_mobile" type="parent_mobile" id="parent_mobile" class="form-control" value="{{$datas->parent_mobile}}">
              @error('parent_mobile')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="inputName">عنوان السكن</label>
              <input name="address" type="address" id="address" class="form-control" value="{{$datas->address}}">
              @error('address')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputName">معرف الصف الدراسي</label>
              <input name="class_id" type="class_id" id="class_id" class="form-control" value="{{$datas->class_id}}">
              @error('class_id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="inputName">معرف السنة الدراسية</label>
              <input name="year_id" type="year_id" id="year_id" class="form-control" value="{{$datas->year_id}}">
              @error('year_id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            @endif
            <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.student.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> تعديل الطالب </button>
                </div>
              </div>
            </form>
          </div>
        <!-- /.card -->
      </div>
    </section>
      @endsection