@if(@isset($datas) && !@empty($datas))
          <table id="example2" class="table table-bordered table-hover">
           
            <thead>
              <th>معرف السنة</th>
              <th>اسم السنة</th>
              <th>تاريخ الانشاء</th>
              <th>تاريخ التعديل</th>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
              <td>{{$data->id}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->created_at}}</td>
              <td>{{$data->updated_at}}</td>

              <td>
                <a class="btn btn-primary" href="{{ route('admin.year.edit',$data->id) }}">تعديل</a>
                <a onclick="return confirm('هل تريد حذف السنة')" class="btn btn-danger" href="{{ route('admin.year.destroy',$data->id) }}">حذف</a>
              </td>
              </tr>

             
             
            </tbody>
            @endforeach
              </table>
              <br>
              <div class="col-md-12" id="ajax_pagination_in_search">
                {{ $datas->links() }}
              </div>
            @else
            <div class="alert alert-danger">
                لا توجد بيانات لعرضها
            </div>

            @endif