@extends('layouts.admin')
@section('title')
    السنة الدراسية
@endsection
 
@section('contentheader')
السنة الدراسية
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.user.index')}}"> السنة الدراسية </a>
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
            <form action="{{ route('admin.year.edit',$datas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="inputName">اسم السنة الدراسية</label>
              <input name="name" id="name" class="form-control" value="{{$datas->name}}">
              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
           
             

             
            
            @endif
            <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.year.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> تعديل السنة الدراسية </button>
                </div>
              </div>
            </form>
          </div>
        <!-- /.card -->
      </div>
    </section>
      @endsection