@extends('layouts.admin')
@section('title')
    الرئيسية
@endsection
 
@section('contentheader')
    الرئيسية
@endsection

@section('contentheaderlink')
    <a href="{{ Route('dashboard')}}"> الرئيسية </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6" >
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner" >
          
              <h3>{{$students->count('id')}}</h3>
            
              <p>عدد الطلاب</p>
            </div>
            
            <a href="{{ Route('admin.student.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$users->count('id')}}</h3>

              <p>عدد المستخدمين</p>
            </div>
           
            <a href="{{ Route('admin.user.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>1</h3>

              <p>المسؤولين</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ Route('admin.user.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$class1s->count('id')}}</h3>

              <p>عدد الصفوف الدراسية</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('admin.class1.index')}}" class="small-box-footer">المزيد <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>
@endsection

