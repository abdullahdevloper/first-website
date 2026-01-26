<!DOCTYPE html>
<html lang="en">
   <head>
      <!--Start of Google Analytics script-->
      @if ($bs->is_analytics == 1)
      {!! $bs->google_analytics_script !!}
      @endif
      <!--End of Google Analytics script-->

      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <meta name="description" content="@yield('meta-description')">
      <meta name="keywords" content="@yield('meta-keywords')">

      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{$bs->website_title}} @yield('pagename')</title>
      <!-- favicon -->
      <link rel="shortcut icon" href="{{asset('assets/front/img/'.$bs->favicon)}}" type="image/x-icon">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
      <!-- plugin css -->
      <link rel="stylesheet" href="{{asset('assets/front/css/plugin.min.css')}}">
      <!--default css-->
      <link rel="stylesheet" href="{{asset('assets/front/css/default.css')}}">
      <!-- main css -->
      <link rel="stylesheet" href="{{asset('assets/front/css/gym-style.css')}}">
      <!-- common css -->
      <link rel="stylesheet" href="{{asset('assets/front/css/common-style.css')}}">
      <!-- main css -->
      <link rel="stylesheet" href="{{asset('assets/front/css/gym-responsive.css')}}">

      @if ($bs->is_tawkto == 1 || $bex->is_whatsapp == 1)
      <style>
        #scroll_up {
            right: auto;
            left: 20px;
        }
      </style>
      @endif

      @if (count($langs) == 0)
      <style media="screen">
      .support-bar-area ul.social-links li:last-child {
          margin-right: 0px;
      }
      .support-bar-area ul.social-links::after {
          display: none;
      }
      </style>
      @endif

      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">
      <!-- common base color change -->
      <link href="{{url('/')}}/assets/front/css/common-base-color.php?color={{$bs->base_color}}" rel="stylesheet">
      <!-- base color change -->
      <link href="{{url('/')}}/assets/front/css/gym-base-color.php?color={{$bs->base_color}}" rel="stylesheet">


      @if ($rtl == 1)
      <!-- RTL css -->
      <link rel="stylesheet" href="{{asset('assets/front/css/rtl.css')}}">
      <link rel="stylesheet" href="{{asset('assets/front/css/gym-rtl.css')}}">
      <link rel="stylesheet" href="{{asset('assets/front/css/pb-rtl.css')}}">
      @endif

      @yield('styles')

      <!-- jquery js -->
      <script src="{{asset('assets/front/js/jquery-3.3.1.min.js')}}"></script>

      @if ($bs->is_appzi == 1)
      <!-- Start of Appzi Feedback Script -->
      <script async src="https://app.appzi.io/bootstrap/bundle.js?token={{$bs->appzi_token}}"></script>
      <!-- End of Appzi Feedback Script -->
      @endif

      <!-- Start of Facebook Pixel Code -->
      @if ($be->is_facebook_pexel == 1)
        {!! $be->facebook_pexel_script !!}
      @endif
      <!-- End of Facebook Pixel Code -->

      <!--Start of Appzi script-->
      @if ($bs->is_appzi == 1)
      {!! $bs->appzi_script !!}
      @endif
      <!--End of Appzi script-->
   </head>



   <body @if($rtl == 1) dir="rtl" @endif>


    <!-- Start finlance_header area -->
    @includeIf('front.gym.partials.navbar')
    <!-- End finlance_header area -->

    @if (!request()->routeIs('front.index') && !request()->routeIs('front.packageorder.confirmation'))
        <!--   breadcrumb area start   -->
      
        <!--   breadcrumb area end    -->
    @endif

    @yield('content')


    <!--    announcement banner section start   -->
    <a class="announcement-banner" href="{{asset('assets/front/img/'.$bs->announcement)}}"></a>
    <!--    announcement banner section end   -->


<!-- Start Newsletter & Footer Wrapper -->
<div class="footer-area-wrapper">

    <!-- 1. Newsletter Section -->
    <div class="newsletter-area-grey">
        <div class="container custom-width-container">
            <div class="row align-items-center">
                
                {{-- الجانب الأيسر: النصوص --}}
                <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
                    <div class="newsletter-box d-flex align-items-start">
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="content">
                            <h3 class="title">SUBSCRIBE TO OUR NEWSLETTER</h3>
                            <p class="desc">
                                Want to keep up to date with all our latest news and information? Join our mailing list now.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- الجانب الأيمن: الفورم --}}
                <div class="col-lg-5 col-md-12">
                    <form id="footerSubscribeForm" action="{{route('front.subscribe')}}" method="post" class="newsletter-form-inline">
                        @csrf
                        {{-- تم استخدام d-flex لإجبار العناصر على البقاء في صف واحد --}}
                        <div class="form-row-mobile d-flex">
                            <input type="email" class="form-control" placeholder="Your email address" name="email" required>
                            <button type="submit" class="btn-signup">SIGN UP</button>
                        </div>
                        <p id="erremail" class="text-danger mb-0 err-email mt-2 small"></p>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- 2. Footer Section -->
    <footer class="main-footer-black">
        <div class="container custom-width-container">
            
            {{-- الجزء العلوي --}}
            <div class="footer-widgets">
                <div class="row align-items-center">
                    
                    {{-- العمود 1: الشعار --}}
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 text-center text-lg-left">
                        <a href="{{route('front.index')}}">
                            <img class="footer-logo" src="{{asset('assets/front/img/'.$bs->footer_logo)}}" alt="Logo">
                        </a>
                    </div>

                    {{-- العمود 2: روابط 1 --}}
                    <div class="col-lg-2 col-md-6 col-6 mb-4 mb-lg-0">
                        <ul class="footer-links">
                            <li><a href="{{url('/portfolios')}}">About Us</a></li>
                            <li><a href="{{url('/products')}}">Products</a></li>
                            <li><a href="{{url('/contact')}}">Contact Us</a></li>
                        </ul>
                    </div>

                    {{-- العمود 3: روابط 2 --}}
                    <div class="col-lg-4 col-md-6 col-6 mb-4 mb-lg-0">
                        <ul class="footer-links">
                            <li><a href="{{url('/R-&-D')}}">R & D</a></li>
                            <li><a href="{{url('/')}}">Find Parts</a></li>
                            <li><a href="{{url('/Anti-Counterfeiting-Query')}}">Anti-Counterfeiting-Query</a></li>

                        </ul>
                    </div>

                    {{-- العمود 4: الزر --}}
                    <div class="col-lg-3 col-md-12 text-center text-lg-right">
                        <a href="{{route('front.contact')}}" class="btn-contact-red">
                            CONTACT US TODAY
                        </a>
                    </div>

                </div>
            </div>

            {{-- حقوق النشر --}}
            <div class="footer-bottom-copyright">
                <div class="row">
                    <div class="col-12">
                        <p class="copyright">
                            &copy;OPTICAL SMART SOFTWARES {{date('Y')}} ALL RIGHTS RESERVED
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </footer>

</div>

<style>
    /* =========================================
       Global Fonts & Layout
       ========================================= */
    .footer-area-wrapper {
        font-family: 'Open Sans', sans-serif;
    }

    /* تحديد عرض الحاوية لضمان الهوامش الجانبية في سطح المكتب */
    @media (min-width: 1200px) {
        .custom-width-container {
            max-width: 1140px; /* أو أقل إذا أردت هوامش أكبر، مثلاً 1000px */
            margin: 0 auto;
        }
    }

    /* =========================================
       1. Newsletter Section (Grey Box)
       ========================================= */
    .newsletter-area-grey {
        background-color: #E6E6E6;
        padding: 50px 0; /* مسافة رأسية جيدة */
    }

    .newsletter-box .icon {
        font-size: 40px; /* أيقونة كبيرة */
        color: #25D06F;
        margin-right: 25px;
        line-height: 1;
        margin-top: 5px;
    }

    .newsletter-box .title {
        color: #001530;
        font-family: 'Oswald', sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 1.25rem;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
    }

    .newsletter-box .desc {
        color: #666;
        font-size: 0.9rem;
        margin: 0;
        line-height: 1.5;
        max-width: 450px; /* تحديد عرض النص ليكون مرتباً */
    }

    /* --- Form Styling (Mobile & Desktop) --- */
    /* الكلاس d-flex في الـ HTML يضمن وجودهم في سطر واحد */
    .form-row-mobile {
        width: 100%;
        background: #fff; /* خلفية بيضاء للحاوية لتوحيد الشكل */
    }

    .newsletter-form-inline .form-control {
        border: none;
        height: 50px;
        border-radius: 0;
        padding-left: 20px;
        font-size: 0.9rem;
        width: 100%; /* يأخذ المساحة المتبقية */
    }
    
    .newsletter-form-inline .form-control:focus {
        box-shadow: none;
    }

    .newsletter-form-inline .btn-signup {
        background-color: #25D06F;
        color: #fff;
        border: none;
        padding: 0 30px; /* مسافة داخلية للزر */
        font-weight: 700;
        font-family: 'Oswald', sans-serif;
        text-transform: uppercase;
        height: 50px;
        cursor: pointer;
        transition: 0.3s;
        white-space: nowrap; /* منع النص من النزول لسطر جديد */
    }
    
    .newsletter-form-inline .btn-signup:hover {
        background-color: #25D06F;
    }

    /* =========================================
       2. Footer Section (Black Box)
       ========================================= */
    .main-footer-black {
        background-color: #000000;
        padding-top: 70px;
        padding-bottom: 30px;
        color: #fff;
    }

    .footer-logo {
        max-width: 220px;
        height: auto;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 12px;
        position: relative;
        padding-left: 15px;
    }

    .footer-links li::before {
        content: "\f105"; /* سهم أيمن */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #25D06F;
        position: absolute;
        left: 0;
        top: 2px;
    }

    .footer-links li a {
        color: #ffffff;
        text-decoration: none;
        font-size: 0.95rem;
        font-weight: 600;
        transition: color 0.3s;
    }
    .footer-links li a:hover {
        color: #25D06F;
    }

    .btn-contact-red {
        display: inline-block;
        background-color: #25D06F;
        color: #fff;
        padding: 14px 40px;
        font-family: 'Oswald', sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        text-decoration: none;
        font-size: 0.95rem;
        transition: 0.3s;
    }
    .btn-contact-red:hover {
        background-color: #fff;
        color: #25D06F;
    }

    .footer-bottom-copyright {
        border-top: 1px solid #333;
        margin-top: 60px;
        padding-top: 20px;
    }

    .copyright {
        font-size: 0.75rem;
        color: #ccc;
        text-transform: uppercase;
        margin: 0;
        text-align: left;
    }

    /* =========================================
       3. Mobile Responsiveness Fixes
       ========================================= */
    @media (max-width: 991px) {
        /* النشرة البريدية */
        .newsletter-box {
            margin-bottom: 25px;
            flex-direction: row; /* التأكد من أن الأيقونة بجانب النص */
            align-items: flex-start;
        }
        
        /* إجبار الزر وحقل الإدخال ليكونوا في سطر واحد في الموبايل */
        .form-row-mobile {
            display: flex !important;
            flex-direction: row !important; /* صف واحد */
            width: 100%;
        }
        
        .newsletter-form-inline .form-control {
            flex-grow: 1; /* الحقل يأخذ المساحة المتاحة */
            width: auto;
            border: 1px solid #ddd; /* إضافة حدود لتظهر بوضوح في الموبايل */
        }
        
        .newsletter-form-inline .btn-signup {
            flex-shrink: 0; /* الزر لا يتقلص */
            width: auto;
            padding: 0 15px; /* تقليل المسافة الداخلية قليلاً في الشاشات الصغيرة */
            font-size: 0.9rem;
        }

        /* الفوتر */
        .footer-logo {
            margin-bottom: 40px;
            max-width: 180px;
        }
        .btn-contact-red {
            width: 100%;
            margin-top: 30px;
            text-align: center;
        }
        .copyright {
            text-align: center;
        }
        
        /* محاذاة العناصر في الوسط للموبايل */
        .footer-widgets .text-lg-left, 
        .footer-widgets .text-lg-right {
            text-align: center !important;
        }
        
        /* في الموبايل، نجعل الروابط (أعمدة 6) محاذية لليسار قليلاً لتبدو مرتبة */
        .footer-links {
            text-align: left;
            display: inline-block;
        }
    }
</style>

        @if ($bex->is_shop == 1 && $bex->catalog_mode == 0)
            <div id="cartIconWrapper">
                <a class="d-block" id="cartIcon" href="{{route('front.cart')}}">
                    <div class="cart-length">
                        <i class="fas fa-cart-plus"></i>
                        <span class="length">{{cartLength()}} {{__('ITEMS')}}</span>
                    </div>
                    <div class="cart-total">
                        {{$bex->base_currency_symbol_position == 'left' ? $bex->base_currency_symbol : ''}}
                        {{cartTotal()}}
                        {{$bex->base_currency_symbol_position == 'right' ? $bex->base_currency_symbol : ''}}
                    </div>
                </a>
            </div>
        @endif


    <!--====== PRELOADER PART START ======-->
    @if ($bex->preloader_status == 1)
    <div id="preloader">
        <div class="loader revolve">
            <img src="{{asset('assets/front/img/' . $bex->preloader)}}" alt="">
        </div>
    </div>
    @endif
    <!--====== PRELOADER PART ENDS ======-->

    <!--Scroll-up-->
    <a id="scroll_up" ><i class="fas fa-angle-up"></i></a>

    {{-- WhatsApp Chat Button --}}
    <div id="WAButton"></div>


    {{-- Cookie alert dialog start --}}
    @if ($be->cookie_alert_status == 1)
    @include('cookieConsent::index')
    @endif
    {{-- Cookie alert dialog end --}}

    {{-- Popups start --}}
    @includeIf('front.partials.popups')
    {{-- Popups end --}}

      @php
        $mainbs = [];
        $mainbs = json_encode($mainbs);
      @endphp
      <script>
        var mainbs = {!! $mainbs !!};
        var mainurl = "{{url('/')}}";
        var vap_pub_key = "{{env('VAPID_PUBLIC_KEY')}}";

        var rtl = {{ $rtl }};
      </script>
      <!-- popper js -->
      <script src="{{asset('assets/front/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
      <!-- Plugin js -->
      <script src="{{asset('assets/front/js/plugin.min.js')}}"></script>

      <!-- main js -->
      <script src="{{asset('assets/front/js/gym-main.js')}}"></script>
      <!-- pagebuilder custom js -->
      <script src="{{asset('assets/front/js/common-main.js')}}"></script>

      {{-- whatsapp init code --}}
      @if ($bex->is_whatsapp == 1)
        <script type="text/javascript">
            var whatsapp_popup = {{$bex->whatsapp_popup}};
            var whatsappImg = "{{asset('assets/front/img/whatsapp.svg')}}";
            $(function () {
                $('#WAButton').floatingWhatsApp({
                    phone: "{{$bex->whatsapp_number}}", //WhatsApp Business phone number
                    headerTitle: "{{$bex->whatsapp_header_title}}", //Popup Title
                    popupMessage: `{!! nl2br($bex->whatsapp_popup_message) !!}`, //Popup Message
                    showPopup: whatsapp_popup == 1 ? true : false, //Enables popup display
                    buttonImage: '<img src="' + whatsappImg + '" />', //Button Image
                    position: "right" //Position: left | right

                });
            });
        </script>
      @endif

      @yield('scripts')

      @if (session()->has('success'))
      <script>
         toastr["success"]("{{__(session('success'))}}");
      </script>
      @endif

      @if (session()->has('error'))
      <script>
         toastr["error"]("{{__(session('error'))}}");
      </script>
      @endif

      <!--Start of subscribe functionality-->
      <script>
        $(document).ready(function() {
          $("#subscribeForm, #footerSubscribeForm").on('submit', function(e) {
            // console.log($(this).attr('id'));

            e.preventDefault();

            let formId = $(this).attr('id');
            let fd = new FormData(document.getElementById(formId));
            let $this = $(this);

            $.ajax({
              url: $(this).attr('action'),
              type: $(this).attr('method'),
              data: fd,
              contentType: false,
              processData: false,
              success: function(data) {
                // console.log(data);
                if ((data.errors)) {
                  $this.find(".err-email").html(data.errors.email[0]);
                } else {
                  toastr["success"]("You are subscribed successfully!");
                  $this.trigger('reset');
                  $this.find(".err-email").html('');
                }
              }
            });
          });

            // lory slider responsive
            $(".gjs-lory-frame").each(function() {
                let id = $(this).parent().attr('id');
                $("#"+id).attr('style', 'width: 100% !important');
            });
        });
      </script>
      <!--End of subscribe functionality-->

      <!--Start of Tawk.to script-->
      @if ($bs->is_tawkto == 1)
      {!! $bs->tawk_to_script !!}
      @endif
      <!--End of Tawk.to script-->

      <!--Start of AddThis script-->
      @if ($bs->is_addthis == 1)
      {!! $bs->addthis_script !!}
      @endif
      <!--End of AddThis script-->
   </body>
</html>
