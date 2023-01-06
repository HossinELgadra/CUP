@extends('layouts.admin')
@section('title')
    اضافة صف دراسي جديد
@endsection
 
@section('contentheader')
    الصفوف الدراسية
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.class1.index')}}"> الصفوف الدراسية </a>
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
            <form action="{{route('admin.class1.store')}}" method="POST" >
            @csrf
            <div class="form-group">
              <label for="inputName">اسم الصف الدراسي</label>
              <input name="class_name" id="class_name" class="form-control" value="{{old('class_name')}}">
              @error('class_name')
               <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputName">معرف السنة الدراسية</label>
              <input name="year_id" id="year_id" class="form-control" value="{{old('year_id')}}">
              @error('year_id')
               <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.class1.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> انشاء مستخدم جديد </button>
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