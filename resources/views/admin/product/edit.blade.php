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

             @include('admin.layouts._message')
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
                        <select class="form-control" required id="ChangeCategory" name="category_id">
                          <option value="">select </option>
                          @foreach($getCategory as $category)
                            <option {{ ($product->category_id == $category->id) ? 'selected' : ''}} value="{{ $category->id  }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>SubCategory <span style="color:red;">*</span></label>
                        <select class="form-control" required id="getSubCategory" name="sub_category_id">
                          <option value="">Select </option>
                          @foreach($getSubCategory as $subcategory)
                            <option {{ ($product->sub_category_id == $subcategory->id) ? 'selected' : ''}} value="{{ $subcategory->id  }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Color <span style="color:red">*</span></label> 
                            @foreach($getColor as $color)
                                <div>
                                    <label><input type="checkbox" name="color_id []" value="{{$color->id}}"> {{$color->name}}</label>
                                </div>
                            @endforeach

                            
                          </div>
                      </div>
                    </div>

                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Price($) <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" required value="{{ $product->price }}" name="price" placeholder="Price">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Old Price($) <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" required value="{{ $product->old_price }}" name="old_price" placeholder="Old Price">
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
                              <th>Price</th>
                              <th>Action</th>
                            </tr>

                            </thead>

                            <tbody id="AppendSize">
                              <tr>
                                <td> <input type="text" name="" placeholder="Name" class="form-control"></td>

                                <td> <input type="text" name="" placeholder="Price" class="form-control"></td>

                                <td>
                                  <button type="button" class="btn btn-primary AddSize">Add</button>
                                  
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
                        <textarea name="short_description" class="form-control" placeholder="Short Description">{{ $product->short_description }}</textarea>
                        
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label> Description <span style="color:red;">*</span></label>
                        <textarea name="description" class="form-control editor" placeholder="Description">{{ $product->description }}</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Additional Information<span style="color:red;">*</span></label>
                        <textarea name="additional_information" class="form-control editor" placeholder="Additional Information">{{ $product->additional_information }}</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Shipping and Returns <span style="color:red;">*</span></label>
                        <textarea name="shipping_returns" class="form-control editor" placeholder="Shipping and Returns">{{ $product->shipping_returns }}</textarea>
                      </div>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label >Status <span style="color:red">*</span></label>
                        <select class="form-control" required name="status">
                            <option {{($product->status ==0) ? 'selected':''}} value="0">Active</option>
                            <option {{($product->status ==1) ? 'selected':''}} value="1">Inactive</option>
                        </select>
                    </div> 

                    </div>
                  </div>

                 

                  

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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


<script src="{{ url('public/tinymce/tinymce-jquery.min.js')}}"></script>

<script type="text/javascript">
  
  $('.editor').tinymce({
        height: 500,
        menubar: false,
        plugins: [
           'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
           'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
           'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'
      });

    var i=1000;
    $('body').delegate('.AddSize', 'click', function() {
      
      var html = '<tr id="DeleteSize'+i+'">\n\
                      <td>\n\
                        <input type="text" name="" placeholder="Name" class="form-control">\n\
                      </td>\n\
                      <td>\n\
                        <input type="text" name="" placeholder="Price" class="form-control">\n\
                      </td>\n\
                      <td>\n\
                        <button type="button" id="'+i+'" class="btn btn-danger DeleteSize">Delete</button>\n\
                      </td>\n\
                    </tr>';
        i++;
        $('#AppendSize').append(html);
    });

    $('body').delegate('.DeleteSize', 'click', function() {
      var id = $(this).attr('id');
      $('#DeleteSize'+id).remove();
    });

    $('body').delegate('#ChangeCategory', 'change', function(e) {
      var id = $(this).val();
      $.ajax({
        type : "POST",
        url : "{{ url('admin/get_sub_category') }}",
        data :{
          "id" : id,
          "_token":"{{ csrf_token() }}"
        },
        dataType : "json",
        success: function(data) {
          $('#getSubCategory').html(data.html);
        },
        error: function (data) {
        }
      });
    });
</script>
@endsection