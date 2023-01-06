@if(@isset($students) && !@empty($students))
<table id="example2" class="table table-bordered table-hover">
 
  <thead>
    <th>معرف الطالب</th>
    <th>اسم الطالب</th>
    <th>اسم ولي الامر</th>
    <th>تاريخ الميلاد</th>
    <th>هاتف ولي الامر</th>
    <th>عنوان السكن</th>
    <th>اسم الصف الدراسي</th>
    <th>اسم السنة الدراسية</th>
    
  </thead>
  <tbody>
    @foreach ($students as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->student_name}}</td>
      <td>{{$data->username}}</td>
      <td>{{$data->DOB}}</td>
      <td>{{$data->parent_mobile}}</td>
      <td>{{$data->address}}</td>
      <td>{{$data->classname}}</td>
      <td>{{$data->yearname}}</td>

    

    <td>
      <a class="btn btn-primary" href="{{ route('admin.student.edit',$data->id) }}">تعديل</a>
      <a onclick="return confirm('هل تريد حذف الطالب')" class="btn btn-danger" href="{{ route('admin.student.destroy',$data->id) }}">حذف</a>
    </td>
    </tr>
   
  </tbody>
  @endforeach
  </table>
  <br>
  <div class="col-md-12" id="ajax_pagination_in_search">
    {{ $students->links() }}
  </div>
@else
<div class="alert alert-danger">
    لا توجد بيانات لعرضها
</div>

@endif