@extends('layouts.admin')
@section('title')
المواد الدراسية
@endsection
 
@section('contentheader')
المواد الدراسية
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.course.index')}}"> المواد الدراسية</a>
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
            <h3 class="card-title " style="float: right;">تعديل المادة الدراسية</h3>

           
          </div>
          <div class="card-body">
            @if(@isset($datas) && !@empty($datas))
            <form action="{{ route('admin.course.edit',$datas->id) }}" method="POST">
            @csrf
            @method('PUT')
           
            <div class="form-group">
                <label for="inputName">معرف المادة</label>
                <input type="id"  name="id" id="id" class="form-control" value="{{$datas->id}}">
                @error('id')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputName">اسم المادة</label>
                <input type="name"  name="name" id="name" class="form-control" value="{{$datas->name}}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>

              <div class="form-group">
                <label for="inputName">معرف الصف الدراسي</label>
                <input type="class_id"  name="class_id" id="class_id" class="form-control" value="{{$datas->class_id}}">
                @error('class_id')
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
                  <a href="{{route('admin.course.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> تعديل المادة الدراسية </button>
                </div>
              </div>
            </form>
          </div>
        <!-- /.card -->
      </div>
    </section>
      @endsection