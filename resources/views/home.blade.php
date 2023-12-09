@extends('layouts.app')
@section('content')
        <main class="main">
        <div class="intro-section bg-lighter pt-5 pb-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                    <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "responsive": {
                                "768": {
                                    "nav": true
                                }
                            }
                        }'>
                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)" srcset="{{ url ( 'img/IMG1.jpg' ) }}">
                                    <img src="{{ url ( 'img/IMG1.jpg' ) }}" alt="وصف الصورة">
                                </picture>
                            </figure><!-- نهاية .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">مجموعة التخفيضات</h3><!-- نهاية .intro-subtitle -->
                                <h1 class="intro-title">أثاث<br>غرفة المعيشة</h1><!-- نهاية .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>تسوق الآن</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- نهاية .intro-content -->
                        </div><!-- نهاية .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)" srcset="{{ url ( 'img/IMG2.jpg' ) }}">
                                    <img src="{{ url ( 'img/IMG2.jpg' ) }}" alt="وصف الصورة">
                                </picture>
                            </figure><!-- نهاية .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">الأخبار والإلهام</h3><!-- نهاية .intro-subtitle -->
                                <h1 class="intro-title">الوافدون الجدد</h1><!-- نهاية .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>تسوق الآن</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- نهاية .intro-content -->
                        </div><!-- نهاية .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 480px)" srcset="{{ url ( 'img/IMG6.jpg' ) }}">
                                    <img src="{{ url ( 'img/IMG6.jpg' ) }}" alt="وصف الصورة">
                                </picture>
                            </figure><!-- نهاية .slide-image -->

                            <div class="intro-content">
                                <h3 class="intro-subtitle">أثاث خارجي</h3><!-- نهاية .intro-subtitle -->
                                <h1 class="intro-title">أثاث الطعام<br>الخارجي</h1><!-- نهاية .intro-title -->

                                <a href="category.html" class="btn btn-outline-white">
                                    <span>تسوق الآن</span>
                                    <i class="icon-long-arrow-right"></i>
                                </a>
                            </div><!-- نهاية .intro-content -->
                        </div><!-- نهاية .intro-slide -->
                    </div><!-- نهاية .intro-slider owl-carousel owl-simple -->
                    
                    <span class="slider-loader"></span><!-- نهاية .slider-loader -->
                </div><!-- نهاية .intro-slider-container -->
            </div><!-- نهاية .col-lg-8 -->
            <div class="col-lg-4">
                <div class="intro-banners">
                    <div class="row row-sm">
                        <div class="col-md-6 col-lg-12">
                            <div class="banner banner-display">
                                <a href="#">
                                    <img src="{{ url ( 'img/IMG3.jpg' ) }}" alt="بانر">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-darkwhite"><a href="#">تخفيضات</a></h4><!-- نهاية .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">كراسي وشيزلونج<br>خصم يصل إلى 40%</a></h3><!-- نهاية .banner-title -->
                                    <a href="#" class="btn btn-outline-white banner-link">تسوق الآن<i class="icon-long-arrow-right"></i></a>
                                </div><!-- نهاية .banner-content -->
                            </div><!-- نهاية .banner -->
                        </div><!-- نهاية .col-md-6 col-lg-12 -->

                        <div class="col-md-6 col-lg-12">
                            <div class="banner banner-display mb-0">
                                <a href="#">
                                    <img src="{{ url ( 'img/IMG5.jpg' ) }}" alt="بانر">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-darkwhite"><a href="#">جديد</a></h4><!-- نهاية .banner-subtitle -->
                                    <h3 class="banner-title text-white"><a href="#">أفضل مجموعة<br>إضاءة</a></h3><!-- نهاية .banner-title -->
                                    <a href="#" class="btn btn-outline-white banner-link">اكتشف الآن<i class="icon-long-arrow-right"></i></a>
                                </div><!-- نهاية .banner-content -->
                            </div><!-- نهاية .banner -->
                        </div><!-- نهاية .col-md-6 col-lg-12 -->
                    </div><!-- نهاية .row row-sm -->
                </div><!-- نهاية .intro-banners -->
            </div><!-- نهاية .col-lg-4 -->
        </div><!-- نهاية .row -->

        <div class="mb-6"></div><!-- نهاية .mb-6 -->

        
    </div><!-- نهاية .container -->
</div><!-- نهاية .bg-lighter -->


<div class="mb-6"></div><!-- نهاية .mb-6 -->

<div class="container">
    <div class="heading heading-center mb-3">
        <h2 class="title-lg">أحدث الإطلالات</h2><!-- نهاية .title -->
            
    </div><!-- نهاية .heading -->

    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel" aria-labelledby="trendy-all-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
                @foreach($getProduct as $value)
                <div class="product product-11 text-center">
                    <figure class="product-media">
                        <a href="{{url('item/list/'.$value->id)}}">
                            @if(isset($value->images[0]))
                                <img src="{{ $value->images[0]->getLogo() }}" alt="صورة المنتج" class="product-image">
                            @endif

                            @if(isset($value->images[1]))
                                <img src="{{ $value->images[1]->getLogo() }}" alt="صورة المنتج" class="product-image-hover">
                            @endif
                        </a>

                        <div class="product-action-vertical">
                            <a href="{{url('wishlist/add/'.$value->id)}}" class="btn-product-icon btn-wishlist"><span>أضف إلى قائمة الأمنيات</span></a>
                        </div><!-- نهاية .product-action-vertical -->
                    </figure><!-- نهاية .product-media -->

                    <div class="product-body">
                        <h3 class="product-title"><a href="{{url('item/list/'.$value->id)}}">{{$value->title}}</a></h3><!-- نهاية .product-title -->
                        <div class="product-price">
                        ${{number_format($value->price, 2)}}
                        </div><!-- نهاية .product-price -->
                    </div><!-- نهاية .product-body -->
                    <div class="product-action">
                        <a href="{{url('cart/add/'.$value->id)}}" class="btn-product btn-cart"><span>أضف إلى السلة</span></a>
                    </div><!-- نهاية .product-action -->
                </div><!-- نهاية .product -->
                @endforeach

                
            </div><!-- نهاية .owl-carousel -->
        </div><!-- نهاية .tab-pane -->
        
        </div><!-- نهاية .tab-content -->
    </div><!-- نهاية .container -->

        <div class="container categories pt-6">
    <h2 class="title-lg text-center mb-4">تسوق حسب الفئات</h2><!-- نهاية .title-lg text-center -->

    <div class="row">
        <div class="col-6 col-lg-4">
            <div class="banner banner-display banner-link-anim">
                <a href="#">
                    <img src="{{ url ( 'assets/images/banners/home/banner-1.jpg' ) }}" alt="بانر">
                </a>

                <div class="banner-content banner-content-center">
                    <h3 class="banner-title text-white"><a href="#">أثاث خارجي</a></h3><!-- نهاية .banner-title -->
                    <a href="#" class="btn btn-outline-white banner-link">تسوق الآن<i class="icon-long-arrow-right"></i></a>
                </div><!-- نهاية .banner-content -->
            </div><!-- نهاية .banner -->
        </div><!-- نهاية .col-sm-6 col-lg-3 -->
        <div class="col-6 col-lg-4 order-lg-last">
            <div class="banner banner-display banner-link-anim">
                <a href="#">
                    <img src="{{ url ( 'assets/images/banners/home/banner-4.jpg' ) }}" alt="بانر">
                </a>

                <div class="banner-content banner-content-center">
                    <h3 class="banner-title text-white"><a href="#">إضاءة</a></h3><!-- نهاية .banner-title -->
                    <a href="#" class="btn btn-outline-white banner-link">تسوق الآن<i class="icon-long-arrow-right"></i></a>
                </div><!-- نهاية .banner-content -->
            </div><!-- نهاية .banner -->
        </div><!-- نهاية .col-sm-6 col-lg-3 -->
        <div class="col-sm-12 col-lg-4 banners-sm">
            <div class="row">
                <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                    <a href="#">
                        <img src="{{ url ( 'assets/images/banners/home/banner-2.jpg' ) }}" alt="بانر">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h3 class="banner-title text-white"><a href="#">أثاث وتصميم</a></h3><!-- نهاية .banner-title -->
                        <a href="#" class="btn btn-outline-white banner-link">تسوق الآن<i class="icon-long-arrow-right"></i></a>
                    </div><!-- نهاية .banner-content -->
                </div><!-- نهاية .banner -->

                <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                    <a href="#">
                        <img src="{{ url ( 'assets/images/banners/home/banner-3.jpg' ) }}" alt="بانر">
                    </a>

                    <div class="banner-content banner-content-center">
                        <h3 class="banner-title text-white"><a href="#">مطبخ وأدوات</a></h3><!-- نهاية .banner-title -->
                        <a href="#" class="btn btn-outline-white banner-link">تسوق الآن<i class="icon-long-arrow-right"></i></a>
                    </div><!-- نهاية .banner-content -->
                </div><!-- نهاية .banner -->
            </div>
        </div><!-- نهاية .col-sm-6 col-lg-3 -->
    </div><!-- نهاية .row -->
        </div><!-- نهاية .container -->

    <div class="mb-5"></div><!-- نهاية .mb-6 -->


<div class="container">
    <hr>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-rocket"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">الدفع والتوصيل</h3><!-- نهاية .icon-box-title -->
                    <p>التوصيل 35 ريال لجميع الطلبات</p>
                </div><!-- نهاية .icon-box-content -->
            </div><!-- نهاية .icon-box -->
        </div><!-- نهاية .col-lg-4 col-sm-6 -->

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-rotate-left"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">الإرجاع والاسترداد</h3><!-- نهاية .icon-box-title -->
                    <p>ضمان استرداد الأموال بنسبة 100٪ مجانًا</p>
                </div><!-- نهاية .icon-box-content -->
            </div><!-- نهاية .icon-box -->
        </div><!-- نهاية .col-lg-4 col-sm-6 -->

        <div class="col-lg-4 col-sm-6">
            <div class="icon-box icon-box-card text-center">
                <span class="icon-box-icon">
                    <i class="icon-life-ring"></i>
                </span>
                <div class="icon-box-content">
                    <h3 class="icon-box-title">دعم عالي الجودة</h3><!-- نهاية .icon-box-title -->
                    <p>متواجدون دائماً لاستفساراتكم على مدار الساعة</p

                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->
                </div><!-- End .row -->

                <div class="mb-2"></div><!-- End .mb-2 -->
            </div><!-- End .container -->
         
        </main><!-- End .main -->
@endsection

    