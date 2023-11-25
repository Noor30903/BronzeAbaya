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
            <h1>Edit Product</h1>
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
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Title <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" required value="{{old('title', $product->title)}}" name="title" placeholder="Title">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>SKU <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" required value="{{old('sku', $product->sku)}}" name="sku" placeholder="SKU">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Category <span style="color:red;">*</span></label>
                        <select class="form-control" name="category_id">
                          <option value="">select </option>
                          @foreach($getCategory as $value)
                            <option value="{{ $value->id  }}">{{ $value->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>SubCategory <span style="color:red;">*</span></label>
                        <select class="form-control" name="sub_category_id">
                          <option value="">select </option>
                          @foreach($getCategory as $value)
                            <option value="{{ $value->id  }}">{{ $value->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Price($) <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" required value="{{old('price', $product->price)}}" name="price" placeholder="Price">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Old Price($) <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" required value="{{old('old_price', $product->old_price)}}" name="old_price" placeholder="Old Price">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Size<span style="color:red;">*</span></label>
                        <div>
                          <table class="table table-striped">
                            <thead>
                            <tr>
                              <th>Name</th>
                              <th>Name</th>
                              <th>Name</th>
                            </tr>

                            </thead>

                            <tbody>
                              <tr>
                                <td> <input type="text" name="" class="form-control"></td>

                                <td> <input type="text" name="" class="form-control"></td>

                                <td>
                                  <button type="button" class="btn btn-primary">Add
                                  </button>
                                  <button type="button" class="btn btn-danger">Delete
                                  </button>
                                </td>
                              </tr>

                              <tr>
                                <td> <input type="text" name="" class="form-control"></td>

                                <td> <input type="text" name="" class="form-control"></td>

                                <td>
                                  
                                  <button type="button" class="btn btn-danger">Delete
                                  </button>
                                </td>
                              </tr>

                              <tr>
                                <td> <input type="text" name="" class="form-control"></td>

                                <td> <input type="text" name="" class="form-control"></td>

                                <td>
                                  
                                  <button type="button" class="btn btn-danger">Delete
                                  </button>
                                </td>
                              </tr>

                            </tbody>
                            
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Short description <span style="color:red;">*</span></label>
                        <textarea name="short_description" class="form-control" placeholder="Short Description"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label> Description <span style="color:red;">*</span></label>
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Additional Information<span style="color:red;">*</span></label>
                        <textarea name="additional_information" class="form-control" placeholder="Additional Information"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Shipping and Returns <span style="color:red;">*</span></label>
                        <textarea name="shipping_returns" class="form-control" placeholder="Shipping and Returns"></textarea>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Status <span style="color:red">*</span></label>
                        <select class="form-control" required name="status">
                            <option {{(old('status') ==0)? 'selected':''}} value="0">Active</option>
                            <option {{(old('status') ==1)? 'selected':''}} value="1">Inactive</option>
                        </select>
                    </div> 

                    </div>
                  </div>

                 

                  

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