@extends('layouts.admin')
@section('title')
تعديل الحضور والغياب 
@endsection
 
@section('contentheader')
الحضور والغياب
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.user.index')}}"> الحضور والغياب </a>
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
            <h3 class="card-title " style="float: right;">تعديل الحضور والغياب</h3>

           
          </div>
          <div class="card-body">
            @if(@isset($datas) && !@empty($datas))
            <form action="{{ route('admin.attendence.edit',$datas->id) }}" method="POST">
            @csrf
            @method('PUT')
           
            
            <div class="form-group">
              <label>نوع الحضور والغياب</label>
              <select name="attendence" id="attendence" class="form-control custom-select" value="{{$datas->attendence}}">
                <option selected disabled>اختر نوع الحضور والغياب</option>
                <option>حاضر</option>
                <option>غائب</option>
              </select>
              @error('attendence')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputName">معرف الطالب</label>
              <input name="student_id" type="student_id" id="student_id" class="form-control" value="{{$datas->student_id}}">
              @error('student_id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputName">معرف الفصل الدراسي</label>
              <input name="class_type_id" type="class_type_id" id="class_type_id" class="form-control" value="{{$datas->class_type_id}}">
              @error('class_type_id')
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
                  <a href="{{route('admin.attendence.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> تعديل الحضور والغياب </button>
                </div>
              </div>
            </form>
          </div>
        <!-- /.card -->
      </div>
    </section>
      @endsection