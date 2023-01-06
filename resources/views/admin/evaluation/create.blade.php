@extends('layouts.admin')
@section('title')
   اضافة تقييم جديد
@endsection
 
@section('contentheader')
    التقييم
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.evaluation.index')}}"> التقييم </a>
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
            <form action="{{route('admin.evaluation.store')}}" method="POST" >
            @csrf
            <div class="form-group">
              <label for="inputName">سلوك الطالب</label>
              <input name="student_behavior" id="student_behavior" class="form-control" value="{{old('student_behavior')}}">
              @error('student_behavior')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
                <label for="inputName">التقييم الاكاديمي</label>
                <input name="academic_evaluation" type="academic_evaluation" id="academic_evaluation" class="form-control" value="{{old('academic_evaluation')}}">
                @error('academic_evaluation')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputName">معرف الطالب</label>
                <input name="student_id" type="student_id" id="student_id" class="form-control" value="{{old('student_id')}}">
                @error('student_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputName">معرف المادة</label>
                <input name="course_id" type="course_id" id="course_id" class="form-control" value="{{old('course_id')}}">
                @error('course_id')
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
                  <a href="{{route('admin.evaluation.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> انشاء تقييم جديد </button>
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