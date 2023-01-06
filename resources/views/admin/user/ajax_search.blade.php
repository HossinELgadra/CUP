@if(@isset($users) && !@empty($users))
<table id="example2" class="table table-bordered table-hover">
     
  
    <thead>
      <th>الرقم التعريفي</th>
      <th>اسم المستخدم</th>
      <th>البريد الالكتروني</th>
      <th>نوع المستخدم</th>
      <th>اسم السنة الدراسية</th>
      <th>تاريخ الانشاء</th>
      <th>تاريخ التعديل</th>
    </thead>
    <tbody>
      @foreach ($users as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->user_type}}</td>
      <td>{{$data->yearname}}</td>
      <td>{{$data->created_at}}</td>
      <td>{{$data->updated_at}}</td>
      <td>
       
        <a class="btn btn-primary" href="{{ route('admin.user.edit',$data->id) }}">تعديل</a>
        <a onclick="return confirm('هل تريد حذف المستخدم')" class="btn btn-danger" href="{{ route('admin.user.destroy',$data->id)}}">حذف</a>
       
    </td>
    </tr>
    
    </tbody>
    @endforeach
  </table>
  <br>
  <div class="col-md-12" id="ajax_pagination_in_search">
    {{ $users->links() }}
  </div>

@else
<div class="alert alert-danger">
    لا توجد بيانات لعرضها
</div>


@endif