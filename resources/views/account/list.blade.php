@extends('layouts.app')
@section('content')


<main class="main" dir="rtl" style="text-align: right;">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">حسابي</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('shop') }}">المتجر</a></li>
                        <li class="breadcrumb-item active" aria-current="page">حسابي</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-3">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								    <li class="nav-item">
								        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" href="{{url('/logout')}}">تسجيل الخروج</a>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								@include('admin.layouts._message')
								    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
								    	<p>Hello <span class="font-weight-normal text-dark">{{$user->name}}</span>
								    	<br>
								    	From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
										@if(empty($orders))
								    		<p>No order has been made yet.</p>
								    		<a href="{{url('shop')}}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
										@else
											<table class="table">
  												<thead>
  												  <tr>
  												    <th scope="col">#</th>
  												    <th scope="col">Order Status</th>
  												    <th scope="col">Your notes</th>
  												    <th scope="col">Total Cost</th>
  												  </tr>
  												</thead>
  												<tbody>
												  @foreach($orders as $order)
  												  	<tr>
  												  	  <th scope="row">{{$order->id}}</th>
  												  	  <td>{{ 
    														($order->status == 0) ? 'Order Placed (Waiting Payment)' : 
    														(($order->status == 1) ? 'Preparing Order' : 
    														(($order->status == 2) ? 'Order On Its Way' : 
    														'Delivered'))
														}}</td>
  												  	  <td>{{$order->notes}}</td>
  												  	  <td>{{$order->totalcost}}</td>
  												  	</tr>
  												  @endforeach
  												</tbody>
											</table>
											{{ $orders->fragment('tab-orders')->links() }}
										@endif
										
										
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
								    	
								    	<div class="row">
											@if(empty($address))
								    			<p>No address has been saved yet.</p>
											@else
												<p>The following address will be used on the checkout page by default.</p>
								    			<div class="col-lg-6">
								    				<div class="card card-dashboard">
								    					<div class="card-body">
								    						<h3 class="card-title">Shipping Address</h3><!-- End .card-title -->
															<p>
															{{$address->city}}<br>
															{{$address->country}}<br>
															{{$address->street}}<br>

								    					</div><!-- End .card-body -->
								    				</div><!-- End .card-dashboard -->
								    			</div><!-- End .col-lg-6 -->
											@endif
								    	</div><!-- End .row -->
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form action="{{ route('user.edit') }}" method="post">
											@csrf
			                				<label>Full Name *</label>
			                				<input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}" required>

		                					<label>Email address *</label>
		        							<input type="email" class="form-control" name="email" value="{{old('email', $user->email)}}" required>

		            						<label>Current password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control" name="currentpass">

		            						<label>New password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control" name="newpass">

		            						<label>Confirm new password</label>
		            						<input type="password" class="form-control mb-2" name="confirmnewpass">

		                					<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                			</form>
								    </div><!-- .End .tab-pane -->
								</div>
	                		</div><!-- End .col-lg-9 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection
@section('script')
<script>
    window.onload = function() {
        // Check if URL contains a fragment
        if(window.location.hash) {
            // Remove 'show' and 'active' classes from all tabs and nav-links
            $('.tab-pane, .nav-link').removeClass('show active');
            
            // Add 'show' and 'active' classes to the Orders tab and link
            $('#tab-orders, #tab-orders-link').addClass('show active');
        }
    };
</script>

@endsection