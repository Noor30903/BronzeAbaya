@extends('admin.layouts.app')

@section('style')

<style>
  /* Additional RTL styling if needed */
  
  .dataTables_wrapper {
    direction: rtl;
  }
  
  table.dataTable {
    width: 100% !important;
  }
  
  table.dataTable thead th, table.dataTable tbody td {
    text-align: right; /* Adjust text alignment for Arabic */
  }
  
  .dataTables_wrapper .dataTables_paginate .paginate_button {
    float: right; /* Adjust float to right for pagination */
  }
</style>
@endsection

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>قائمة الفئات الفرعية</h1>
        </div>
        <div class="col-sm-6" style="text-align:left;">
          <a href="{{url('admin/sub_category/add')}}" class="btn btn-primary">إضافة فئة فرعية جديدة</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-md-12">

        @include('admin.layouts._message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">قائمة الفئات الفرعية</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped" id="datatablesSimple">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>اسم الفئة</th>
                    <th>اسم الفئة الفرعية</th>
                    <th>المعرف</th>
                    <th>عنوان الميتا</th>
                    <th>وصف الميتا</th>
                    <th>كلمات الميتا الدلالية</th>
                    <th>أنشئ بواسطة</th>
                    <th>الحالة</th>
                    <th>تاريخ الإنشاء</th>
                    <th>الإجراءات</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->category_name}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->slug}}</td>
                    <td>{{$value->meta_title}}</td>
                    <td>{{$value->meta_description}}</td>
                    <td>{{$value->meta_keywords}}</td>
                    <td>{{$value->created_by_name}}</td>
                    <td>{{ ($value->status == 0) ? 'نشط' : 'غير نشط' }}</td>
                    <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                    <td>
                    <a href="{{url('admin/sub_category/edit/'.$value->id)}}" class="btn btn-primary">تعديل</a>
                    <a href="{{url('admin/sub_category/delete/'.$value->id)}}" class="btn btn-danger">حذف</a>
                    
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <div style="padding:10px; float:right;">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      
    </div><!-- /.container-fluid -->
  </section>
</div>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    // Initialize DataTables with RTL support
    $('.table').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json" // Arabic language file
      },
      "dir": "rtl" // RTL direction
    });
  });
</script>
@endsection