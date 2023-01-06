@extends('layouts.admin')
@section('title')
    اضافة حضور وغياب جديد
@endsection
 
@section('contentheader')
    الحضور والغياب
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.attendence.index')}}">     الحضور والغياب    </a>
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
            <h3 class="card-title" style="float: right;">اضافة الحضور والغياب</h3>

            {{-- <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div> --}}
          </div>
          <div class="card-body">
            <form action="{{route('admin.attendence.store')}}" method="POST">
            @csrf
            
            <div class="form-group">
              <label>الحضور والغياب</label>
              <select name="attendence" id="attendence" class="form-control custom-select" value="{{old('attendence')}}">
                <option selected disabled>اختر نوع الحضور والغياب</option>
                <option>حاضر</option>
                <option>غائب</option>
              </select>
              @error('attendence')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputClientCompany">معرف الطالب</label>
              <input name="student_id" id="student_id" class="form-control" value="{{old('student_id')}}">
              @error('student_id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputClientCompany">معرف الفصل الدراسي</label>
              <input name="class_type_id" id="class_type_id" class="form-control" value="{{old('class_type_id')}}">
              @error('class_type_id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputClientCompany">معرف السنة الدراسية</label>
              <input name="year_id" id="year_id" class="form-control" value="{{old('year_id')}}">
              @error('year_id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.attendence.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> انشاء حضور وغياب جديد </button>
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