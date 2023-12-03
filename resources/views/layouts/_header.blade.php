<header class="header" dir="rtl" style="text-align: right;">
            <div class="header-top">
                <div class="container">
                    

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <ul>
                                    <li><a href="{{url('wishlist')}}"><i class="icon-heart-o"></i>قائمة امنياتي </a></li>
                                    <li></li>
                                    <li><a href="{{url('contact')}}">تواصل معنا</a></li>
                                    <li><a href="{{ route('about') }}">من نحن</a></li>
                                    
                                    <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>تسجيل الدخول</a></li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-right">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="{{ url('') }}" class="logo">
                            <img src=" {{ url('assets/images/logo.png') }} " alt="" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="{{url('')}}">الصفحة الرئيسية</a>
                                </li>
                                <li>
                                    <a href="{{ route('shop') }}" class="sf-with-ul">المتجر</a>

                                    <div class="megamenu megamenu-md">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                <div class="menu-col">
                                                    <div class="row">
                                                @php
                                                    $getCategoryHeader = App\Models\CategoryModel::getRecordMenu();
                                                @endphp
                                                    @foreach($getCategoryHeader as $value_h_c)
                                                        
                                                            <div class="col-md-4" style="margin-bottom: 20px;">
                                                                <a href="{{ url($value_h_c-> slug)}}" class="menu-title">{{$value_h_c-> name}}</a>
                                                                <ul>
                                                                @if(!empty($value_h_c->getSubCategory->count()))
                                                                    @foreach($value_h_c->getSubCategory as $value_h_sub)
                                                                        <li><a href="{{url($value_h_c->slug.'/'.$value_h_sub->slug)}}">{{$value_h_sub->name}}</a></li>
                                                                    @endforeach
                                                                 @endif
                                                                </ul>
                                                            </div>
                                                            
                                                    @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="header-left">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="{{ url('search')}}" method="get">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">البحث</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">2</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">Beige knitted elastic runner shoes</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                x $84.00
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{url('assets/images/products/cart/product-1.jpg')}}" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div><!-- End .product -->

                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">Blue utility pinafore denim dress</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                x $76.00
                                            </span>
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{url('assets/images/products/cart/product-2.jpg')}}/" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div><!-- End .product -->
                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">$160.00</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="{{url('cart/list')}}" class="btn btn-primary">View Cart</a>
                                    <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->
