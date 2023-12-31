@extends('admin.layouts.app')
@section('style')
<style>
.product-media img {
    max-width: 200px;
    height: auto;
}
</style>
@endsection

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>تفاصيل الطلب</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  @include('admin.layouts._message')
  <section class="content">
  <div class="page-content">
    <div class="cart">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <table class="table table-cart table-mobile">
              <thead>
                <tr>
                  <th>المنتج</th>
                  <th>المقاس</th>
                  <th>السعر</th>
                  <th>الكمية</th>
                  <th>المجموع</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $productTotal = 0;
                @endphp
                @foreach($getRecord as $value)
                <tr>
                  <td class="product-col">
                    <div class="product">
                      <figure class="product-media">
                        
                          <img src="{{$value->productImage }}" alt="صورة المنتج" width="100" height="100">
                        
                      </figure>
                      <h5 class="product-title">
                        {{$value->product_title}}
                      </h5><!-- نهاية .product-title -->
                    </div><!-- نهاية .product -->
                  </td>
                  <td class="price-col">{{ $value->product_size }} </td>
                  <td class="price-col">{{ $value->product_price }} ريال سعودي</td>
                  <td class="price-col">{{$value->product_quantity}}</td>
                  <td class="total-col" data-item-total="{{ $value->id }}">{{ $productTotal = $value->product_price * $value->product_quantity  }} ريال سعودي</td>
                </tr>
                @endforeach
              </tbody>
            </table><!-- نهاية .table table-wishlist -->
          </div>
        </div><!-- نهاية .row -->
      </div><!-- نهاية .container -->
    </div><!-- نهاية .cart -->
  </div><!-- نهاية .page-content -->
</section>

</div>

@endsection
@section('script')

@endsection