@extends('layouts.admin')
@section('title')
الصفوف الدراسية
@endsection
 
@section('contentheader')
الصفوف الدراسية
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.class1.index')}}"> الصفوف الدراسية</a>
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
            <h3 class="card-title " style="float: right;">تعديل السنة الدراسية</h3>

           
          </div>
          <div class="card-body">
            @if(@isset($datas) && !@empty($datas))
            <form action="{{ route('admin.class1.edit',$datas->id) }}" method="POST">
            @csrf
            @method('PUT')
           
            <div class="form-group">
                <label for="inputName">اسم الصف</label>
                <input type="class_name"  name="class_name" id="class_name" class="form-control" value="{{$datas->class_name}}">
                @error('class_name')
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
                  <a href="{{route('admin.class1.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> تعديل الصفوف الدراسية </button>
                </div>
              </div>
            </form>
          </div>
        <!-- /.card -->
      </div>
    </section>
      @endsection