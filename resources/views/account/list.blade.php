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
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">لوحة التحكم</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">الطلبات</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">العناوين</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">تفاصيل الحساب</a>
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
            <p>مرحباً <span class="font-weight-normal text-dark">{{$user->name}}</span>
            <br>
            من لوحة تحكم حسابك يمكنك مشاهدة <a href="#tab-orders" class="tab-trigger-link link-underline">طلباتك الأخيرة</a>، إدارة <a href="#tab-address" class="tab-trigger-link">عناوين الشحن والفوترة</a>، و<a href="#tab-account" class="tab-trigger-link">تحرير كلمة المرور وتفاصيل الحساب</a>.</p>
        </div><!-- .End .tab-pane -->

        <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
            @if(empty($orders))
                <p>لم يتم إجراء أي طلب حتى الآن.</p>
                <a href="{{url('shop')}}" class="btn btn-outline-primary-2"><span>تسوق الآن</span><i class="icon-long-arrow-right"></i></a>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">حالة الطلب</th>
                            <th scope="col">ملاحظاتك</th>
                            <th scope="col">التكلفة الإجمالية</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{ 
                                ($order->status == 0) ? 'تم وضع الطلب (في انتظار الدفع)' : 
                                (($order->status == 1) ? 'تحضير الطلب' : 
                                (($order->status == 2) ? 'الطلب في الطريق' : 
                                'تم التوصيل'))
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
                    <p>لم يتم حفظ أي عنوان حتى الآن.</p>
                @else
                    <p>سيتم استخدام العنوان التالي بشكل افتراضي على صفحة الدفع.</p>
                    <div class="col-lg-6">
                        <div class="card card-dashboard">
                            <div class="card-body">
                                <h3 class="card-title">عنوان الشحن</h3><!-- End .card-title -->
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
                                <label>الاسم الكامل *</label>
                                <input type="text" class="form-control" name="name" value="{{old('name', $user->name)}}" required>

                                <label>البريد الإلكتروني *</label>
                                <input type="email" class="form-control" name="email" value="{{old('email', $user->email)}}" required>

                                <label>كلمة المرور الحالية (اتركها فارغة لعدم التغيير)</label>
                                <input type="password" class="form-control" name="currentpass">

                                <label>كلمة المرور الجديدة (اتركها فارغة لعدم التغيير)</label>
                                <input type="password" class="form-control" name="newpass">

                                <label>تأكيد كلمة المرور الجديدة</label>
                                <input type="password" class="form-control mb-2" name="confirmnewpass">

                                <button type="submit" class="btn btn-outline-primary-2">
                                    <span>حفظ التغييرات</span>
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