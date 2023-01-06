@if(@isset($class1s) && !@empty($class1s))
            <table id="example2" class="table table-bordered table-hover">
             
              <thead>
                <th>معرف الصف</th>
                <th>اسم الصف</th>
                <th>اسم السنة الدراسية</th>
                <th>تاريخ الانشاء</th>
                <th>تاريخ التعديل</th>
              </thead>
              <tbody>
                @foreach ($class1s as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->class_name}}</td>
                  <td>{{$data->yearname}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>{{$data->updated_at}}</td>
                <td>
                  <a class="btn btn-primary" href="{{ route('admin.class1.edit',$data->id) }}">تعديل</a>
                  <a onclick="return confirm('هل تريد حذف الصف الدراسي')" class="btn btn-danger" href="{{ route('admin.class1.destroy',$data->id)}}">حذف</a>

                </td>
                </tr>
               
              </tbody>
              @endforeach
              </table>
              <br>
              <div class="col-md-12" id="ajax_pagination_in_search">
                {{ $class1s->links() }}
              </div>
            @else
            <div class="alert alert-danger">
                لا توجد بيانات لعرضها
            </div>

            @endif