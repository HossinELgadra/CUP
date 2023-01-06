@extends('layouts.admin')
@section('title')
    الملف الشخصي
@endsection
 
@section('contentheader')
الملف الشخصي
@endsection

@section('contentheaderlink')
    <a href="{{ Route('admin.user.index')}}"> المستخدمين </a>
@endsection

@section('contentheaderactive')
    عرض
@endsection