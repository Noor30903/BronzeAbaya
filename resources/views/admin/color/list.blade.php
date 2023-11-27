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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>قائمة الألوان</h1>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <a href="{{url('admin/color/add')}}" class="btn btn-primary">إضافة لون جديد</a>
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
                    <h3 class="card-title">قائمة الألوان</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>الاسم</th>
                          <th>الرمز</th>
                          <th>أنشأ بواسطة</th>
                          <th>الحالة</th>
                          <th>تاريخ الإنشاء</th>
                          <th>الإجراء</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($getRecord as $value)
                        <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->code}}</td>
                          <td>{{$value->created_by_name}}</td>
                          <td>{{ ($value->status ==0)? 'نشط':'غير نشط' }}</td>
                          <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                          <td>
                          <a href="{{url('admin/color/edit/'.$value->id)}}" class="btn btn-primary">تعديل</a>
                          <a href="{{url('admin/color/delete/'.$value->id)}}" class="btn btn-danger">حذف</a>
                          
                          </td>
                          
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                    
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