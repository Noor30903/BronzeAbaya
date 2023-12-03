@extends('layouts.app')
@section('content')

<main class="main" dir="rtl" style="text-align: right;" >
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
                    @if(!empty($getSubCategory))
                        <h1 class="page-title">{{$getSubCategory->name}}</h1>
                    @elseif(!empty($getCategory))
        			    <h1 class="page-title">{{$getCategory->name}}</h1>
					@else
                		<h1 class="page-title">المتجر</h1>
                    @endif
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shop') }}">المتجر</a></li>
                        @if(!empty($getSubCategory))
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ url($getCategory->slug) }}">{{$getCategory->name}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$getSubCategory->name}}</li>
                        @elseif(!empty($getCategory))
                            <li class="breadcrumb-item active" aria-current="page">{{$getCategory->name}}</li>
                        @endif
                        
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-12">
                			<div class="toolbox">
                				<div class="toolbox-left">
                					<div class="toolbox-info">
                						اظهار <span>9 من 56</span> عبايات
                					</div><!-- End .toolbox-info -->
                				</div><!-- End .toolbox-left -->

                				<div class="toolbox-right"   >
                					<div class="toolbox-sort">
                						<label for="sortby">الترتيب حسب:</label>
                						<div class="select-custom">
											<select name="sortby" id="sortby" class="form-control">
												<option value="popularity" selected="selected">الأكثر شيوعا</option>
												<option value="rating">أعلى تقييم</option>
												<option value="date">التاريخ</option>
											</select>
										</div>
                					</div>
                				</div>
                			</div>

                            <div class="products mb-3">
                                <div class="row justify-content-center">
                                    @foreach($getProduct as $value)
                                    @php
                                         $getProductImage = $value->getImageSingle($value->id);
                                    @endphp

                                    <div class="col-12 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="{{url ($value->slug)}}">
                                                    @if (!empty($getProductImage) && !empty($getProductImage->getLogo()))
                                                    <img style= "heisht:280px;width:100%;object-fit;cover;"src="{{$getProductImage->getLogo()}}" alt="{{$value->title}}" class="product-image">
                                                    @endif
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>اضف إلى قائمة الامنيات</span></a>

                                                </div>

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>اضف إلى السلة</span></a>
                                                </div>
                                            </figure>

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="{{url($value->category_slug.'/'.$value->sub_category_slug)}}">{{$value->sub_category_name}}</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{url ($value->slug)}}">{{$value->title}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">

                                                   ${{number_format($value->price, 2)}}
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                    </div>
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
       
                                </div>
                            </div>

                            {!! $getProduct->appends(['category' => request('category'), 'subcategory' => request('subcategory')])->links() !!}

                		</div><!-- End .col-lg-9 -->
                	</div>
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection

    