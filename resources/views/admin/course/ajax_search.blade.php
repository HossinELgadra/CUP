@if(@isset($courses) && !@empty($courses))
            <table id="example2" class="table table-bordered table-hover">
             
              <thead>
                <th>معرف المادة</th>
                <th>اسم المادة</th>
                <th>اسم الصف الدراسي</th>
                <th>اسم السنة الدراسية</th>
                <th>تاريخ الانشاء</th>
                <th>تاريخ التعديل</th>
              </thead>
              <tbody>
                @foreach ($courses as $dat)
                <tr>
                  <td>{{$dat->id}}</td>
                  <td>{{$dat->name}}</td>
                  <td>{{$dat->classname}}</td>
                  <td>{{$dat->yearname}}</td>
                  <td>{{$dat->created_at}}</td>
                  <td>{{$dat->updated_at}}</td>
                <td>
                  <a class="btn btn-primary" href="{{ route('admin.course.edit',$dat->id) }}">تعديل</a>
                    <a onclick="return confirm('هل تريد حذف المادة')" class="btn btn-danger" href="{{ route('admin.course.destroy',$dat->id)}}">حذف</a>

                </td>
                </tr>
               
              </tbody>
              @endforeach
              </table>
              <br>
              <div class="col-md-12" id="ajax_pagination_in_search">
                {{ $courses->links() }}
              </div>
            @else
            <div class="alert alert-danger">
                لا توجد بيانات لعرضها
            </div>

            @endif