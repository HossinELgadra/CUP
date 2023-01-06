@extends('layouts.admin')
@section('title')
    اضافة مستخدم جديد
@endsection
 
@section('contentheader')
    المستخدمين
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.user.index')}}"> المستخدمين </a>
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
            <h3 class="card-title" style="float: right;">اضافة مستخدم</h3>

            {{-- <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div> --}}
          </div>
          <div class="card-body">
            <form action="{{route('admin.user.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="inputName">اسم المستخدم</label>
              <input name="name" id="name" class="form-control" value="{{old('name')}}">
              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
                <label for="inputName">البريدالالكتروني</label>
                <input type="name"  name="email" id="" class="form-control" value="{{old('email')}}">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            <div class="form-group">
              <label>نوع المستخدم</label>
              <select name="user_type" id="user_type" class="form-control custom-select" value="{{old('user_type')}}">
                <option selected disabled>اختر نوع المستخدم</option>
                <option>مسؤول</option>
                <option>مستخدم</option>
              </select>
              @error('user_type')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputClientCompany">الرمز السري</label>
              <input name="password" id="password" class="form-control" value="{{old('password')}}">
              @error('password')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="inputClientCompany">معرف السنة</label>
              <input name="year_id" id="year_id" class="form-control" value="{{old('year_id')}}">
              @error('year_id')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.user.index')}}" class="btn btn-secondary">الغاء</a>
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