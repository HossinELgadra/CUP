@if(@isset($class_types) && !@empty($class_types))
            <table id="example2" class="table table-bordered table-hover">
             
              <thead>
                <th>معرف الفصل</th>
                <th>اسم الفصل</th>
                <th>اسم الصف الدراسي</th>
                <th>اسم السنة الدراسية</th>
                <th>تاريخ الانشاء</th>
                <th>تاريخ التعديل</th>
              </thead>
              <tbody>
                @foreach ($class_types as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->classname}}</td>
                  <td>{{$data->yearname}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>{{$data->updated_at}}</td>

                <td>
                  <a class="btn btn-primary" href="{{ route('admin.class_type.edit',$data->id) }}">تعديل</a>
                   
                    
                      <a onclick="return confirm('هل تريد حذف الفصل الدراسي')" class="btn btn-danger" href="{{ route('admin.class_type.destroy',$data->id) }}">حذف</a>
                </td>
                </tr>
               
              </tbody>
              @endforeach
              </table>
              <br>
              <div class="col-md-12" id="ajax_pagination_in_search">
                {{ $class_types->links() }}
              </div>
            @else
            <div class="alert alert-danger">
                لا توجد بيانات لعرضها
            </div>

            @endif