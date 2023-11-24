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
            <h1>Add New Sub Category</h1>
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
                    <label> Category Name <span style="color:red">*</span></label>
                    <select class="form-control" name="category_id">
                        <option value="">select </option>
                        @foreach($getCategory as $value)
                            <option value="{{ $value->id  }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label> Sub Category Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control" required value="{{old('name')}}" name="name" placeholder="Sub Category Name">
                  </div>

                  <div class="form-group">
                    <label>Slug <span style="color:red">*</span></label>
                    <input type="text" class="form-control" required value="{{old('slug')}}" name="slug" placeholder="Slug Ex. URL">
                    <div style="color:red;">{{ $errors->first('slug')}}</div>
                  </div>


                  <div class="form-group">
                    <label >Status <span style="color:red">*</span></label>
                    <select class="form-control" required name="status">
                        <option {{(old('status') ==0)? 'selected':''}} value="0">Active</option>
                        <option {{(old('status') ==1)? 'selected':''}} value="1">Inactive</option>
                    </select>
                  </div> 

                  <hr>


                  <div class="form-group">
                    <label>meta title <span style="color:red">*</span></label> 
                    <input type="text" class="form-control" required value="{{old('meta_title')}}" name="meta_title" placeholder="meta title">
                  </div>
                  <div class="form-group">
                    <label>meta description</label>
                    <textarea class="form-control" placeholder="meta description" name="meta_description">{{ old('meta_description') }}</textarea> 
                  </div>
                  <div class="form-group">
                    <label>meta keywords</label>
                    <input type="text" class="form-control" required value="{{old('meta_keywords')}}" name="meta_keywords" placeholder="meta keywords">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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