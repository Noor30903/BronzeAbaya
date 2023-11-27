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
          <h1>إضافة مشرف جديد</h1>
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
                  <label>الاسم</label>
                  <input type="text" class="form-control" required value="{{old('name')}}" name="name" placeholder="أدخل الاسم">
                </div>
                <div class="form-group">
                  <label>البريد الإلكتروني</label>
                  <input type="email" class="form-control" required value="{{old('email')}}" name="email" placeholder="أدخل البريد الإلكتروني">
                  <div style="color:red;">{{ $errors->first('email')}}</div>
                </div>
                <div class="form-group">
                  <label>كلمة المرور</label>
                  <input type="password" class="form-control" required name="password" placeholder="كلمة المرور">
                </div> 
                <div class="form-group">
                  <label>الحالة</label>
                  <select class="form-control" required name="status">
                      <option {{(old('status') ==0)? 'selected':''}} value="0">نشط</option>
                      <option {{(old('status') ==1)? 'selected':''}} value="1">غير نشط</option>
                  </select>
                </div> 
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