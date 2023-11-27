<!-- شريط التنقل -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- روابط شريط التنقل اليسرى -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- روابط شريط التنقل اليمنى -->
    <ul class="navbar-nav ml-auto">
      

      <!-- قائمة الإشعارات -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 إشعارات</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 رسائل جديدة
            <span class="float-right text-muted text-sm">3 دقائق</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 طلبات صداقة
            <span class="float-right text-muted text-sm">12 ساعات</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 تقارير جديدة
            <span class="float-right text-muted text-sm">يومان</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">مشاهدة كل الإشعارات</a>
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

<!-- الشريط الجانبي الرئيسي -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- شعار العلامة التجارية -->
    <div class="brand-link" style="text-align: center;">
      <span class="brand-text">برونز عباية</span>
    </div>

    <!-- الشريط الجانبي -->
    <div class="sidebar">
      <!-- لوحة المستخدم الجانبية (اختيارية) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ url('public/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2">
          </div>
          <div class="info">
            <a class="d-block">{{ Auth::user()->name}}</a>
          </div>
      </div>

      <!-- قائمة الشريط الجانبي -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- أضف أيقونات للروابط باستخدام الكلاس .nav-icon
               مع مكتبة الأيقونات فونت أوسوم أو أي مكتبة أيقونات أخرى -->
          <li class="nav-item menu-open">
            <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) =='dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                لوحة التحكم
              </p>
            </a>
          </li>

          <!-- المزيد من العناصر هنا -->

        </ul>
      </
