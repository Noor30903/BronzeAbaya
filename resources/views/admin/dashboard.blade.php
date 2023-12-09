@extends('admin.layouts.app')

@section('style')


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
              <table class="table table-striped" >
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

@endsection