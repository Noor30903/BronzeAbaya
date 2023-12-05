<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ !empty($meta_title) ? $meta_title :''}}</title>
  
    @if(!empty($meta_description))
    <meta name="description" content="{{ $meta_description }}">
    @endif

    @if(!empty($meta_keywords))
    <meta name="keywords" content="{{ $meta_keywords }}">
    @endif

    <link rel="shortcut icon" href="{{ url ( 'assets/images/icons/favicon.ico' ) }}">
    


    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    @yield('style')
</head>

<body>
    
    <div class="page-wrapper" >


        @include('layouts._header')

        @yield('content')
        @include('layouts._footer')
    </div><!-- End .page-wrapper -->
    
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div>


    @include('layouts._mobile_menu')
    

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="{{ url('/login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="remember">
                                                <label class="custom-control-label" for="remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="{{ url('/register') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Your Full name *</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <div class="modal fade" id="modalorder" tabindex="-1" role="dialog" aria-hidden="true" dir="rtl" style="text-align: right;">
        <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered" role="document">
            <div class="modal-content p-4">
                
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>
                    <div class="form-box">
                        <div class="modal-header mx-auto border-0" style="text-align: center;">
                            <h2 class="modal-title fs-3 fw-normal">سياسة الطلب</h2>
                        </div>

                        <div>
                          <ol>
                            <li>يرجى لمقدم الطلب إعادة جميع تفاصيله مع الموظف للتأكيد.</li>
                            <li>لا يمكن تغيير الطلبات بعد تأكيدها، لذا يرجى التحقق جيدا من صحة تفاصيل الطلب .</li>
                            <li>تعتذر عن عدم تمكننا من الرد واستقبال الطلبات يوم الجمعة حيث أنها إجازة للمتجر . </li>
                            <li>يتم تفصيل عباءات متجر برونز حسب طلبك الخاص بدقة وإتقان لذا نعتذر عن إرجاع أو استبدال المنتج بعد شرائه ( العربون لا يسترد بعد رفع الطلب ) </li>
                            <li>في حال واجهتك مشكلة من طرفنا فيما يتعلق بالمنتجات التي قمت بشرائها وسوف يتكفل المتجر بالتعديل ومصاريف التوصيل كاملة</li>
                            <li>المتجر غير مسؤول عن فقدان البضاعه بعد مرور اسبوعين من تواصل المندوب مع العميل.</li>
                            <li>السعر لا يشمل التوصيل</li>
                          </ol>

                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div><!-- End .modal -->
        
    <div class="modal fade" id="modalwash" tabindex="-1" role="dialog" aria-hidden="true" dir="rtl" style="text-align: right;">
        <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered" role="document">
            <div class="modal-content p-4">
                
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>
                    <div class="form-box">
                        <div class="modal-header mx-auto border-0" style="text-align: center;">
                            <h2 class="modal-title fs-3 fw-normal">سياسة الطلب</h2>
                        </div>

                        <div>
                        <ul>
                            <li>يستحسن غسيلها يدوياً بشامبو سائل خاص بالعبايات. </li>
                            <li> احرصي على عدم سكب الشامبو مباشرة فوق العباية لأن ذلك يؤثر على بريق لونها. </li>
                            <li>يفضل غسيلها وشطفها وتعليقها مباشرة على علاقة الملابس لتجف بشكل طبيعي. </li>
                        </ul>

                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div><!-- End .modal -->

   
    
    <!-- Plugins JS File -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('assets/js/superfish.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ url('assets/js/main.js')}}"></script>
    @yield('script')
    
</body>
<!-- molla/index-2.html  22 Nov 2019 09:55:42 GMT -->
</html>