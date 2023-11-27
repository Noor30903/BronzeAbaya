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
          <h1>تعديل الفئة</h1>
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
                  <label>اسم الفئة <span style="color:red">*</span></label>
                  <select class="form-control" name="category_id">
                      <option value="">اختر</option>
                      @foreach($getCategory as $value)
                          <option {{($value->id == $getRecord->category_id) ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->name }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>اسم الفئة الفرعية <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('name', $getRecord->name)}}" name="name" placeholder="اسم الفئة الفرعية">
                </div>

                <div class="form-group">
                  <label>المعرف <span style="color:red">*</span></label>
                  <input type="text" class="form-control" required value="{{old('slug', $getRecord->slug)}}" name="slug" placeholder="مثال: الرابط">
                  <div style="color:red;">{{ $errors->first('slug')}}</div>
                </div>

                <div class="form-group">
                  <label>الحالة <span style="color:red">*</span></label>
                  <select class="form-control" required name="status">
                      <option {{(old('status', $getRecord->status) == 0) ? 'selected' : ''}} value="0">نشط</option>
                      <option {{(old('status', $getRecord->status) == 1) ? 'selected' : ''}} value="1">غير نشط</option>
                  </select>
                </div> 

                <hr>

                <div class="form-group">
                  <label>عنوان الميتا <span style="color:red">*</span></label> 
                  <input type="text" class="form-control" required value="{{old('meta_title', $getRecord->meta_title)}}" name="meta_title" placeholder="عنوان الميتا">
                </div>
                <div class="form-group">
                  <label>وصف الميتا</label>
                  <textarea class="form-control" placeholder="وصف الميتا" name="meta_description">{{ old('meta_description', $getRecord->meta_description) }}</textarea> 
                </div>
                <div class="form-group">
                  <label>كلمات الميتا الدلالية</label>
                  <input type="text" class="form-control" required value="{{old('meta_keywords', $getRecord->meta_keywords)}}" name="meta_keywords" placeholder="كلمات الميتا الدلالية">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">تحديث</button>
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