@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>إضافة منتج جديد</h1>
                </div> 
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  
                  <!-- form start -->
                  <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>العنوان <span style="color:red">*</span></label>
                            <input type="text" class="form-control" required value="{{old('title')}}" name="title" placeholder="العنوان">
                        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">إرسال</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->

            </div>
            </div>
            
        </div><!-- /.container-fluid -->
    </section>
</div>

@endsection

@section('script')
@endsection