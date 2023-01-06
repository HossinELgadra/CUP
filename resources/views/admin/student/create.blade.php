@extends('layouts.admin')
@section('title')
    اضافة طالب جديد
@endsection
 
@section('contentheader')
    الطلبة
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.student.index')}}"> الطلبة</a>
@endsection

@section('contentheaderactive')
    اضافة
@endsection

@section('content')

<section class="content">
    <div class="row"  style="display: flex; align-items: center; justify-content: center">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title" style="float: right;">عام</h3>

            {{-- <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div> --}}
          </div>
          <div class="card-body">
            <form action="{{route('admin.student.store')}}" method="POST" >
            @csrf
            <div class="form-group">
              <label for="inputName">اسم الطالب</label>
              <input name="student_name" id="student_name" class="form-control" value="{{old('student_name')}}">
              @error('student_name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
                <label for="inputName">معرف المستخدم</label>
                <input name="user_id" type="user_id" id="user_id" class="form-control" value="{{old('user_id')}}">
                @error('user_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            
              <div class="form-group">
                <label for="Date">تاريخ الميلاد</label>
                <input name="DOB" type="Date" id="DOB" class="form-control" value="{{old('DOB')}}">
                @error('DOB')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="inputName">هاتف ولي الامر</label>
                <input name="parent_mobile" type="parent_mobile" id="parent_mobile" class="form-control" value="{{old('parent_mobile')}}">
                @error('parent_mobile')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="inputName">عنوان السكن</label>
                <input name="address" type="address" id="address" class="form-control" value="{{old('address')}}">
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="inputName">معرف الصف الدراسي</label>
                <input name="class_id" type="class_id" id="class_id" class="form-control" value="{{old('class_id')}}">
                @error('class_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="inputName">معرف السنة الدراسية</label>
                <input name="year_id" type="year_id" id="year_id" class="form-control" value="{{old('year_id')}}">
                @error('year_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            
            <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.student.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> انشاء طالب جديد </button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
   
  </section>
  @endsection