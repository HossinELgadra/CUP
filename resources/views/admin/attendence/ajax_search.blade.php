@if(@isset($attendences) && !@empty($attendences))
            <table id="example2" class="table table-bordered table-hover">
                 
              
                <thead>
                  <th>الرقم التعريفي</th>
                  <th>اسم الطالب</th>
                  <th> الفصل الدراسي</th>
                  <th>نوع الحضور والغياب</th>
                 
                  <th> السنة الدراسية</th>
                  <th>تاريخ الانشاء</th>
                  
                </thead>
                <tbody>
                  @foreach ($attendences as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->studentname}}</td>
                  <td>{{$data->classtname}}</td>
                  <td>{{$data->attendence}}</td>
                  
                  <td>{{$data->yearname}}</td>
                  <td>{{$data->created_at}}</td>
                 
                  <td>
                   
                    <a class="btn btn-primary" href="{{ route('admin.attendence.edit',$data->id) }}">تعديل</a>
                    <a onclick="return confirm('هل تريد حذف الحضور والغياب')" class="btn btn-danger" href="{{ route('admin.attendence.destroy',$data->id) }}">حذف</a>
                </td>
                </tr>
                
                </tbody>
                @endforeach
              </table>
              <br>
              <div class="col-md-12" id="ajax_pagination_in_search">
                {{ $attendences->links() }}
              </div>
              @else
              <div class="alert alert-danger">
                  لا توجد بيانات لعرضها
              </div>
  
              @endif