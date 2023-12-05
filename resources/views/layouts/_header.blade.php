<header class="header" dir="rtl" style="text-align: right;">
            <div class="header-top">
                <div class="container">
                    

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <ul>
                                    <li><a href="{{url('wishlist/list')}}"><i class="icon-heart-o"></i>قائمة امنياتي </a></li>
                                    <li></li>
                                    <li><a href="{{url('contact')}}">تواصل معنا</a></li>
                                    <li><a href="{{ url('about') }}">من نحن</a></li>
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
                                <li >
                                    <a href="{{ route('shop') }}" class="sf-with-ul">المتجر</a>

                                    <div class="megamenu megamenu-sm">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                <div class="menu-col">
                                                    <div class="row">
                                                @php
                                                    $getCategoryHeader = App\Models\CategoryModel::getRecordMenu();
                                                @endphp
                                                    @foreach($getCategoryHeader as $value_h_c)
                                                        
                                                            <div class="col-md-6" style="margin-bottom: 20px;">
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

                                <li>
                                    
                                    <a href="{{route('account')}}" class="megamenu-container">حسابي</a>

                                </li>

                                <li>
                                    <div class="header-search">
                                        <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                                        <form action="{{ url('search')}}" method="get">
                                            <div class="header-search-wrapper">
                                                <label for="q" class="sr-only">البحث</label>
                                                <input type="search" class="form-control" name="search_data" id="q" placeholder="Search in..." required>
                                            </div><!-- End .header-search-wrapper -->
                                        </form>
                                    </div><!-- End .header-search -->
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="header-left">

                        <a href="{{url('cart/list')}}"  role="button">
                            <i class="icon-shopping-cart " style="font-size: 24px;"></i> 
                        </a>
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->