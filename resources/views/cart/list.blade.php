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
<main class="main" dir="rtl" style="text-align: right;">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">عربة التسوق<span>المتجر</span></h1>
        </div><!-- نهاية .container -->
    </div><!-- نهاية .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('shop') }}">المتجر</a></li>
                <li class="breadcrumb-item active" aria-current="page">عربة التسوق</li>
            </ol>
        </div><!-- نهاية .container -->
    </nav><!-- نهاية .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>المنتج</th>
                                    <th>السعر</th>
                                    <th>الكمية</th>
                                    <th>المجموع</th>
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
                                                
                                                        <img src="{{$value->productImage }}" alt="صورة المنتج">
                                                    
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="#">{{$value->product_title}}</a>
                                                </h3><!-- نهاية .product-title -->
                                            </div><!-- نهاية .product -->
                                        </td>
                                        <td class="price-col">{{ $value->product_price }} ريال سعودي</td>
                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">
                                                
                                                <input type="number" name="quantity" class="form-control quantity-input" data-id="{{ $value->id }}" value="{{ old('quantity', $value->product_quantity) }}" min="1" max="10" step="1" data-decimals="0" required onchange="updateQuantity(this)">

                                                
                                            </div><!-- نهاية .cart-product-quantity -->
                                        </td>
                                        
                                        <td class="total-col" data-item-total="{{ $value->id }}">{{ $productTotal = $value->product_price * $value->product_quantity  }} ريال سعودي</td>
                                        
                                        <td class="remove-col" id="deleteitem"><a href="{{url('cart/delete/'.$value->id)}}" class="btn-remove"><i class="icon-close"></i></a></td>
                                    </tr>
                                    @php $totalcost += $productTotal; @endphp
                                    
                                @endforeach
                                
                            </tbody>
                        </table><!-- نهاية .table table-wishlist -->

                        
                    </div><!-- نهاية .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">إجمالي السلة</h3><!-- نهاية .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>المجموع الفرعي:</td>
                                        <td id="total-cost-display">{{$totalcost}} ريال سعودي</td>
                                    </tr><!-- نهاية .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>الشحن:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">شحن مجاني</label>
                                            </div><!-- نهاية .custom-control -->
                                        </td>
                                        <td>$0.00</td>
                                    </tr><!-- نهاية .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="standart-shipping">عادي:</label>
                                            </div><!-- نهاية .custom-control -->
                                        </td>
                                        <td>$10.00</td>
                                    </tr><!-- نهاية .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="express-shipping">سريع:</label>
                                            </div><!-- نهاية .custom-control -->
                                        </td>
                                        <td>$20.00</td>
                                    </tr><!-- نهاية .summary-shipping-row -->

                                    <tr class="summary-shipping-estimate">
                                        <td>تقدير لبلدك<br> <a href="dashboard.html">تغيير العنوان</a></td>
                                        <td>&nbsp;</td>
                                    </tr><!-- نهاية .summary-shipping-estimate -->

                                    <tr class="summary-total">
                                        <td>المجموع:</td>
                                        <td id="total-cost">{{$totalcost}} ريال سعودي</td>
                                    </tr><!-- نهاية .summary-total -->
                                </tbody>
                            </table><!-- نهاية .table table-summary -->

                            <a href="{{url('checkout/list')}}" class="btn btn-outline-primary-2 btn-order btn-block">المتابعة إلى الدفع</a>
                        </div><!-- نهاية .summary -->

                        <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>مواصلة التسوق</span><i class="icon-refresh"></i></a>
                    </aside><!-- نهاية .col-lg-3 -->
                </div><!-- نهاية .row -->
            </div><!-- نهاية .container -->
        </div><!-- نهاية .cart -->
    </div><!-- نهاية .page-content -->
</main><!-- نهاية .main -->

@endsection
@section('script')
<script>

	function updateQuantity(element) {
	    var itemId = $(element).data('id');
	    var newQuantity = $(element).val();

	    $.ajax({
	        url: "{{ route('cart.updateQuantity') }}",
	        type: 'POST',
	        data: {
	            'id': itemId,
	            'quantity': newQuantity,
	            '_token': '{{ csrf_token() }}'
	        },
	        
			success: function(response) {
    			console.log('Quantity updated');
    			// Update the total cost on the page
    			if (response.totalCost !== undefined) {
        			$('#total-cost-display').text(response.totalCost + ' SAR');
        			$('#total-cost').text(response.totalCost + ' SAR');

        			$.each(response.productTotals, function(itemId, itemTotal) {
            			$('[data-item-total="' + itemId + '"]').text(itemTotal + ' SAR');
        			});
    			}
				
			},
	        error: function(xhr) {
	            console.error('Error updating quantity');
	        }
	    });
	}

	</script>
@endsection