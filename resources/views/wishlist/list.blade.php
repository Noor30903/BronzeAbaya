@extends('layouts.app')


@section('content')
<main class="main" dir="rtl" style="text-align: right;">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">قائمة الأمنيات<span>المتجر</span></h1>
        </div><!-- نهاية .container -->
    </div><!-- نهاية .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}">المتجر</a></li>
                <li class="breadcrumb-item active" aria-current="page">قائمة الأمنيات</li>
            </ol>
        </div><!-- نهاية .container -->
    </nav><!-- نهاية .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>المنتج</th>
                        <th>السعر</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($getRecord as $value)
                        <tr>
                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{$value->productImage }}" alt="صورة المنتج">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="#">{{$value->product_title}}</a>
                                    </h3><!-- نهاية .product-title -->
                                </div><!-- نهاية .product -->
                            </td>
                            <td class="price-col">{{ $value->product_price }} ريال سعودي</td>

                            <td class="remove-col"><a href="{{url('wishlist/delete/'.$value->id)}}" class="btn-remove"><i class="icon-close"></i></a></td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table><!-- نهاية .table table-wishlist -->
            
        </div><!-- نهاية .container -->
    </div><!-- نهاية .page-content -->
</main><!-- نهاية .main -->


@endsection