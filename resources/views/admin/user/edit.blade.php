@extends('layouts.admin')
@section('title')
    المستخدمين
@endsection
 
@section('contentheader')
    المستخدمين
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.user.index')}}"> المستخدمين </a>
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
            <h3 class="card-title " style="float: right;">تعديل مستخدم</h3>

           
          </div>
          <div class="card-body">
            @if(@isset($datas) && !@empty($datas))
            <form action="{{ route('admin.user.edit',$datas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="inputName">اسم المستخدم</label>
              <input name="name" id="name" class="form-control" value="{{$datas->name}}">
              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
                <label for="inputName">البريدالالكتروني</label>
                <input type="name"  name="email" id="" class="form-control" value="{{$datas->email}}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            <div class="form-group">
              <label>نوع المستخدم</label>
              <select name="user_type" id="user_type" class="form-control custom-select" value="{{$datas->user_type}}">
                <option selected disabled>اختر نوع المستخدم</option>
                <option>مسؤول</option>
                <option>مستخدم</option>
              </select>
              @error('user_type')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

            <div class="form-group">
              <label for="inputName">معرف السنة</label>
              <input type="year_id"  name="year_id" id="" class="form-control" value="{{$datas->year_id}}">
              @error('year_id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.user.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> تعديل المستخدم </button>
                </div>
              </div>
            </form>
          </div>
        <!-- /.card -->
      </div>
    </section>
      @endsection