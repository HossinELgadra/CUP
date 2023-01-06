@extends('layouts.admin')
@section('title')
    اضافة سنة جديدة
@endsection
 
@section('contentheader')
    السنة الدراسية
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.year.index')}}"> السنة </a>
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
            <form action="{{route('admin.year.store')}}" method="POST" >
            @csrf
            <div class="form-group">
              <label for="inputName">اسم السنة</label>
              <input name="name" id="name" class="form-control" value="{{old('name')}}">
              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            
              
              
           
            <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.year.index')}}" class="btn btn-secondary">الغاء</a>
                  <button type="submit" class="btn btn-success float-right"> انشاء سنة جديد </button>
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