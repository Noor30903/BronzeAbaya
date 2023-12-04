@extends('layouts.app')


@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Wishlist<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="container">
					<table class="table table-wishlist table-mobile">
						<thead>
							<tr>
								<th>Product</th>
								<th>Price</th>

							</tr>
						</thead>

						<tbody>
						@foreach($getRecord as $value)
							<tr>
								<td class="product-col">
									<div class="product">
										<figure class="product-media">
											<a href="#">
												<img src="{{$value->productImage }}" alt="Product image">
											</a>
										</figure>

										<h3 class="product-title">
											<a href="#">{{$value->product_title}}</a>
										</h3><!-- End .product-title -->
									</div><!-- End .product -->
								</td>
								<td class="price-col">{{ $value->product_price }} SAR</td>

								<td class="remove-col"><a href="{{url('wishlist/delete/'.$value->id)}}" class="btn-remove"><i class="icon-close"></i></a></td>
							</tr>
						@endforeach
					
						</tbody>
					</table><!-- End .table table-wishlist -->
	            	
            	</div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection