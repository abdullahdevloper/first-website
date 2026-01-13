		<!-- Start finlance_banner section -->
		<section class="finlance_banner banner_v1">
			<div class="hero_slide_v1">
                @if (!empty($sliders))
                    @foreach ($sliders as $key => $slider)
                        @php
                            $heroOc = empty($be->hero_overlay_color) ? '0A0137' : $be->hero_overlay_color;
                            $rgb = hex2rgb($heroOc);
                            $bgColor = "rgba(" . $rgb['red'] . "," . $rgb['green'] . "," . $rgb['blue'] . "," . $be->hero_overlay_opacity . ")";
                        @endphp
                        <div class="single_slider bg_image lazy" data-bg="{{asset('assets/front/img/sliders/'.$slider->image)}}" style="background-color: {{$bgColor}};">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner_content text-center">
                                            <p data-animation="fadeInUp" data-delay=".1s" style="font-size: {{$slider->title_font_size}}px"><span>{{$slider->title}}</span></p>
                                            <h1 data-animation="fadeInUp" data-delay=".2s" style="font-size: {{$slider->bold_text_font_size}}px">{{$slider->bold_text}}</h1>
                                            <h2 data-animation="fadeInUp" data-delay=".3s" style="font-size: {{$slider->text_font_size}}px">{{$slider->text}}</h2>
                                            @if (!empty($slider->button_url) && !empty($slider->button_text))
                                                <a href="{{$slider->button_url}}" class="finlance_btn" data-animation="fadeInUp" data-delay=".4s" style="font-size: {{$slider->button_text_font_size}}px">{{$slider->button_text}}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
			</div>
		</section>
		<!-- End finlance_banner section -->
{{-- <!-- Start finlance_banner section -->
  <section class="identity-hero-section">
      <div class="hero-slider-active">
          @foreach ($sliders as $slider)
              <div class="single-hero-item">
                  <div class="hero-bg-img"
                      style="background-image: url('{{ asset('assets/front/img/sliders/' . $slider->image) }}');"></div>
                  <div class="hero-overlay-layer"></div>

                  <div class="container hero-z-index" style="padding-top: 200px !important">
                      <div class="row align-items-center">
                          <div class="col-lg-8 col-md-10">
                              <div class="hero-main-content">
                                  <span class="hero-tagline" data-animation="fadeInDown"
                                      data-delay=".2s">{{ $slider->title }}</span>
                                  <h1 class="hero-bold-title" data-animation="fadeInUp" data-delay=".4s">
                                      {{ $slider->bold_text }}</h1>
                                  <p class="hero-short-desc" data-animation="fadeInUp" data-delay=".6s">
                                      {{ $slider->text }}</p>
                                  @if (!empty($slider->button_url))
                                      <div class="hero-btn-group" data-animation="zoomIn" data-delay=".8s">
                                          <a href="{{ $slider->button_url }}"
                                              class="primary-identity-btn">{{ $slider->button_text }}</a>
                                      </div>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
        <style>
        /* الألوان الأساسية */
        :root {
            --primary: #25D06F;
            --secondary: #0A3041;
            --white: #ffffff;
        }

        /* 1. تنسيق الهيدر */
        .site-main-header {
            width: 100%;
            z-index: 1000;
            background: var(--white);
            position: relative;
            /* يضمن عدم تداخل العناصر أسفله */
        }

        .header-top-info {
            background: var(--secondary);
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .top-bar-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-left a {
            color: var(--white);
            margin-left: 20px;
            font-size: 14px;
            text-decoration: none;
        }

        .header-social {
            display: inline-flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .header-social li a {
            color: var(--white);
            margin-right: 15px;
            font-size: 14px;
        }

        .header-nav-area {
            padding: 15px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .nav-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .site-logo img {
            max-height: 60px;
        }

        .main-navigation-menu ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .main-navigation-menu ul li {
            margin-right: 30px;
            position: relative;
        }

        .main-navigation-menu ul li a {
            color: var(--secondary);
            font-weight: 700;
            text-transform: uppercase;
            font-size: 15px;
            transition: 0.3s;
            text-decoration: none;
        }

        .main-navigation-menu ul li a:hover {
            color: var(--primary);
        }

        /* الزر الأساسي */
        .identity-btn,
        .primary-identity-btn {
            background: var(--primary);
            color: var(--secondary) !important;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 800;
            text-decoration: none !important;
            display: inline-block;
            transition: 0.3s;
            border: none;
        }

        /* 2. تنسيق البانر (البداية من أسفل الهيدر مباشرة) */
        .identity-hero-section {
            position: relative;
        }

        .single-hero-item {
            height: calc(100vh - 120px);
            /* يخصم ارتفاع الهيدر لضمان عدم التداخل */
            /* min-height: 600px; */
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero-bg-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        .hero-overlay-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to left, rgba(10, 48, 65, 0.85) 0%, rgba(10, 48, 65, 0.3) 100%);
            z-index: 2;
        }

        .hero-z-index {
            position: relative;
            padding-top: 200px
            z-index: 5;
        }

        .hero-main-content {
            color: var(--white);
            text-align: right;
        }

        .hero-tagline {
            color: var(--primary);
            font-weight: 700;
            letter-spacing: 2px;
            display: block;
            margin-bottom: 15px;
        }

        .hero-bold-title {
            font-size: 4.5rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero-short-desc {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 40px;
            max-width: 700px;
        }

        /* 3. نسخة الجوال المحترفة */
        @media (max-width: 991px) {
            .header-top-info {
                display: none;
            }

            .hero-bold-title {
                font-size: 2.5rem;
            }

            .single-hero-item {
                height: 80vh;
            }

            .hero-main-content {
                text-align: center;
                background: rgba(10, 48, 65, 0.7);
                padding: 40px 20px;
                border-radius: 20px;
                backdrop-filter: blur(5px);
            }

            .hero-short-desc {
                margin: 0 auto 30px;
            }
        }

/* نطبق هذا التعديل على كلاس البانر الجديد الذي صممناه */
.identity-hero-section .single-hero-slide {
    padding-top: 180px !important; /* ترك مساحة للهيدر في الأعلى */
}
    </style>
  </section>

  <!-- End finlance_banner section --> --}}


  