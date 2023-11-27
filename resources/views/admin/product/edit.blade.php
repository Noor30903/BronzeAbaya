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
                    <h1>تعديل المنتج</h1>
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
                  <form action="" method="post" encrypt>
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>العنوان <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" required value="{{old('title', $product->title)}}" name="title" placeholder="العنوان">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SKU <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" required value="{{old('sku', $product->sku)}}" name="sku" placeholder="SKU">
                                </div>
                            </div>

                            <!-- Additional fields here -->

                        </div>

                        <!-- Other rows and fields here -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">تحديث</button>
                        </div>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Image <span style="color:red;"></span></label>
                       <input type="file" name="image[]" class="form-control" style="padding: 5px;" multiple accept="image/*">
 
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

    var i=100;
    $('body').delegate('.AddSize', 'click', function() {
      
      var html = '<tr id="DeleteSize'+i+'">\n\
                      <td>\n\
                        <input type="text" name="size['+i+'][name]" placeholder="Name" class="form-control">\n\
                      </td>\n\
                      <td>\n\
                        <input type="text" name="size['+i+'][price]" placeholder="Price" class="form-control">\n\
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