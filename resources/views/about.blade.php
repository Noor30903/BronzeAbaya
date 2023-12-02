@extends('layouts.app')
@section('style')
  <link rel="stylesheet" type="text/css" href="{{ url('public/assets/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('public/assets/dist/css/vendor.css')}}">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Italiana&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet">
  <style>
    #faqs p {
    font-size: 20px;
    }
    #faqs button {
    font-size: 20px;
    
    }

  </style>
@endsection
@section('content')

    <section id="about" class="padding-xlarge">
      <div class="container">
        <div class="row">
          <div class="offset-md-2 col-md-8" dir="rtl">
            <h3  data-aos="fade" data-aos-easing="ease-in" data-aos-duration="1000" data-aos-once="true" >من نحن </h3>
            <h3 class="py-3" data-aos="fade" data-aos-easing="ease-in" data-aos-duration="1500" data-aos-once="true">برونز عباية علامة تجارية سعودية متخصصين لتلبية جميع متطلبات عملائنا كما اننا حريصون على تقديم تصاميم مميزة بجودة عالية مقابل سعر المناسب</h3>
            <p data-aos="fade" data-aos-easing="ease-in" data-aos-duration="1800" data-aos-once="true"></p>
          </div>
        </div>
      </div>
    </section>
    
    
    
    <section id="faqs" class="padding-xlarge">
      <div class="container">
        <div class="row">
          <div class="offset-md-2 col-md-8">
            <h2 class="text-center mb-5" data-aos="fade" data-aos-easing="ease-in" data-aos-duration="1000" data-aos-once="true">اسئلة شائعة</h2>
            <div dir="rtl" class="accordion accordion-flush" id="accordionFlush" data-aos="fade" data-aos-easing="ease-in" data-aos-duration="1500" data-aos-once="true">
              <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingOne3">
                  <button class="accordion-button collapsed bg-light text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                    مدة الانتهاء من الطلب؟

                  </button>
                </h3>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <p>مدة العمل من 7-14 يوم و قد يستغرق بضعة ايام اضافية في حال الضغط او العروض ( ملاحظة :  لا يحتسب يوم الجمعه من عدد ايام العمل )
                    </p>
                  </div>
                </div>
              </div>
      
              <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingTwo3">
                  <button class="accordion-button collapsed bg-light text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                    سياسة برونز عباية للاستبدال و الاسترجاع ؟

                  </button>
                </h3>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <p>نعتذر لعدم توفر خدمة الاستبدال او الاسترجاع نظرًا لاننا تقوم بتفصيل الطلب حسب رغباتك كما ان العربون لا يسترد بعد رفع الطلب ولكن في حال وجود عيوب مصنعية المتجر متكفل بتكاليف التعديل و التوصيل</p>
                  </div>
                </div>
              </div>
      
              <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingThree3">
                  <button class="accordion-button collapsed bg-light text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="true" aria-controls="flush-collapseThree">
                    هل يمكنني اجراء أي تعديل على العباية ؟ 
                  </button>
                </h3>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <p>يمكنك اضافة التعديل في خانة الملاحظات قبل ارفاق الطلب فقط</p>
                  </div>
                </div>
              </div>
      
              <div class="accordion-item">
                <h3 class="accordion-header" id="flush-headingFour3">
                  <button class="accordion-button collapsed bg-light text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="true" aria-controls="flush-collapseFour">
                    ما هي طريقة الغسيل الصحيحة للعباية ؟

                  </button>
                </h3>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <p>يفضل غسيلها يدوياً بشامبو سائل خاص للعبايات
                      احرصي على عدم سكب الشامبو مباشرةً على العباية و عدم فركها بقوة
                      حيث ان بعض الاقمشة تستزم غسيلاً جافا منها (العبايات المطرزة بالخرز او الخيط )
                      </p>
                  </div>
                </div>
              </div>
      
            </div>      
          </div>
        </div>
      </div>
    </section>    
@endsection
@section('script')
    <script src="{{ url('public/assets/dist/js/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('public/assets/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('public/assets/dist/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{ url('public/assets/dist/js/script.js')}}"></script>
  @endsection