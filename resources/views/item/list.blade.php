
@extends('layouts.app')
@section('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>

.star-rating {
    direction: rtl; /* Right-to-left to fill stars from right to left */
    font-size: 0; /* Hide default text size */
}

.star-rating input[type="radio"] {
    display: none; /* Hide the radio buttons */
}

.star-rating label {
    font-size: 2rem; /* Size of stars */
    color: #ddd; /* Color of unselected stars */
    cursor: pointer;
}

.star-rating input[type="radio"]:checked ~ label {
    color: gold; /* Color of selected stars */
}

.star-rating label:hover,
.star-rating label:hover ~ label {
    color: gold; /* Color when hovering over a star */
}
.reviews-container {
    max-height: 400px; /* Adjust the height as needed */
    overflow-y: auto; /* Enables vertical scrolling */
}


</style>
@endsection
@section('content')
<main class="main" dir="rtl" style="text-align: right;" >
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shop') }}">المتجر</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Default</li>
                    </ol>

                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            @php
                $getProductImage = $getProduct->getImageSingle($getProduct->id);
            @endphp
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                                
                                            <img id="product-zoom" src="{{$getProductImage->getLogo()}}" data-zoom-image="" alt="product image">
                                                
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                        @foreach($getimageRecord as $image)
         
                                        <a class="product-gallery-item" href="#" onclick="changeMainImage('{{$image->getLogo()}}'); return false;">
                                            <img src="{{$image->getLogo()}}" alt="Image Desc">
                                        </a>

                                        @endforeach
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
 
                                  
                            </div><!-- End .col-md-6 -->            
                        
                                
                            

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{$getProduct->title}}</h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        {{$getProduct->price}}
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p> {{$getProduct->short_description}}</p>
                                    </div><!-- End .product-content -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Size:</label>
                                        <div class="select-custom">
                                            <select name="size" id="size" class="form-control">
                                                <option value="#" selected="selected">Select a size</option>
                                                @foreach($getsizeRecord as $size)
                                                    <option value="{{$size->id}}" selected="selected">{{$size->name}}</option>
                                                @endforeach
                                            </select>
                                        </div><!-- End .select-custom -->
                                        
                                        <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        <a href="{{url('cart/add/'.$getProduct->id)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                        <div class="details-action-wrapper">
                                            <a href="{{url('wishlist/add/'.$getProduct->id)}}" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                        </div>
                                    </div><!-- End .product-details-action -->
                                    
                                    
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <h3>Reviews</h3>
                                    <div class="reviews-container">
                                        @foreach($review as $value)
                                        <div class="review">
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <h4><a href="#">{{$value->name}}</a></h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: {{$value->rate * 20}}%;" ></div><!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    </div><!-- End .rating-container -->
                                                    <span class="review-date">{{$value->created_at}}</span>
                                                </div><!-- End .col -->
                                                <div class="col">

                                                    <div class="review-content">
                                                        <p>{{$value->comment}}</p>
                                                    </div><!-- End .review-content -->

                                                </div><!-- End .col-auto -->
                                            </div><!-- End .row -->

                                        </div><!-- End .review -->
                                        @endforeach
                                    </div>
                                    

                                    <form action="{{url('item/add/'.$getProduct->id)}}" method="post">
                                        @csrf
                                        <h3>اختر تقييم المنتج:</h3>
                                        
                                        <div class="star-rating">
                                            
                                            <input id="star-5" type="radio" name="rating" value="5"/>
                                            <label for="star-5" title="5 stars"><i class="fas fa-star"></i></label>
                                            <input id="star-4" type="radio" name="rating" value="4"/>
                                            <label for="star-4" title="4 stars"><i class="fas fa-star"></i></label>
                                            <input id="star-3" type="radio" name="rating" value="3"/>
                                            <label for="star-3" title="3 stars"><i class="fas fa-star"></i></label>
                                            <input id="star-2" type="radio" name="rating" value="2"/>
                                            <label for="star-2" title="2 stars"><i class="fas fa-star"></i></label>
                                            <input id="star-1" type="radio" name="rating" value="1"/>
                                            <label for="star-1" title="1 star"><i class="fas fa-star"></i></label>
                                        </div>
                                        <div class="form-group">
                                            <h3>اكتب تعليق:</h3>
                                            
                                            <textarea name="comment" class="form-control" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                    </form>

                                </div><!-- End .reviews -->
                                
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <div class="container">
                        <div class="heading heading-center mb-3">
                            <h2 class="title-lg">قد تحب..</h2><!-- End .title -->

                        </div><!-- End .heading -->

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
                                    @foreach($getSimilarProducts as $value)
                                    <div class="product product-11 text-center">
                                        <figure class="product-media">
                                            <a href="{{url('item/list/'.$value->id)}}">
                                                @if(isset($value->images[0]))
                                                    <img src="{{ $value->images[0]->getLogo() }}" alt="Product image" class="product-image">
                                                @endif

                                                @if(isset($value->images[1]))
                                                     <img src="{{ $value->images[1]->getLogo() }}" alt="Product image" class="product-image-hover">
                                                @endif
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="{{url('wishlist/add/'.$value->id)}}" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                            </div><!-- End .product-action-vertical -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <h3 class="product-title"><a href="{{url('item/list/'.$value->id)}}"></a>{{$value->title}}</h3><!-- End .product-title -->
                                            <div class="product-price">
                                            ${{number_format($value->price, 2)}}
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                        <div class="product-action">
                                            <a href="{{url('cart/add/'.$value->id)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </div><!-- End .product -->
                                    @endforeach


                                </div><!-- End .owl-carousel -->
                            </div><!-- .End .tab-pane -->
                                
                        </div><!-- End .tab-content -->
                    </div><!-- End .container -->

                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection

@section('script')
<script type="text/javascript">
    function changeMainImage(imageSrc) {
        var mainImage = document.getElementById('product-zoom');
        mainImage.src = imageSrc;
    }
     
</script>
@endsection