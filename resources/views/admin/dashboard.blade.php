@extends('admin.layouts.app')

@section('style')
<!-- Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<!-- Data Table CSS -->
<link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
<!-- Font Awesome CSS -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
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

</style>

@endsection

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>قائمة الطلبات</h1>
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
            
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Customer name</th>
                    <th>Order notes</th>
                    <th>Order Total cost</th>
                    <th>Order Status</th>
                    <th>Placed at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->user_name}}</td>
                    <td>{{$value->notes}}</td>
                    <td>{{$value->totalcost}}</td>
                    <td>
                      <form action="{{ route('admin.dashboard.update', $value->id) }}" method="post">
                        @csrf

                        <select required name="status">
                            <option {{ $value->status == 0 ? 'selected' : '' }} value="0">Order Placed (Waiting Payment)</option>
                            <option {{ $value->status == 1 ? 'selected' : '' }} value="1">Preparing Order</option>
                            <option {{ $value->status == 2 ? 'selected' : '' }} value="2">Order On Its Way</option>
                            <option {{ $value->status == 3 ? 'selected' : '' }} value="3">Delivered</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </td>
                    <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                    <td>
                      <a href="" class="btn btn-danger">View items</a>   
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
                
              </table>
              <div style="padding:10px; float:right;">
                    {!! $getRecord->links() !!}
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
  $('#dtBasicExample').DataTable({
    "paging": false,
    "info": false,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json" // Arabic language file
    },
    "dir": "rtl", // RTL direction
    
  });
});
</script>
@endsection