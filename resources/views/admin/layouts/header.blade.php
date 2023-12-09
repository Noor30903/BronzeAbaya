<!-- شريط التنقل -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- روابط شريط التنقل اليسرى -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- روابط شريط التنقل اليمنى -->
   
</nav>
  <!-- /.شريط التنقل -->

  <!-- حاوية الشريط الجانبي الرئيسي -->
  <aside class=" main-sidebar sidebar-dark-primary">
          <!-- شعار العلامة التجارية -->
          <div class="brand-link" style="text-align: center;">
            <span class="brand-text">BronzAbaya</span>
          </div>

          <!-- الشريط الجانبي -->
          <div class="sidebar">
            <!-- لوحة المستخدم في الشريط الجانبي (اختياري) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="{{ url('public/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="صورة المستخدم">
                </div>
                <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name}}</a>
                </div>
            </div>

            <!-- قائمة الشريط الجانبي -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item menu-open">
                  <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) =='dashboard') active @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      لوحة التحكم
                    </p>
                  </a>
                </li>

                <li class="nav-item ">
                    <a href="{{url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) =='admin') active @endif ">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                         المسؤول
                        </p>
                    </a>
                  </li>

                <li class="nav-item ">
                  <a href="{{url('admin/category/list')}}" class="nav-link @if(Request::segment(2) =='category') active @endif ">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                      الفئة
                    </p>
                  </a>
                </li>

                <li class="nav-item ">
                  <a href="{{url('admin/sub_category/list')}}" class="nav-link @if(Request::segment(2) =='sub_category') active @endif ">
                    <i class="nav-icon fas fa-list-alt "></i>
                    <p>
                      الفئة الفرعية
                    </p>
                  </a>
                </li>

                <li class="nav-item ">
                  <a href="{{url('admin/product/list')}}" class="nav-link @if(Request::segment(2) =='product') active @endif ">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                      المنتج
                    </p>
                  </a>
                </li>

                <li class="nav-item ">
                  <a href="{{url('admin/color/list')}}" class="nav-link @if(Request::segment(2) =='color') active @endif ">
                    <i class="nav-icon fas fa-list-alt "></i>
                    <p>
                      اللون
                    </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{url('admin/logout')}}" class="nav-link active">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>تسجيل الخروج</p>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
    <!-- /.sidebar -->
  </aside>
