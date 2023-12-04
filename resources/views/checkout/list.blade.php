@extends('layouts.app')
@section('content')

<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">الدفع<span>المتجر</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية </a></li>
                        <li class="breadcrumb-item"><a href="#">المتجر</a></li>
                        <li class="breadcrumb-item active" aria-current="page">الدفع</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
            			<form action="#">
		                	<div class="row">
		                		<div class="col-lg-9">
		                			<h2 class="checkout-title">تفاصيل الفاتورة </h2><!-- End .checkout-title -->
		                				

	            						<label>البلد* </label>
	            						<input type="text" class="form-control" required>

	            						<label>عنوان الشارع *</label>
	            						<input type="text" class="form-control" placeholder="House number and Street name" required>
	            						<input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

	            						<div class="row">
		                					<div class="col-sm-6">
		                						<label>المدينة *</label>
		                						<input type="text" class="form-control" required>
		                					</div><!-- End .col-sm-6 -->

		                				</div><!-- End .row -->

	                					<label>ملاحظات الطلب (اختياري)</label>
	        							<textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-3">
		                			<div class="summary">
		                				<h3 class="summary-title">طلبك</h3><!-- End .summary-title -->

		                				<table class="table table-summary">
		                					<thead>
		                						<tr>
		                							<th>المنتج</th>
		                							<th>المجموع</th>
		                						</tr>
		                					</thead>

		                					<tbody>
		                						<tr>
		                							<td><a href="#">Beige knitted elastic runner shoes</a></td>
		                							<td>$84.00</td>
		                						</tr>
		                						
		                						<tr class="summary-subtotal">
		                							<td>المجموع الفرعي:</td>
		                							<td></td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td>الشحن:</td>
		                							<td>35 SAR</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>المجموع:</td>
		                							<td></td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<div class="accordion-summary" id="accordion-payment">
										    <div class="card">
										        <div class="card-header" id="heading-1">
										            <h2 class="card-title">
										                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
														تحويل مصرفي مباشر
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
										            <div class="card-body">
													قم بالدفع مباشرة في حسابنا البنكي. يرجى استخدام رقم الطلب الخاص بك كمرجع للدفع. .										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->

										    <div class="card">
										        <div class="card-header" id="heading-3">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
														الدفع عند الاستلام
										                </a>
										            </h2>
										        </div><!-- End .card-header -->
										        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
										            <div class="card-body">
										            </div><!-- End .card-body -->
										        </div><!-- End .collapse -->
										    </div><!-- End .card -->
		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">Place Order</span>
		                					<span class="btn-hover-text">Proceed to Checkout</span>
		                				</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
            			</form>
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection