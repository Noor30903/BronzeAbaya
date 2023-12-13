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

            <div class="page-content" dir="rtl" style="text-align: right;">
            	<div class="checkout">
	                <div class="container">
            			<form action="{{ url('checkout/payment/'.$order->id) }}" method="post" enctype="multipart/form-data">
							@csrf
		                	<div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">تفاصيل الحساب</h2><!-- End .checkout-title -->

                                <label for="selected-account">اختر حساب البنك:</label>
                                <select class="form-group" name="selected-account" id="selected-account" onchange="updateBankDetails()">
                                    <option value="bank1" data-account-name="نواف محمد احمد آل سلامة" data-account-number="648000010006086078550" data-iban="SA9280000648000010006086078550">الراجحي</option>
                                    <option value="bank2" data-account-name="نوف محمد احمد آل سلامة" data-account-number="262246218001" data-iban="SA2645000000262246218001">ساب</option>
                                    <option value="bank3" data-account-name="نوف محمد آل سلامة" data-account-number="612681881520008" data-iban="SA4215000612681881520008">البلاد</option>
                                    <option value="bank4" data-account-name="نوف ال سلامة" data-account-number="2810363714" data-iban="SA7240000000002810363714">ساميا</option>
                                    <option value="bank5" data-account-name="نوف محمد ال سلامة" data-account-number="68202550998000" data-iban="">الانماء</option>
                                    <option value="bank6" data-account-name="فاطمة علي النجيدي" data-account-number="13549080000109" data-iban="">الاهلي</option>
                                    <option value="bank7" data-account-name="نوف محمد ال سلامة" data-account-number="9627195849940" data-iban="">الرياض</option>
                                    <option value="bank8" data-account-name="نوف محمد ال سلامة" data-account-number="k2468400118" data-iban="">السعودي الفرنسي</option>
                                    <option value="bank9" data-account-name="نوف محمد ال سلامة" data-account-number="5555694926001" data-iban="SA1965000005555694926001">السعودي للاستثمار</option>
                                    <option value="bank10" data-account-name="نوف محمد ال سلامة" data-account-number="005680404965001" data-iban="SA3060100005680404965001">بنك الجزيرة</option>
                                    <!-- Add options for each bank account -->
                                </select>

                                <div id="bank-details">
                                    <p class="form-group"><strong>اسم صاحب الحساب:</strong> <span id="account-name"></span></p>
                                    <p class="form-group"><strong>رقم الحساب:</strong> <span id="account-number"></span></p>
                                    <p class="form-group"><strong>رقم الايبان:</strong> <span id="iban"></span></p>
                                </div>

                                <div class="form-group">
                                    <label>ارفق صورة الايصال <span style="color:red;"></span></label>
                                    <input type="file" name="image[]" class="form-control" style="padding: 5px;" multiple accept="image/*">
 
                                </div>
                            </div><!-- End .col-lg-9 -->


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
												@foreach($orderitems as $value)
		                							<tr>
		                								<td><a href="#">{{$value->product_title}}</a></td>
		                								<td>{{$value->product_price * $value->product_quantity }}</td>
		                							</tr>
		                						@endforeach
		                						<tr class="summary-subtotal">
		                							<td>المجموع الفرعي:</td>
		                							<td>{{$order->totalcost}} SAR</td>
		                						</tr><!-- End .summary-subtotal -->
		                						<tr>
		                							<td>الشحن:</td>
		                							<td>35 SAR</td>
		                						</tr>
		                						<tr class="summary-total">
		                							<td>المجموع:</td>
		                							<td>{{ 35 + $order->totalcost}} SAR</td>
		                						</tr><!-- End .summary-total -->
		                					</tbody>
		                				</table><!-- End .table table-summary -->

		                				<button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
		                					<span class="btn-text">رفع الطلب</span>
                                            <span class="btn-hover-text">الدفع</span>
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
@section('script')
<script>
function updateBankDetails() {
    // Get the selected option element
    var selectElement = document.getElementById('selected-account');
    var selectedOption = selectElement.options[selectElement.selectedIndex];

    // Retrieve the data attributes from the selected option
    var accountName = selectedOption.getAttribute('data-account-name');
    var accountNumber = selectedOption.getAttribute('data-account-number');
    var iban = selectedOption.getAttribute('data-iban');

    // Update the display with the selected bank's details
    document.getElementById('account-name').textContent = accountName;
    document.getElementById('account-number').textContent = accountNumber;
    document.getElementById('iban').textContent = iban;
}

// Update details on page load to match the initially selected bank
document.addEventListener('DOMContentLoaded', updateBankDetails);
</script>
@endsection
