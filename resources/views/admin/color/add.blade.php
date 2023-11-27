@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>إضافة لون جديد</h1>
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
                            <label>اسم اللون <span style="color:red">*</span></label>
                            <input type="text" class="form-control" required value="{{old('name')}}" name="name" placeholder="اسم اللون">
                        </div>
                        <div class="form-group">
                            <label>رمز اللون <span style="color:red">*</span></label>
                            <input type="color" class="form-control" required value="{{old('code')}}" name="code" placeholder="رمز اللون">
                        </div>

                        <div class="form-group">
                            <label>الحالة <span style="color:red">*</span></label>
                            <select class="form-control" required name="status">
                                <option {{(old('status') ==0)? 'selected':''}} value="0">نشط</option>
                                <option {{(old('status') ==1)? 'selected':''}} value="1">غير نشط</option>
                            </select>
                        </div> 

                        <hr>

                    </div>
                    <!-- /.card-body -->

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