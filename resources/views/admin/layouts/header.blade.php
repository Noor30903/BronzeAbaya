  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link" style = "text-align: center;">
      <span class="brand-text">BronzAbaya</span>
</div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ url('public/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2">
          </div>
          <div class="info">
            <a class="d-block">{{ Auth::user()->name}}</a>
          </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) =='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) =='admin') active @endif ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('admin/category/list')}}" class="nav-link @if(Request::segment(2) =='category') active @endif ">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('admin/sub_category/list')}}" class="nav-link @if(Request::segment(2) =='sub_category') active @endif ">
              <i class="nav-icon fas fa-list-alt "></i>
              <p>
                Sub Category
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="{{url('admin/product/list')}}" class="nav-link @if(Request::segment(2) =='product') active @endif ">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                product
              </p>
            </a>
          </li>

          <li class="nav-item">
                <a href="{{url('admin/logout')}}" class="nav-link active">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>