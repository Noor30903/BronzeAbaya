@extends('layouts.app')
@section('style')
<style>
.cart-product-quantity {
    display: flex;
    align-items: center; /* This ensures vertical alignment */
    gap: 8px; /* This creates some space between your input and button */
}

.quantity-input {
    flex: 1; /* This makes the input field flexible in size */
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px; /* Rounded corners for the input field */
}

.update-button {
    padding: 8px 16px;
    border: 1px solid #ccc; /* Matching the input field border */
    background-color: #f0ad4e; /* Bootstrap's btn-warning color */
    color: white;
    text-transform: uppercase; /* Optional: makes text uppercase */
    border-radius: 4px; /* Rounded corners for the button */
    cursor: pointer; /* Changes the cursor to indicate it's clickable */
}

/* Adjust the button on hover for better user experience */
.update-button:hover {
    background-color: #ec971f; /* A shade darker than btn-warning */
}
</style>
@endsection
@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
                                    @php
                                        $totalcost = 0;
                                        $productTotal = 0;
                                    @endphp
                                    @foreach($getRecord as $value)
										<tr>
											<td class="product-col">
												<div class="product">
													<figure class="product-media">
														<a href="#">
															<img src="assets/images/products/table/product-1.jpg" alt="Product image">
														</a>
													</figure>

													<h3 class="product-title">
														<a href="#">{{$value->product_title}}</a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class="price-col">{{ $value->product_price }} SAR</td>
                                            
											<form action="{{ route('cart.update', $value->id) }}" method="post">
        										@csrf
        										
        										<td class="quantity-col">
        										    <div class="cart-product-quantity">
        										        <input type="number" name="quantity" class="form-control quantity-input" value="{{ old('quantity', $value->product_quantity) }}" min="1" max="10" step="1" data-decimals="0" required>
        										        
        										    </div><!-- End .cart-product-quantity -->
        										</td>
                                                
											    <td class="total-col">{{$productTotal = $value->product_price * $value->product_quantity  }}</td>
                                                
											    <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
										</tr>
										@php $totalcost += $productTotal; @endphp
										
									@endforeach
									<input type="hidden" name="total" value="{{$totalcost}}">
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
                                        <button type="submit" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
                                    </form>
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td>{{$totalcost}}</td>
	                						</tr><!-- End .summary-subtotal -->
	                						<tr class="summary-shipping">
	                							<td>Shipping:</td>
	                							<td>&nbsp;</td>
	                						</tr>

	                						<tr class="summary-shipping-row">
	                							<td>
													<div class="custom-control custom-radio">
														<input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="free-shipping">Free Shipping</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$0.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control custom-radio">
														<input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="standart-shipping">Standart:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$10.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control custom-radio">
														<input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="express-shipping">Express:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$20.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-estimate">
	                							<td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
	                							<td>&nbsp;</td>
	                						</tr><!-- End .summary-shipping-estimate -->

	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td>{{$totalcost}}</td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	                			</div><!-- End .summary -->

		            			<a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
