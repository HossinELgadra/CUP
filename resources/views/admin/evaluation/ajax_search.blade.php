@if(@isset($evaluations) && !@empty($evaluations))
<table id="example2" class="table table-bordered table-hover">
 
  <thead>
    <th>معرف التقييم</th>
              <th>اسم الطالب</th>
              <th>اسم المادة</th>
              <th>سلوك الطالب</th>
              <th>التقييم الاكاديمي</th>
              <th> السنة الدراسية</th>
              <th>تاريخ التعديل</th>
  </thead>
  <tbody>
    @foreach ($evaluations as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->studentname}}</td>
      <td>{{$data->coursename}}</td>
      <td>{{$data->student_behavior}}</td>
      <td>{{$data->academic_evaluation}}</td>
      <td>{{$data->yearname}}</td>
      <td>{{$data->updated_at}}</td>

    <td>
      <a class="btn btn-primary" href="{{ route('admin.evaluation.edit',$data->id) }}">تعديل</a>
      <a onclick="return confirm('هل تريد حذف التقييم')" class="btn btn-danger" href="{{ route('admin.evaluation.destroy',$data->id)}}">حذف</a>
    </td>
    </tr>

   
   
  </tbody>
  @endforeach
    </table>
    <br>
    <div class="col-md-12" id="ajax_pagination_in_search">
        {{ $evaluations->links() }}
      </div>
  @else
  <div class="alert alert-danger">
      لا توجد بيانات لعرضها
  </div>

  @endif