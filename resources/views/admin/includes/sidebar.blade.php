<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{Route('dashboard')}}"class="brand-link">
      <img src="{{ asset('assets/admin/dist/img/CupLogo1.png')}}"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
           
      <span class="brand-text font-weight-light">CUP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/admin/dist/img/user2-160x160.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          
          <a style="color: azure" class="d-block"> {{ auth()->user()->name }} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ route('admin.user.index')}}" class="nav-link">
                  <i style='font-size:20px' class='fas'>&#xf508;</i>
                  <p>
                    بيانات المستخدمين
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.year.index')}}" class="nav-link">
                  <i style='font-size:20px' class='fas'>&#xf549;</i>
                  <p>
                    بيانات السنة الدراسية
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.class1.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    بيانات الصفوف الدراسية 
                  </p>
                </a>
              </li>
             
         
          <li class="nav-item">
            <a href="{{ route('admin.class_type.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                بيانات الفصول الدراسية
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.course.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                بيانات المواد الدراسية 
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{ route('admin.student.index')}}" class="nav-link">
              <i style='font-size:20px' class='fas'>&#xf406;</i>
              <p>
                بيانات الطلبة 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.attendence.index')}}" class="nav-link">
              <i style='font-size:20px;margin-right: 3px' class='far'>&#xf133;</i>
              <p>
                 بيانات الحضور والغياب  
              </p>
            </a>
          </li>

         

          <li class="nav-item">
            <a href="{{ route('admin.evaluation.index')}}" class="nav-link">
              <i style='font-size:20px' class='far'>&#xf044;</i>
              <p>
                بيانات تقييم الطلبة 
              </p>
            </a>
          </li>

          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>