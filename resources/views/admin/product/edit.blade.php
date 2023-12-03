@extends('admin.layouts.app')
@section('style')

@endsection

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right;">
    <!-- رأس المحتوى (عنوان الصفحة) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>تعديل المنتج</h1>
                </div> 
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- المحتوى الرئيسي -->
    <section class="content">
      
      <div class="container-fluid">
        <div class="row">
          
        <div class="col-md-12">

             @include('admin.layouts._message')
            <!-- عناصر النموذج العامة -->
            <div class="card card-primary">
              
              <!-- بداية النموذج -->
              <form action="" method="post" enctype="multipart/form-data">
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
                        <label>الفئة <span style="color:red;">*</span></label>
                        <select class="form-control" required id="ChangeCategory" name="category_id">
                          <option value="">اختر</option>
                          @foreach($getCategory as $category)
                            <option {{ ($product->category_id == $category->id) ? 'selected' : ''}} value="{{ $category->id  }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>الفئة الفرعية <span style="color:red;">*</span></label>
                        <select class="form-control" required id="getSubCategory" name="sub_category_id">
                          <option value="">اختر</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label>اللون <span style="color:red">*</span></label> 
                            @foreach($getColor as $color)
                            @php
                              $cheacked = '';
                            @endphp
                              @foreach($product->getColor as $pcolor)
                              @if($pcolor->color_id == $color->id)
                              @php
                              $cheacked = 'cheacked';
                            @endphp
                              @endif
                              @endforeach
                                <div>
                                    <label><input {{ $cheacked }}type="checkbox" name="color_id []" value="{{$color->id}}"> {{$color->name}}</label>
                                </div>
                            @endforeach
                      </div>
                    </div>

                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>السعر ($) <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" required value="{{ !empty($product->price) ? $product->price : '' }}" name="price" placeholder="السعر">
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>الحجم<span style="color:red;">*</span></label>
                        <div>
                          <table class="table table-striped">
                            <thead>
                            <tr>
                              <th>الاسم</th>
                              <th>السعر</th>
                              <th>الإجراء</th>
                            </tr>

                            </thead>

                            <tbody id="AppendSize">
                              @php
                                  $i_s = 1;
                              @endphp
                              @foreach($product->getSize as $size)

                                <tr id="DeleteSize{{$i_s}}">
                                  <td> <input type="text" value="{{ $size->name }}" name="size[{{$i_s}}][name]" placeholder="الاسم" class="form-control"></td>

                                  <td> <input type="text" value="{{ $size->price }}" name="size[{{$i_s}}][price]" placeholder="السعر" class="form-control"></td>

                                  <td>
                                  <button type="button" id="{{$i_s}}" class="btn btn-danger DeleteSize">حذف</button>
                                  
                                  </td>
                                </tr>
                             
                              @php
                                  $i_s++;
                              @endphp
                             @endforeach
                             <tr>
                                  <td> <input type="text"  name="size[100][name]" placeholder="الاسم" class="form-control"></td>

                                  <td> <input type="text"  name="size[100][price]" placeholder="السعر" class="form-control"></td>

                                  <td>
                                  <button type="button" class="btn btn-primary AddSize">إضافة</button>
                                  
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
                        <label>الصورة <span style="color:red;"></span></label>
                       <input type="file" name="image[]" class="form-control" style="padding: 5px;" multiple accept="image/*">
 
                      </div>
                    </div>
                  </div>
                  @if(!empty($product->getImage->count()))
                  <div class="row" id="sortable">
                    @foreach($product->getImage as $image)
                    @if(!empty($image->getLogo()))
                    <div class="col-md-1 sortable_image" id="{{ $image->id }}" style="text-align: center;">
                        <img style="width: 100%;height: 100px; src="{{ $image->getLogo() }}">
                        <a oneclick="return confirm('هل أنت متأكد أنك تريد الحذف؟');" href="{{ url('admin/product/image_delete/'.$image->id) }}" style="margin-top: 10px;" class="btn btn-danger btn-sm">حذف</a>

                    </div>
                    @endif 
                    @endforeach 
                    </div>
                  @endif


                  <hr>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>وصف قصير <span style="color:red;">*</span></label>
                        <textarea name="short_description" class="form-control" placeholder="وصف قصير">{{ $product->short_description }}</textarea>
                        
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>الوصف <span style="color:red;">*</span></label>
                        <textarea name="description" class="form-control editor" placeholder="الوصف">{{ $product->description }}</textarea>
                      </div>
                    </div>
                  </div>


                <hr>

                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>الحالة <span style="color:red">*</span></label>
                              <select class="form-control" required name="status">
                                  <option {{($product->status ==0) ? 'selected':''}} value="0">نشط</option>
                                  <option {{($product->status ==1) ? 'selected':''}} value="1">غير نشط</option>
                              </select>
                          </div>
                      </div>
                  </div>

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


<script src="{{ url('public/tinymce/tinymce-jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script type="text/javascript">
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


  $(document).ready(function() {
      $('#sortable' ).sortable({
        update : function(event, ui) {
            var photo_id = new Array();
            $('.sortable_image').each(function() {
              var id = $(this).attr('id');
              photo_id.push(id);
            });

            $.ajax({
                type : "POST",
                url : "{{ url('admin/product_image_sortable') }}",
                data :{
                "photo_id" : photo_id,
                "_token":"{{ csrf_token() }}"
                },
                dataType : "json",
                success: function(data) {
         
                },
                error: function (data) {
                }
            });
        }

      });
  });
  
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
    
</script>
@endsection