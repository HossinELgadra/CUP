@extends('layouts.admin')
@section('title')
  التقييم
@endsection
 
@section('contentheader')
التقييم
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.evaluation.index')}}"> التقييم </a>
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
            <h3 class="card-title " style="float: right;">تعديل التقييم</h3>

           
          </div>
          <div class="card-body">
            @if(@isset($datas) && !@empty($datas))
            <form action="{{ route('admin.evaluation.edit',$datas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="inputName">معرف التقييم</label>
              <input name="id" id="id" class="form-control" value="{{$datas->id}}">
              @error('id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            
              <div class="form-group">
                <label for="inputName">سلوك الطالب</label>
                <input type="student_behavior"  name="student_behavior" id="student_behavior" class="form-control" value="{{$datas->student_behavior}}">
                @error('student_behavior')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="inputName">التقييم الاكاديمي</label>
                <input type="academic_evaluation"  name="academic_evaluation" id="academic_evaluation" class="form-control" value="{{$datas->academic_evaluation}}">
                @error('academic_evaluation')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputName">معرف الطالب</label>
                <input type="student_id"  name="student_id" id="student_id" class="form-control" value="{{$datas->student_id}}">
                @error('student_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputName">معرف المادة</label>
                <input type="course_id"  name="course_id" id="course_id" class="form-control" value="{{$datas->course_id}}">
                @error('course_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="inputName">معرف السنة الدراسية</label>
                <input type="year_id"  name="year_id" id="year_id" class="form-control" value="{{$datas->year_id}}">
                @error('year_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            
            @endif
            <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.evaluation.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> تعديل التقييم </button>
                </div>
              </div>
            </form>
          </div>
        <!-- /.card -->
      </div>
    </section>
      @endsection