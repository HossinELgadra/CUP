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
    تعديل
@endsection

@section('content')
 
 <!-- Main content -->
 <section class="content">
    <div style="display: flex; align-items: center; justify-content: center" class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title " style="float: right;">تعديل الفصول الدراسية </h3>

           
          </div>
          <div class="card-body">
            @if(@isset($datas) && !@empty($datas))
            <form action="{{ route('admin.class_type.edit',$datas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="inputName">اسم الفصل الدراسي</label>
              <input name="name" id="name" class="form-control" value="{{$datas->name}}">
              @error('name')
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
                  <a href="{{route('admin.class_type.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> تعديل السنة الدراسية </button>
                </div>
              </div>
            </form>
          </div>
        <!-- /.card -->
      </div>
    </section>
      @endsection