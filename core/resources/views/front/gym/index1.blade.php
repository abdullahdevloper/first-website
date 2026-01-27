@extends('front.gym.layout')

@section('meta-keywords', "$be->home_meta_keywords")
@section('meta-description', "$be->home_meta_description")


@section('content')
    @if ($bs->home_version == 'static')
        @includeif('front.gym.partials.static')
    @elseif ($bs->home_version == 'slider')
        @includeif('front.gym.partials.slider')
    @elseif ($bs->home_version == 'video')
        @includeif('front.gym.partials.video')
    @elseif ($bs->home_version == 'particles')
        @includeif('front.gym.partials.particles')
    @elseif ($bs->home_version == 'water')
        @includeif('front.gym.partials.water')
    @elseif ($bs->home_version == 'parallax')
        @includeif('front.gym.partials.parallax')
    @endif
    <!--   hero area end    -->



    <!-- Start finlance_feature section -->
    {{-- @if ($bs->feature_section == 1)
        <section class="finlance_feature feature_v1">
            <div class="container-fluid">
                <div class="row no-gutters">
                    @foreach ($features as $key => $feature)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="grid_item text-center" style="background-color: #{{ $feature->color }};">
                                <div class="grid_inner_item">
                                    <div class="finlance_icon">
                                        <i class="{{ $feature->icon }}"></i>
                                    </div>
                                    <div class="finlance_content">
                                        <h3>{{ $feature->title }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif --}}


    <style>
        /* تنسيقات القسم العامة والخلفية */
        .modern-showroom-section {
            background-image: url('{{ asset('assets/front/img/product/featured/' . $products[0]->feature_image) }}');

            position: relative;
            padding: 80px 0;
            /* يفضل استبدال الرابط أدناه بصورة المصنع الداكنة الموجودة لديك */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* طبقة تعتيم فوق الخلفية */
        .modern-showroom-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            /* درجة التعتيم */
            z-index: 1;
        }

        .modern-showroom-section .container {
            position: relative;
            z-index: 2;
        }

        /* تنسيقات العناوين */
        .section-subtitle {
            color: #25D06F;
            /* اللون الأحمر */
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.2rem;
            margin-bottom: 10px;
            display: block;
        }

        .section-title {
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 24px;
            margin-bottom: 50px;
            font-family: 'IBM Plex Sans Arabic', sans-serif;
            /* خط مقترح للعناوين الضخمة */
        }

        /* تنسيقات بطاقة المنتج */
        .product-card-redesign {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 0 10px;
            /* مسافة بين الكروت */
        }

        .product-card-redesign:hover {
            transform: translateY(-5px);
        }

        .product-card-redesign .image-box {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .product-card-redesign .image-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .product-card-redesign h4 {
            color: #001530;
            /* لون كحلي غامق للنصوص */
            font-weight: 700;
            text-transform: uppercase;
            font-size: 1.1rem;
            margin: 0;
        }

        /* أزرار التنقل (الأسهم الحمراء) */
        .custom-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background-color: #25D06F;
            color: white;
            border: none;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            transition: background 0.3s;
        }

        .custom-nav-btn:hover {
            background-color: #25D06F;
        }

        .custom-prev {
            left: -60px;
        }

        .custom-next {
            right: -60px;
        }

        /* تعديل وضعية الأسهم للشاشات الصغيرة */
        @media (max-width: 991px) {
            .custom-prev {
                left: 0;
            }

            .custom-next {
                right: 0;
            }

            .slider-wrapper {
                padding: 0 40px;
            }
        }
    </style>

    <section class="modern-showroom-section">
        <div class="container">

            {{-- قسم العناوين في المنتصف --}}
            <div class="text-center">
                @php
                    $productSubtitleBlocks = array_map('trim', explode('#', convertUtf8($be->product_subtitle)));
                @endphp

                {{-- العنوان الفرعي الأحمر: OUR PRODUCTS --}}
                <span class="section-subtitle">{{ convertUtf8($be->product_title) }}</span>

                {{-- العنوان الرئيسي الأبيض: THE REFLECTION OF PERFECTION --}}
                <h2 class="section-title">
                    {{ $productSubtitleBlocks[0] ?? '' }}
                </h2>
            </div>

            {{-- سلايدر المنتجات --}}
            <div class="slider-wrapper position-relative">

                <div id="modernProductSlider" class="product-showcase-slider owl-carousel">
                    @foreach ($products as $product)
                        <div class="showcase-item">
                            <div class="product-card-redesign shadow-sm">
                                <a href="{{ route('front.product.details', $product->slug) }}" class="text-decoration-none">
                                    <div class="image-box">
                                        <img src="{{ asset('assets/front/img/product/featured/' . $product->feature_image) }}"
                                            alt="{{ $product->title }}">
                                    </div>
                                    <h4>{{ $product->title }}</h4>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($products as $product)
                        <div class="showcase-item">
                            <div class="product-card-redesign shadow-sm">
                                <a href="{{ route('front.product.details', $product->slug) }}" class="text-decoration-none">
                                    <div class="image-box">
                                        <img src="{{ asset('assets/front/img/product/featured/' . $product->feature_image) }}"
                                            alt="{{ $product->title }}">
                                    </div>
                                    <h4>{{ $product->title }}</h4>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- أزرار التحكم --}}
                <button class="custom-nav-btn custom-prev"><i class="fas fa-chevron-left"></i></button>
                <button class="custom-nav-btn custom-next"><i class="fas fa-chevron-right"></i></button>

            </div>

        </div>
    </section>


    <!-- Start finlance_about section -->
    @if ($bs->intro_section == 1)
        {{-- <section class="finlance_about about_v1 gray_bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="finlance_box_img">
                            <div class="finlance_img">
                                <img data-src="{{ asset('assets/front/img/' . $bs->intro_bg) }}" class="img-fluid lazy"
                                    alt="">
                            </div>
                            <div class="play_box">
                                <a href="{{ $bs->intro_section_video_link }}" class="play_btn"><i
                                        class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="finlance_content_box">
                            <div class="section_title">
                                <span>{{ convertUtf8($bs->intro_section_title) }}</span>
                                <h2>{{ convertUtf8($bs->intro_section_text) }}</h2>
                                <span class="line-circle"></span>
                            </div>
                            @if (!empty($bs->intro_section_button_url) && !empty($bs->intro_section_button_text))
                                <div class="button_box">
                                    <a href="{{ $bs->intro_section_button_url }}" class="finlance_btn"
                                        target="_blank">{{ convertUtf8($bs->intro_section_button_text) }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        {{-- new rejected design --}}
        <style>
            /* =========================================
               تنسيقات الشاشات الكبيرة (Desktop)
               ========================================= */
            .about-corporate-section-redesign {
                padding: 80px 0;
                background-color: #fff;
            }

            .identity-label-red {
                color: #25D06F;
                /* أحمر */
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-size: 1rem;
                display: block;
                margin-bottom: 15px;
                font-family: sans-serif;
            }

            .main-heading-dark {
                color: #001530;
                /* كحلي غامق */
                font-weight: 800;
                text-transform: uppercase;
                font-size: 2.2rem;
                line-height: 1.2;
                margin-bottom: 25px;
                font-family: 'Oswald', sans-serif;
                /* يفضل خط Oswald أو Impact */
            }

            .company-brief-text {
                color: #6c757d;
                /* رمادي */
                font-size: 1rem;
                line-height: 1.6;
                margin-bottom: 35px;
                text-align: justify;
                /* في الديسكتوب يمكن تركه justify أو تغييره */
            }

            /* تنسيق الزر الأساسي */
            .btn-outline-red {
                display: inline-block;
                padding: 12px 40px;
                /* عرض مريح للنص */
                background-color: transparent;
                border: 2px solid #25D06F;
                /* إطار أحمر */
                color: #25D06F;
                font-weight: 800;
                text-transform: uppercase;
                font-size: 0.9rem;
                transition: all 0.3s ease;
                text-decoration: none;
                letter-spacing: 0.5px;
                text-align: center;
                min-width: 180px;
                /* لضمان عرض مناسب للزر */
            }

            .btn-outline-red:hover {
                background-color: #25D06F;
                color: #fff;
                text-decoration: none;
            }

            /* تنسيقات الفيديو (للشاشات الكبيرة فقط) */
            .video-wrapper {
                position: relative;
                width: 100%;
                height: 100%;
                min-height: 350px;
                background-color: #000;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
            }

            .video-cover-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                opacity: 0.8;
            }

            .play-icon-centered {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 3rem;
                color: #25D06F;
                background: #fff;
                border-radius: 50%;
                width: 70px;
                height: 70px;
                display: flex;
                align-items: center;
                justify-content: center;
                padding-left: 5px;
            }

            /* =========================================
               تنسيقات وضع الهاتف (Mobile View) - مطابق للصورة
               ========================================= */
            @media (max-width: 991px) {
                .about-corporate-section-redesign {
                    padding: 40px 0;
                    /* تقليل الحاشية العلوية والسفلية */
                }

                /* 1. ضبط محاذاة النصوص لليسار كما في الصورة */
                .about-info-content {
                    text-align: left !important;
                    padding-right: 0;
                }

                .identity-label-red {
                    font-size: 0.9rem;
                    margin-bottom: 10px;
                }

                /* 2. تكبير العنوان وضبط المسافات */
                .main-heading-dark {
                    font-size: 1.8rem;
                    /* حجم كبير وواضح */
                    line-height: 1.3;
                    margin-bottom: 20px;
                }

                /* 3. النص الوصفي: إلغاء Justify ليكون Ragged Right مثل الصورة */
                .company-brief-text {
                    text-align: left;
                    font-size: 0.95rem;
                    color: #777;
                    /* تفتيح اللون قليلاً ليطابق الرمادي في الصورة */
                    margin-bottom: 30px;
                }

                /* 4. الزر: ضبط الحجم ليكون مستطيل واضح */
                .btn-outline-red {
                    padding: 14px 30px;
                    font-size: 0.85rem;
                    width: auto;
                    /* ليس كامل العرض، بل حسب المحتوى */
                    display: inline-block;
                }
            }
        </style>

        <section class="about-corporate-section-redesign">
            <div class="container">
                <div class="row align-items-center">

                    @php
                        $introSectionTextBlocks = array_map('trim', explode('#', convertUtf8($bs->intro_section_text)));
                    @endphp

                    <div class="col-lg-6">
                        <div class="about-info-content">

                            {{-- العنوان الفرعي --}}
                            <span class="identity-label-red">{{ convertUtf8($bs->intro_section_title) }}</span>

                            {{-- العنوان الرئيسي --}}
                            <h2 class="main-heading-dark">{{ $introSectionTextBlocks[0] ?? '' }}</h2>

                            {{-- النص --}}
                            <p class="company-brief-text">
                                FIRST has earned an outstanding reputation as a trusted automotive parts manufacturer and
                                supplier for consistently delivering high-quality products. With over two decades of
                                excellence, FIRST offers an extensive range of components, including brake pads, brake
                                shoes, brake discs, fuel pumps, brake fluids, horns, and shock absorbers. Recognized among
                                the leading automotive component manufacturers and auto parts distributors, FIRST products
                                are now sold in over 80 countries worldwide.
                            </p>

                            {{-- الزر --}}
                            @if (!empty($bs->intro_section_button_url) && !empty($bs->intro_section_button_text))
                                <div class="about-action-area">
                                    <a href="{{ $bs->intro_section_button_url }}" class="btn-outline-red">
                                        {{ convertUtf8($bs->intro_section_button_text) }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- الفيديو مخفي في الجوال (d-none) ويظهر في الشاشات الكبيرة (d-lg-block) --}}
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="video-wrapper">
                            <img src="{{ asset('assets/front/img/' . $bs->intro_bg) }}" class="video-cover-img"
                                alt="">
                            <a href="{{ $bs->intro_section_video_link }}" class="play_btn play-icon-centered"
                                target="_blank">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif
    <!-- End finlance_about section -->

    <style>
        /* =========================================
               تنسيقات القسم الخلفية والمحتوى
               ========================================= */
        .quality-assurance-section {
            position: relative;
            /* ضع مسار صورتك هنا */
            background-image: url('{{ asset('assets/front/img/product/featured/' . $products[0]->feature_image) }}');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            /* هذه الخاصية تجعل الخلفية ثابتة أثناء التمرير (تأثير فاخر) اختياري */
            background-attachment: fixed;
            padding: 120px 0;
            /* مساحة كبيرة كما في الصورة */
            text-align: center;
            color: #fff;
        }

        /* طبقة التعتيم السوداء (Overlay) */
        .quality-assurance-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* درجة التعتيم 0.85 لتكون داكنة جداً مثل الصورة */
            background: rgba(0, 0, 0, 0.85);
            z-index: 1;
        }

        .quality-assurance-section .container {
            position: relative;
            z-index: 2;
        }

        /* 1. العنوان الفرعي الأحمر */
        .quality-subtitle {
            color: #25D06F;
            /* نفس درجة الأحمر في الصورة */
            font-weight: 700;
            text-transform: uppercase;
            font-size: 1.1rem;
            letter-spacing: 1px;
            margin-bottom: 10px;
            display: block;
            font-family: sans-serif;
        }

        /* 2. العنوان الرئيسي الأبيض */
        .quality-title {
            color: #ffffff;
            font-weight: 800;
            text-transform: uppercase;
            font-size: 3.5rem;
            /* حجم ضخم للديسكتوب */
            line-height: 1.1;
            margin-bottom: 30px;
            font-family: 'Oswald', sans-serif;
            /* يفضل استخدام خط Oswald */
        }

        /* 3. النص الوصفي */
        .quality-desc {
            color: #e0e0e0;
            /* أبيض مائل للرمادي قليلاً */
            font-size: 1.15rem;
            line-height: 1.6;
            margin: 0 auto 50px auto;
            max-width: 900px;
            /* عرض مناسب للقراءة */
        }

        /* 4. الزر الأحمر */
        .btn-solid-red {
            display: inline-block;
            background-color: #25D06F;
            color: #fff;
            padding: 18px 50px;
            /* زر كبير وضخم */
            font-weight: 800;
            text-transform: uppercase;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            letter-spacing: 1px;
        }

        .btn-solid-red:hover {
            background-color: #c41318;
            color: #fff;
            transform: translateY(-2px);
        }

        /* =========================================
               تنسيقات وضع الهاتف (Mobile View)
               ========================================= */
        @media (max-width: 767px) {
            .quality-assurance-section {
                padding: 70px 0;
                background-attachment: scroll;
                /* إلغاء التثبيت في الجوال لتحسين الأداء */
            }

            .quality-subtitle {
                font-size: 0.85rem;
                margin-bottom: 8px;
            }

            .quality-title {
                font-size: 1.8rem;
                /* تصغير العنوان للجوال */
                line-height: 1.2;
                margin-bottom: 20px;
            }

            .quality-desc {
                font-size: 0.95rem;
                line-height: 1.5;
                padding: 0 15px;
                /* حماية النص من الحواف */
                margin-bottom: 30px;
            }

            .btn-solid-red {
                padding: 15px 40px;
                font-size: 0.9rem;
                width: auto;
            }
        }
    </style>

    <section class="quality-assurance-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">

                    {{-- العنوان الفرعي --}}
                    <span class="quality-subtitle">PREMIUM BRAKE PRODUCTS PROVIDER</span>

                    {{-- العنوان الرئيسي --}}
                    <h2 class="quality-title">WE TAKE QUALITY VERY SERIOUSLY</h2>

                    {{-- النص الوصفي --}}
                    <p class="quality-desc">
                        FIRST is committed to providing high-quality products and offers an automotive parts and components
                        for global markets. Our range includes premium brake pads, brake shoes, brake discs, fuel pumps, and
                        shock absorbers. As a reliable automotive parts supplier and distributor, we ensure durable
                        performance tested for every road condition. Trusted by drivers and businesses alike, FIRST stands
                        among the top automotive parts wholesalers in the Middle East and beyond.
                    </p>

                    {{-- الزر --}}
                    <a href="https://first-parts.com/portfolios" class="btn-solid-red">KNOW MORE</a>

                </div>
            </div>
        </div>
    </section>

    <section class="csr-section">
        <div class="container">

            <!-- العنوان الرئيسي -->
            <h2 class="csr-main-title">Corporate Social Responsibility</h2>

            <!-- شبكة العناصر -->
            <div class="csr-grid">

                <!-- العنصر 1 -->
                <div class="csr-item">
                    <div class="icon-box">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <h3 class="item-title">FIRST CARES</h3>
                    <p class="item-desc">
                        Pioneering the well-being of automotive communities worldwide, FIRST goes beyond being just an
                        automotive parts manufacturer by setting new standards in sustainable initiatives for lasting
                        positive impacts.
                    </p>
                </div>

                <!-- العنصر 2 -->
                <div class="csr-item">
                    <div class="icon-box">
                        <i class="fa-solid fa-helmet-safety"></i>
                    </div>
                    <h3 class="item-title">SAFETY FIRST</h3>
                    <p class="item-desc">
                        As a leading automotive component manufacturer, our unwavering commitment to safety ensures reliable
                        auto parts distribution that protects drivers and communities globally.
                    </p>
                </div>

                <!-- العنصر 3 -->
                <div class="csr-item">
                    <div class="icon-box">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <h3 class="item-title">ENVIRONMENT FRIENDLY</h3>
                    <p class="item-desc">
                        Embracing the green business philosophy, our commitment is to actively champion sustainable
                        development, striving to maximize our efforts in promoting environmental responsibility.
                    </p>
                </div>

                <!-- العنصر 4 -->
                <div class="csr-item">
                    <div class="icon-box">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <h3 class="item-title">ENERGY SAVING</h3>
                    <p class="item-desc">
                        Adopting a strategic approach focused on "maximizing resource benefits throughout the entire
                        process," ensuring efficiency and sustainability in our operations.
                    </p>
                </div>

                <!-- العنصر 5 -->
                <div class="csr-item">
                    <div class="icon-box">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <h3 class="item-title">MUTUAL GROWTH</h3>
                    <p class="item-desc">
                        Encouraging the synergistic utilization of resources, cultivate shared value, and collectively
                        achieve common objectives for sustainable growth.
                    </p>
                </div>

            </div>
        </div>
        <style>
            /* =========================================
                   إعدادات عامة (Reset)
                   ========================================= */
            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Open Sans', sans-serif;
                background-color: #f4f4f4;
                /* خلفية للصفحة ككل */
            }

            /* =========================================
                   تنسيقات القسم (CSR Section)
                   ========================================= */
            .csr-section {
                background-color: #ffffff;
                padding: 100px 20px;
                /* مسافة داخلية علوية وسفلية كبيرة */
                width: 100%;
            }

            /* حاوية المحتوى لضبط العرض */
            .container {
                max-width: 1400px;
                /* عرض واسع ليسمح بـ 5 أعمدة */
                margin: 0 auto;
            }

            /* 1. العنوان الرئيسي */
            .csr-main-title {
                text-align: center;
                color: #001530;
                /* اللون الكحلي الغامق */
                font-family: 'Oswald', sans-serif;
                font-size: 2.5rem;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-bottom: 80px;
                /* مسافة كبيرة تفصل العنوان عن العناصر */
            }

            /* 2. الشبكة (Grid System) - 5 أعمدة */
            .csr-grid {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                /* 5 أعمدة متساوية تماماً */
                gap: 30px;
                /* المسافة بين الأعمدة */
                justify-content: center;
            }

            /* 3. العنصر الفردي */
            .csr-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            /* منطقة الأيقونة */
            .icon-box {
                height: 70px;
                /* ارتفاع ثابت لتوحيد المستوى */
                display: flex;
                align-items: flex-end;
                /* جعل الأيقونة في أسفل الصندوق الوهمي */
                margin-bottom: 25px;
            }

            .icon-box i {
                font-size: 50px;
                /* حجم الأيقونة */
                color: #25D06F;
                /* اللون الأحمر */
            }

            /* العنوان الفرعي (الأحمر) */
            .item-title {
                color: #25D06F;
                font-size: 1rem;
                font-weight: 700;
                /* Open Sans Bold */
                text-transform: uppercase;
                margin-bottom: 15px;
                letter-spacing: 0.5px;
            }

            /* النص الوصفي */
            .item-desc {
                color: #555555;
                font-size: 0.9rem;
                /* 14px */
                line-height: 1.6;
                font-weight: 400;
                max-width: 240px;
                /* تحديد العرض لكي تتكسر الأسطر مثل الصورة */
            }

            /* =========================================
                   التجاوب (Responsive Media Queries)
                   ========================================= */

            /* شاشات اللابتوب المتوسطة والتابلت (تحويل لـ 3 أعمدة) */
            @media (max-width: 1200px) {
                .csr-grid {
                    grid-template-columns: repeat(3, 1fr);
                    gap: 50px;
                }
            }

            /* شاشات التابلت الصغيرة (تحويل لعمودين) */
            @media (max-width: 800px) {
                .csr-grid {
                    grid-template-columns: repeat(2, 1fr);
                }

                .csr-main-title {
                    font-size: 2rem;
                    margin-bottom: 50px;
                }
            }

            /* شاشات الجوال (عمود واحد) */
            @media (max-width: 500px) {
                .csr-grid {
                    grid-template-columns: 1fr;
                }

                .item-desc {
                    max-width: 100%;
                    /* استغلال كامل العرض في الجوال */
                    padding: 0 20px;
                }
            }
        </style>

        <!-- استدعاء الخطوط (Oswald للعناوين، Open Sans للنصوص) -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@700&display=swap"
            rel="stylesheet">

        <!-- مكتبة الأيقونات FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </section>


    <!-- End finlance_feature section -->










    {{-- ملاحظة: تأكد من أن مكتبة الـ Carousel (مثل OwlCarousel أو Slick) مهيئة لتعمل مع الكلاسات والأزرار أعلاه --}}



    <!-- Start finlance_project section -->
    {{-- @if ($bs->portfolio_section == 1)
        <section class="premium-products-section">
            <div class="container-fluid p-0">
                <div class="row no-gutters align-items-stretch">

                    <div class="col-lg-4 d-flex align-items-center bg-dark-industrial text-white p-5">
                        <div class="section-info-box" data-aos="fade-left">
                            <span class="badge-accent">{{ convertUtf8($be->product_title) }}</span>
                            <h2 class="display-4 font-weight-bold mb-4">{{ convertUtf8($be->product_subtitle) }}</h2>
                            <p class="lead mb-5 opacity-75">نحن نقدم أجود أنواع قطع الغيار المصممة بدقة لتناسب احتياجاتك،
                                مع ضمان الجودة والأداء العالي.</p>
                            <a href="#" class="cta-button">
                                <span>اكتشف كافة المنتجات</span>
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-8 bg-light-gray p-lg-5 p-3">
                        <div class="row" id="productsMasonry">
                            @foreach ($products->take(6) as $product)
                                <div class="col-md-6 col-xl-4 mb-4">
                                    <div class="modern-product-card" data-aos="zoom-in">
                                        <div class="card-inner">
                                            <div class="product-img-wrapper">
                                                <img src="{{ asset('assets/front/img/product/featured/' . $product->feature_image) }}"
                                                    alt="{{ $product->title }}">
                                            </div>
                                            <div class="product-details">
                                                <span class="category-label">High Quality</span>
                                                <h4>{{ $product->title }}</h4>
                                                <a href="{{ route('front.product.details', $product->slug) }}"
                                                    class="details-link">
                                                    عرض التفاصيل <i class="fas fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <style>
                /* تنسيقات أساسية للقسم */
                .premium-products-section {
                    overflow: hidden;
                    background: #f4f7f6;
                }

                .bg-dark-industrial {
                    background: linear-gradient(135deg, #0b1e48 0%, #050d1f 100%);
                    position: relative;
                    min-height: 500px;
                }

                /* شارة التميز */
                .badge-accent {
                    background: #25D06F;
                    color: #fff;
                    padding: 6px 15px;
                    font-weight: 700;
                    text-transform: uppercase;
                    display: inline-block;
                    margin-bottom: 20px;
                    border-radius: 4px;
                    font-size: 0.9rem;
                }

                /* زر الحركة (CTA) */
                .cta-button {
                    display: inline-flex;
                    align-items: center;
                    color: #fff;
                    text-decoration: none;
                    border: 2px solid #25D06F;
                    padding: 12px 30px;
                    font-weight: 700;
                    transition: 0.4s;
                }

                .cta-button i {
                    margin-right: 15px;
                    transition: 0.4s;
                }

                .cta-button:hover {
                    background: #25D06F;
                    color: #fff;
                    text-decoration: none;
                }

                .cta-button:hover i {
                    transform: translateX(-10px);
                }

                /* بطاقة المنتج الحديثة */
                .modern-product-card {
                    height: 100%;
                }

                .card-inner {
                    background: #fff;
                    border-radius: 20px;
                    padding: 25px;
                    height: 100%;
                    position: relative;
                    transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
                    border: 1px solid rgba(0, 0, 0, 0.05);
                }

                .product-img-wrapper {
                    height: 180px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 20px;
                    transition: 0.5s;
                }

                .product-img-wrapper img {
                    max-width: 100%;
                    max-height: 100%;
                    object-fit: contain;
                }

                .category-label {
                    font-size: 0.75rem;
                    color: #25D06F;
                    font-weight: 700;
                    text-transform: uppercase;
                }

                .modern-product-card h4 {
                    font-size: 1.2rem;
                    color: #0b1e48;
                    margin: 10px 0 15px;
                    font-weight: 800;
                }

                .details-link {
                    color: #888;
                    font-weight: 600;
                    font-size: 0.9rem;
                    text-decoration: none;
                    transition: 0.3s;
                }

                /* تأثيرات التمرير (Hover) */
                .modern-product-card:hover .card-inner {
                    transform: translateY(-10px);
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
                    border-color: #25D06F;
                }

                .modern-product-card:hover .product-img-wrapper {
                    transform: scale(1.05);
                }

                .modern-product-card:hover .details-link {
                    color: #25D06F;
                }

                /* الجوال */
                @media (max-width: 991px) {
                    .bg-dark-industrial {
                        padding: 60px 20px !important;
                        text-align: center;
                    }

                    .cta-button {
                        margin-bottom: 30px;
                    }
                }
            </style>
        </section>


    @endif --}}


    <!-- End finlance_project section -->



    <!-- Start finlance_blog section -->
    @if ($bs->news_section == 1)
        <section class="modern-blog-section pt-20 pb-120">

            <div class="container">
                {{-- رأس القسم بتصميم احترافي --}}
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center ">
                        <div class="section-title-wrapper">
                            <span class="sub-title">{{ 'FIRST Updates' }}</span>
                            <div class="title-line"></div>
                        </div>
                    </div>
                </div>

                <div class="blog-static-grid">
                    <div class="row justify-content-center">

                        {{-- عرض أول 3 مقالات فقط --}}
                        @foreach ($blogs->take(3) as $key => $blog)
                            <div class="col-lg-4 col-md-6 col-12 mb-4">

                                {{-- بطاقة المدونة (نفس التصميم السابق) --}}
                                <div class="blog-card h-100"> {{-- h-100 لتوحيد الارتفاع --}}

                                    <div class="blog-img">
                                        <a href="{{ route('front.blogdetails', [$blog->slug, $blog->id]) }}">
                                            <img src="{{ asset('assets/front/img/blogs/' . $blog->main_image) }}"
                                                class="img-fluid w-100" alt="{{ $blog->title }}">
                                        </a>

                                        {{-- التاريخ (إذا كنت تريد إظهاره كما كان) --}}
                                      
                                    </div>

                                    <div class="blog-content">

                                   

                                        <h3 class="blog-title">
                                            <a href="{{ route('front.blogdetails', [$blog->slug, $blog->id]) }}">
                                                {{ strlen($blog->title) > 50 ? mb_substr($blog->title, 0, 50, 'utf-8') . '...' : $blog->title }}
                                            </a>
                                        </h3>

                                        {{-- المقتطف (اختياري، تمت إزالته لتبسيط الشكل كما طلبت، أو يمكنك إعادته) --}}

                                        <a href="{{ route('front.blogdetails', [$blog->slug, $blog->id]) }}"
                                            class="read-more-btn mt-3">
                                            {{ __('Read More') }} <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
            <style>
                .modern-blog-section {
                    position: relative;
                    /* ضروري لتموضع الطبقة المعتمة */
                    /* ضع مسار صورتك هنا */
                    background-image: url('{{ asset('assets/front/img/product/featured/' . $products[0]->feature_image) }}');
                    background-size: cover;
                    /* تغطية كامل المساحة */
                    background-position: center;
                    /* توسيط الصورة */
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    /* (اختياري) لتثبيت الصورة أثناء التمرير */

                    /* الحفاظ على المسافات القديمة */
                    padding-top: 40px;
                    padding-bottom: 40px;
                }

                /* 2. طبقة التعتيم (Overlay) */
                .modern-blog-section::before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.7);
                    /* لون أسود بنسبة شفافية 70% */
                    z-index: 1;
                }

                /* 3. رفع المحتوى فوق طبقة التعتيم */
                .modern-blog-section .container {
                    position: relative;
                    z-index: 2;
                    /* لضمان ظهور النصوص والكروت فوق الخلفية السوداء */
                }

                /* -----------------------------------------------------------
               باقي التنسيقات تبقى كما هي تماماً،
               فقط سنعدل لون "العنوان الرئيسي" ليصبح أبيض ليظهر فوق الخلفية الداكنة
            ----------------------------------------------------------- */

                /* تعديل لون العنوان الرئيسي للأبيض */
                .section-title-wrapper .main-title {
                    font-size: 2.5rem;
                    font-weight: 800;
                    color: #ffffff;
                    /* تم التغيير للأبيض */
                    margin-bottom: 20px;
                }

                .modern-blog-section {
                    background-color: #f8f9fa;
                }

                /* تصميم رأس القسم */
                .section-title-wrapper .sub-title {
                    color: #25D06F;
                    text-transform: uppercase;
                    font-weight: 700;
                    letter-spacing: 2px;
                    display: block;
                    margin-bottom: 10px;
                }

                .section-title-wrapper .main-title {
                    font-size: 2.5rem;
                    font-weight: 800;
                    color: #0b1e48;
                    margin-bottom: 20px;
                }

                .title-line {
                    width: 70px;
                    height: 4px;
                    background: #25D06F;
                    margin: 0 auto;
                    border-radius: 2px;
                }

                /* تصميم البطاقة */
                .blog-card {
                    background: #fff;
                    border-radius: 15px;
                    overflow: hidden;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                    transition: all 0.4s ease;
                    margin: 15px;
                    height: 100%;
                    border: 1px solid #eee;
                }

                .blog-card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
                }

                .blog-img {
                    position: relative;
                    overflow: hidden;
                    height: 220px;
                }

                .blog-img img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    transition: transform 0.6s ease;
                }

                .blog-card:hover .blog-img img {
                    transform: scale(1.1);
                }

                /* شارة التاريخ */
                .blog-date-badge {
                    position: absolute;
                    bottom: 15px;
                    right: 15px;
                    background: #25D06F;
                    color: #fff;
                    padding: 10px;
                    border-radius: 8px;
                    text-align: center;
                    line-height: 1;
                    min-width: 50px;
                }

                .blog-date-badge span {
                    display: block;
                    font-size: 1.2rem;
                    font-weight: 700;
                }

                .blog-date-badge small {
                    text-transform: uppercase;
                    font-size: 0.7rem;
                }

                /* محتوى البطاقة */
                .blog-content {
                    padding: 25px;
                }

                .blog-meta {
                    margin-bottom: 15px;
                    font-size: 0.85rem;
                    color: #777;
                }

                .blog-meta span {
                    margin-right: 15px;
                }

                .blog-meta i {
                    color: #25D06F;
                    margin-right: 5px;
                }

                .blog-title {
                    font-size: 1.25rem;
                    font-weight: 700;
                    margin-bottom: 15px;
                    line-height: 1.4;
                }

                .blog-title a {
                    color: #0b1e48;
                    text-decoration: none;
                    transition: 0.3s;
                }

                .blog-title a:hover {
                    color: #25D06F;
                }

                .blog-excerpt {
                    color: #666;
                    font-size: 0.95rem;
                    line-height: 1.6;
                    margin-bottom: 20px;
                }

                /* زر اقرأ المزيد */
                .read-more-btn {
                    color: #0b1e48;
                    font-weight: 700;
                    text-transform: uppercase;
                    font-size: 0.85rem;
                    text-decoration: none;
                    display: inline-flex;
                    align-items: center;
                    transition: 0.3s;
                }

                .read-more-btn i {
                    margin-left: 8px;
                    transition: 0.3s;
                }

                .read-more-btn:hover {
                    color: #25D06F;
                }

                .read-more-btn:hover i {
                    transform: translateX(5px);
                }

                /* استجابة الجوال */
                @media (max-width: 768px) {
                    .section-title-wrapper .main-title {
                        font-size: 1.8rem;
                    }
                }
            </style>
        </section>

    @endif
    <!-- End finlance_blog section -->

@endsection
