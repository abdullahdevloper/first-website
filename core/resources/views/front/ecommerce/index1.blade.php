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


    @if ($bs->feature_section == 1)
        <section class="modern-features-section">
            <div class="container">
                <div class="features-wrapper">
                    <div class="row no-gutters">
                        @foreach ($features as $key => $feature)
                            <div class="col-lg-3 col-md-6 border-feature">
                                <div class="single-feature-item">
                                    <div class="feature-icon-box">
                                        <div class="icon-circle">
                                            <i class="{{ $feature->icon }}"></i>
                                        </div>
                                    </div>
                                    @php

                                        $titleBlocks = array_map('trim', explode('#', $feature->title));
                                    @endphp
                                    <div class="feature-text">
                                        <h3>{{ $titleBlocks[0] }}</h3>
                                        <p>{{ $titleBlocks[1] }}</p> {{-- يمكنك استبدالها بوصف من قاعدة البيانات إذا وجد --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <style>
                :root {
                    --primary-green: #25D06F;
                    --deep-navy: #0A3041;
                }

                .modern-features-section {
                    padding: 60px 0;
                    background-color: #fff;
                    margin-top: -50px;
                    /* تداخل بسيط مع القسم السابق لجمالية التصميم */
                    position: relative;
                    z-index: 10;
                }

                .features-wrapper {
                    background: #ffffff;
                    border-radius: 20px;
                    box-shadow: 0 15px 50px rgba(10, 48, 65, 0.08);
                    overflow: hidden;
                    border: 1px solid #f0f0f0;
                }

                .single-feature-item {
                    padding: 40px 30px;
                    text-align: center;
                    transition: all 0.4s ease;
                    height: 100%;
                    position: relative;
                    background: #fff;
                }

                /* أيقونة الميزة */
                .icon-circle {
                    width: 70px;
                    height: 70px;
                    background: rgba(37, 208, 111, 0.1);
                    /* خلفية خضراء شفافة */
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 20px;
                    transition: 0.4s;
                }

                .icon-circle i {
                    font-size: 28px;
                    color: var(--primary-green);
                    transition: 0.4s;
                }

                .feature-text h3 {
                    font-size: 1.15rem;
                    font-weight: 800;
                    color: var(--deep-navy);
                    margin-bottom: 10px;
                }

                .feature-text p {
                    font-size: 0.85rem;
                    color: #777;
                    margin: 0;
                }

                /* تأثير التفاعل (Hover) */
                .single-feature-item:hover {
                    background-color: var(--deep-navy);
                    transform: translateY(-5px);
                }

                .single-feature-item:hover .icon-circle {
                    background: var(--primary-green);
                    transform: rotateY(360deg);
                }

                .single-feature-item:hover .icon-circle i {
                    color: var(--deep-navy);
                }

                .single-feature-item:hover .feature-text h3 {
                    color: #fff;
                }

                .single-feature-item:hover .feature-text p {
                    color: rgba(255, 255, 255, 0.7);
                }

                /* الحدود بين العناصر */
                .border-feature {
                    border-left: 1px solid #f0f0f0;
                }

                .border-feature:last-child {
                    border-left: none;
                }

                /* استجابة الجوال */
                @media (max-width: 991px) {
                    .modern-features-section {
                        margin-top: 0;
                        padding: 40px 0;
                    }

                    .border-feature {
                        border-left: none;
                        border-bottom: 1px solid #f0f0f0;
                    }

                    .border-feature:last-child {
                        border-bottom: none;
                    }
                }
            </style>
        </section>
    @endif

    <!-- End finlance_feature section -->

    @if ($bs->service_section == 1)
        <section class="finlance_service service_v1 pt-115 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section_title text-center">
                            <span>{{ convertUtf8($bs->service_section_title) }}</span>
                            <h2>{{ convertUtf8($bs->service_section_subtitle) }}</h2>
                        </div>
                    </div>
                </div>
                <div class="service_slide service-slick">
                    @if (serviceCategory())
                        @foreach ($scategories as $key => $scat)
                            <div class="grid_item">
                                <div class="grid_inner_item">
                                    @if (!empty($scat->image))
                                        <div class="finlance_img">
                                            <img data-src="{{ asset('assets/front/img/service_category_icons/' . $scat->image) }}"
                                                class="img-fluid lazy" alt="">
                                            <div class="service_overlay">
                                                <div class="button_box">
                                                    <a href="{{ route('front.services', ['category' => $scat->id]) }}"
                                                        class="more_icon"><i class="fas fa-angle-double-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="finlance_content">
                                        <h3><a
                                                href="{{ route('front.services', ['category' => $scat->id]) }}">{{ convertUtf8($scat->name) }}</a>
                                        </h3>
                                    </div>
                                    <div class="summary text-center mt-2">
                                        @if (strlen($scat->short_text) > 112)
                                            {{ mb_substr($scat->short_text, 0, 112, 'utf-8') }}<span
                                                style="display: none;">{{ mb_substr($scat->short_text, 112, null, 'utf-8') }}</span>
                                            <a href="#" class="see-more">{{ __('عرض المزيد') }}...</a>
                                        @else
                                            {{ convertUtf8($scat->short_text) }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @elseif (!serviceCategory())
                        @foreach ($services as $key => $service)
                            <div class="grid_item">
                                <div class="grid_inner_item">
                                    @if (!empty($service->main_image))
                                        <div class="finlance_img">
                                            <img data-src="{{ asset('assets/front/img/services/' . $service->main_image) }}"
                                                class="lazy" alt="service" />
                                            @if ($service->details_page_status == 1)
                                                <div class="service_overlay">
                                                    <div class="button_box">
                                                        <a href="{{ route('front.servicedetails', [$service->slug, $service->id]) }}"
                                                            class="more_icon"><i class="fas fa-angle-double-right"></i></a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="finlance_content">
                                        <h3><a
                                                @if ($service->details_page_status == 1) href="{{ route('front.servicedetails', [$service->slug, $service->id]) }}" @endif>{{ convertUtf8($service->title) }}</a>
                                        </h3>
                                    </div>
                                    <div class="summary text-center mt-2">
                                        @if (strlen($service->summary) > 100)
                                            {{ mb_substr($service->summary, 0, 100, 'utf-8') }}<span
                                                style="display: none;">{{ mb_substr($service->summary, 100, null, 'utf-8') }}</span>
                                            <a href="#" class="see-more">{{ __('عرض المزيد') }}...</a>
                                        @else
                                            {{ convertUtf8($service->summary) }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif
    <!-- End finlance_service section -->


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
        <section class="about-corporate-section pb-20">
            <div class="container">
                <div class="row align-items-center">
                    @php

                        $introSectionTextBlocks = array_map('trim', explode('#', convertUtf8($bs->intro_section_text)));
                    @endphp
                    {{-- الجانب البصري: صورة احترافية مع شارة الخبرة --}}
                    <div class="col-lg-6  mb-lg-0">
                        <div class="about-visual-box">
                            <div class="main-image-wrapper">
                                <img src="{{ asset('assets/front/img/' . $bs->intro_bg) }}" class="img-fluid"
                                    alt="Who We Are">
                                {{-- شارة سنوات الخبرة لتعزيز الثقة فوراً --}}
                                <div class="experience-badge" data-aos="zoom-in">
                                    <span class="number">25+</span>
                                    <span class="text">{{ $introSectionTextBlocks[6] }}</span>
                                </div>
                            </div>
                            {{-- شكل ديكوري خلف الصورة --}}
                            <div class="shape-blob"></div>
                        </div>
                    </div>

                    {{-- الجانب النصي: شرح هوية الشركة --}}
                    <div class="col-lg-6">
                        <div class="about-info-content">
                            <div class="section-title">
                                <span class="identity-label">{{ convertUtf8($bs->intro_section_title) }}</span>
                                <h2 class="main-heading">{{ $introSectionTextBlocks[0] }}</h2>
                            </div>

                            <p class="company-brief">
                                {{ $introSectionTextBlocks[1] }}
                            </p>

                            {{-- مميزات سريعة تشرح "من نحن" --}}
                            <div class="who-we-are-features">
                                <div class="feature-mini-item">
                                    <div class="mini-icon"><i class="fas fa-check-circle"></i></div>
                                    <div class="mini-text">
                                        <h4>{{ $introSectionTextBlocks[2] }}</h4>
                                        <p>{{ $introSectionTextBlocks[3] }}</p>
                                    </div>
                                </div>
                                <div class="feature-mini-item">
                                    <div class="mini-icon"><i class="fas fa-shuttle-van"></i></div>
                                    <div class="mini-text">
                                        <h4>{{ $introSectionTextBlocks[4] }}</h4>
                                        <p>{{ $introSectionTextBlocks[5] }}</p>
                                    </div>
                                </div>
                            </div>

                            @if (!empty($bs->intro_section_button_url) && !empty($bs->intro_section_button_text))
                                <div class="about-action-area">
                                    <a href="{{ $bs->intro_section_button_url }}" class="corporate-btn" target="_blank">
                                        <span>{{ convertUtf8($bs->intro_section_button_text) }}</span>
                                        <i class="fas fa-arrow-left"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <style>
                :root {
                    --primary: #25D06F;
                    --secondary: #0A3041;
                }

                .about-corporate-section {
                    background-color: #ffffff;
                    overflow: hidden;
                }

                /* --- التصميم البصري --- */
                .about-visual-box {
                    position: relative;
                    padding: 30px;
                }

                .main-image-wrapper {
                    position: relative;
                    z-index: 5;
                    border-radius: 20px;
                    overflow: visible;
                }

                .main-image-wrapper img {
                    border-radius: 20px;
                    box-shadow: 0 30px 60px rgba(10, 48, 65, 0.15);
                }

                /* شارة الخبرة */
                .experience-badge {
                    position: absolute;
                    bottom: -20px;
                    right: -20px;
                    background: var(--primary);
                    color: var(--secondary);
                    padding: 25px;
                    border-radius: 20px;
                    text-align: center;
                    box-shadow: 0 15px 30px rgba(37, 208, 111, 0.3);
                    min-width: 150px;
                }

                .experience-badge .number {
                    display: block;
                    font-size: 2.5rem;
                    font-weight: 900;
                    line-height: 1;
                }

                .experience-badge .text {
                    font-size: 0.9rem;
                    font-weight: 700;
                    text-transform: uppercase;
                }

                /* --- المحتوى النصي --- */
                .identity-label {
                    color: var(--primary);
                    font-weight: 800;
                    text-transform: uppercase;
                    letter-spacing: 2px;
                    margin-bottom: 15px;
                    display: block;
                }

                .main-heading {
                    color: var(--secondary);
                    font-size: 2.8rem;
                    font-weight: 900;
                    margin-bottom: 25px;
                    line-height: 1.2;
                }

                .company-brief {
                    font-size: 1.15rem;
                    line-height: 1.8;
                    color: #555;
                    margin-bottom: 40px;
                }

                /* المميزات المصغرة */
                .who-we-are-features {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 25px;
                    margin-top: 30px;
                }

                .feature-mini-item {
                    display: flex;
                    align-items: flex-start;
                    /* الأيقونة بالأعلى بجانب النص */
                    gap: 15px;
                    /* مسافة ذكية بين الأيقونة والنص تتغير حسب الاتجاه */
                    text-align: start;
                    /* سيحاذي لليمين في العربي ولليسار في الإنجليزي تلقائياً */
                }

                .mini-icon {
                    flex-shrink: 0;
                    /* يمنع انكماش الأيقونة */
                    width: 45px;
                    height: 45px;
                    background: rgba(37, 208, 111, 0.1);
                    color: #25D06F;
                    border-radius: 10px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 20px;
                }

                .mini-text h4 {
                    font-size: 1.1rem;
                    font-weight: 800;
                    color: #0A3041;
                    margin-bottom: 5px;
                    line-height: 1.2;
                }

                .mini-text p {
                    font-size: 0.9rem;
                    color: #666;
                    margin: 0;
                    line-height: 1.5;
                }

                /* إصلاحات خاصة عند استخدام لغة LTR (الإنجليزية) */
                [dir="ltr"] .feature-mini-item {
                    text-align: left;
                }

                /* إصلاحات خاصة عند استخدام لغة RTL (العربية) */
                [dir="rtl"] .feature-mini-item {
                    text-align: right;
                }

                /* تحسينات الجوال */
                @media (max-width: 576px) {
                    .who-we-are-features {
                        grid-template-columns: 1fr;
                        /* عرض عمودي في الجوال */
                    }

                    .feature-mini-item {
                        justify-content: flex-start;
                    }
                }


                /* الزر */
                .corporate-btn {
                    background: var(--secondary);
                    color: var(--primary) !important;
                    padding: 18px 45px;
                    border-radius: 50px;
                    font-weight: 800;
                    display: inline-flex;
                    align-items: center;
                    gap: 15px;
                    text-decoration: none !important;
                    transition: 0.4s;
                }

                .corporate-btn:hover {
                    background: var(--primary);
                    color: var(--secondary) !important;
                    transform: translateY(-5px);
                }

                /* --- نسخة الهاتف والتابلت --- */
                @media (max-width: 991px) {
                    .main-heading {
                        font-size: 2.2rem;
                    }

                    .about-visual-box {
                        margin-bottom: 60px;
                    }

                    .experience-badge {
                        right: 10px;
                        bottom: -30px;
                        padding: 15px;
                        min-width: 120px;
                    }

                    .experience-badge .number {
                        font-size: 1.8rem;
                    }
                }

                @media (max-width: 767px) {
                    .about-corporate-section {
                        text-align: center;
                    }

                    .who-we-are-features {
                        grid-template-columns: 1fr;
                        text-align: right;
                    }

                    .main-heading {
                        font-size: 1.8rem;
                    }

                    .corporate-btn {
                        width: 100%;
                        justify-content: center;
                    }

                    .feature-mini-item {
                        justify-content: flex-start;
                    }
                }
            </style>
        </section>

    @endif
    <!-- End finlance_about section -->


    <!-- Start finlance_we_do section -->
    @if ($bs->approach_section == 1)
        <section class="finlance_we_do we_do_v1 pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="finlance_content_box">
                            <div class="section_title">
                                <span>{{ convertUtf8($bs->approach_title) }}</span>
                                <h2>{{ convertUtf8($bs->approach_subtitle) }}</h2>
                                <span class="line-circle"></span>
                            </div>
                            @if (!empty($bs->approach_button_url) && !empty($bs->approach_button_text))
                                <div class="button_box">
                                    <a href="{{ $bs->approach_button_url }}"
                                        class="finlance_btn">{{ convertUtf8($bs->approach_button_text) }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="finlance_icon_box">
                            @foreach ($points as $key => $point)
                                <div class="icon_list d-flex">
                                    <div class="icon">
                                        <i class="{{ $point->icon }}"></i>
                                    </div>
                                    <div class="text">
                                        <h3>{{ convertUtf8($point->title) }}</h3>
                                        <p>
                                            @if (strlen($point->short_text) > 150)
                                                {{ mb_substr($point->short_text, 0, 150, 'utf-8') }}<span
                                                    style="display: none;">{{ mb_substr($point->short_text, 150, null, 'utf-8') }}</span>
                                                <a href="#" class="see-more">{{ __('عرض المزيد') }}...</a>
                                            @else
                                                {{ convertUtf8($point->short_text) }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End finlance_we_do section -->



    <!-- Start finlance_fun section -->
    @if ($bs->statistics_section == 1)
        <section class="modern-statistics-section bg_image"
            style="background-image: url('{{ asset('assets/front/img/' . $be->statistics_bg) }}');"
            id="statisticsSection">

            {{-- طبقة تغطية داكنة لإبراز المحتوى --}}
            <div class="statistics-overlay"></div>

            <div class="container content-relative">
                <div class="row">
                    @foreach ($statistics as $key => $statistic)
                        <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0">
                            <div class="stat-counter-card">
                                <div class="stat-icon-wrapper">
                                    <i class="{{ $statistic->icon }}"></i>
                                </div>
                                <div class="stat-info">
                                    <h2 class="stat-number">
                                        <span class="counter">{{ convertUtf8($statistic->quantity) }}</span><span
                                            class="plus-sign">+</span>
                                    </h2>
                                    <h4 class="stat-title">{{ convertUtf8($statistic->title) }}</h4>
                                </div>
                                {{-- خط ديكوري أسفل كل بطاقة --}}
                                <div class="stat-line"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <style>
                :root {
                    --primary-green: #25D06F;
                    --deep-navy: #0A3041;
                }

                .modern-statistics-section {
                    position: relative;
                    padding: 100px 0;
                    background-size: cover;
                    background-position: center;
                    background-attachment: fixed;
                    /* تأثير Parallax */
                    overflow: hidden;
                }

                .statistics-overlay {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: linear-gradient(135deg, rgba(10, 48, 65, 0.95) 0%, rgba(10, 48, 65, 0.8) 100%);
                    z-index: 1;
                }

                .content-relative {
                    position: relative;
                    z-index: 5;
                }

                /* بطاقة الإحصائيات */
                .stat-counter-card {
                    text-align: center;
                    padding: 20px;
                    transition: transform 0.3s ease;
                }

                .stat-counter-card:hover {
                    transform: translateY(-10px);
                }

                .stat-icon-wrapper {
                    width: 60px;
                    height: 60px;
                    background: rgba(37, 208, 111, 0.1);
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 20px;
                    border: 1px solid rgba(37, 208, 111, 0.3);
                }

                .stat-icon-wrapper i {
                    font-size: 24px;
                    color: var(--primary-green);
                }

                .stat-number {
                    font-size: 3rem;
                    font-weight: 900;
                    color: var(--white);
                    margin-bottom: 10px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    color: #fff;
                }

                .plus-sign {
                    color: var(--primary-green);
                    margin-right: 5px;
                }

                .stat-title {
                    color: rgba(255, 255, 255, 0.7);
                    font-size: 1.1rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                }

                .stat-line {
                    width: 40px;
                    height: 3px;
                    background: var(--primary-green);
                    margin: 15px auto 0;
                    border-radius: 2px;
                    transition: width 0.3s ease;
                }

                .stat-counter-card:hover .stat-line {
                    width: 80px;
                }

                /* --- نسخة الجوال والتابلت --- */
                @media (max-width: 991px) {
                    .modern-statistics-section {
                        padding: 60px 0;
                    }

                    .stat-number {
                        font-size: 2.2rem;
                    }

                    .stat-title {
                        font-size: 0.9rem;
                    }
                }

                @media (max-width: 576px) {

                    /* جعل الإحصائيات تظهر في صفين (2x2) في الجوال بدلاً من صف واحد طويل */
                    .col-6 {
                        flex: 0 0 50%;
                        max-width: 50%;
                    }

                    .stat-counter-card {
                        padding: 10px;
                    }

                    .stat-number {
                        font-size: 1.8rem;
                    }
                }
            </style>
        </section>

    @endif
    <!-- End finlance_fun section -->



    <!-- Start finlance_partner section -->
    @if ($bs->partner_section == 1)
        <section class="finlance_partner partner_v1 pt-125 pb-125">
            <div class="container">
                <div class="partner_slide">
                    @foreach ($partners as $key => $partner)
                        <div class="single_partner">
                            <a href="{{ $partner->url }}" target="_blank"><img
                                    data-src="{{ asset('assets/front/img/partners/' . $partner->image) }}"
                                    class="img-fluid lazy" alt=""></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End finlance_partner section -->

    {{-- start products section --}}
    <section class="modern-showroom-section">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                {{-- الجانب التعريفي --}}
                <div class="col-xl-3 col-lg-4 bg-secondary-identity d-flex align-items-center">
                    <div class="showroom-header p-5">
                        <span class="identity-badge">{{ convertUtf8($be->product_title) }}</span>
                        <h2 class="text-white mt-3 mb-4 display-5">{{ convertUtf8($be->product_subtitle) }}</h2>
                        <p class="text-white-50 mb-5">اكتشف مجموعتنا المختارة من قطع الغيار التي تجمع بين الدقة المتناهية
                            والأداء المستدام.</p>

                    </div>
                </div>

                {{-- جانب المنتجات --}}
                <div class="col-xl-9 col-lg-8 bg-light-surface py-5">
                    <div id="modernProductSlider" class="product-showcase-slider">
                        @foreach ($products as $product)
                            <div class="showcase-item">
                                <div class="luxury-product-card">
                                    <div class="image-box">
                                        <img src="{{ asset('assets/front/img/product/featured/' . $product->feature_image) }}"
                                            alt="{{ $product->title }}">
                                    </div>
                                    <div class="info-box">
                                        <span class="quality-tag">Original Parts</span>
                                        <h4>{{ $product->title }}</h4>
                                        <a href="{{ route('front.product.details', $product->slug) }}"
                                            class="explore-link">
                                            <span>التفاصيل</span>
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-controls">
                        <button class="custom-prev"><i class="fas fa-chevron-right"></i></button>
                        <button class="custom-next"><i class="fas fa-chevron-left"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <style>
            :root {
                --primary-color: #25D06F;
                --secondary-color: #0A3041;
                --light-bg: #F4F7F6;
            }

            .modern-showroom-section {
                overflow: hidden;
                direction: rtl;
            }

            .bg-secondary-identity {
                background-color: var(--secondary-color);
            }

            .bg-light-surface {
                background-color: var(--light-bg);
            }

            /* شارة الهوية */
            .identity-badge {
                background: var(--primary-color);
                color: var(--secondary-color);
                padding: 8px 20px;
                font-weight: 800;
                font-size: 0.85rem;
                border-radius: 50px;
                text-transform: uppercase;
            }

            /* بطاقة المنتج الفاخرة */
            .luxury-product-card {
                background: #ffffff;
                border-radius: 24px;
                padding: 40px 30px;
                margin: 15px;
                transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                border-bottom: 5px solid transparent;
                box-shadow: 0 10px 30px rgba(10, 48, 65, 0.05);
            }

            .luxury-product-card:hover {
                transform: translateY(-15px);
                border-color: var(--primary-color);
                box-shadow: 0 20px 40px rgba(37, 208, 111, 0.15);
            }

            .image-box {
                height: 220px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 30px;
            }

            .image-box img {
                max-width: 100%;
                max-height: 100%;
                object-fit: contain;
                transition: 0.5s;
            }

            .luxury-product-card:hover .image-box img {
                transform: scale(1.1);
            }

            .quality-tag {
                color: var(--primary-color);
                font-weight: 700;
                font-size: 0.8rem;
                display: block;
                margin-bottom: 10px;
            }

            .info-box h4 {
                color: var(--secondary-color);
                font-weight: 800;
                font-size: 1.3rem;
                margin-bottom: 20px;
            }

            .explore-link {
                display: flex;
                align-items: center;
                gap: 10px;
                color: var(--secondary-color);
                text-decoration: none;
                font-weight: 700;
                transition: 0.3s;
            }

            .explore-link:hover {
                color: var(--primary-color);
                text-decoration: none;
            }

            /* أزرار التحكم */
            .slider-controls {
                display: flex;
                gap: 15px;
            }

            .custom-prev,
            .custom-next {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                border: 2px solid var(--primary-color);
                background: transparent;
                color: var(--primary-color);
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                transition: 0.3s;
            }

            .custom-prev:hover,
            .custom-next:hover {
                background: var(--primary-color);
                color: var(--secondary-color);
            }

            /* الجوال */
            @media (max-width: 991px) {
                .showroom-header {
                    text-align: center;
                    padding: 60px 20px !important;
                }

                .slider-controls {
                    justify-content: center;
                }
            }
        </style>
    </section>
    {{-- end products section --}}


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
                    background: #e31e24;
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
                    border: 2px solid #e31e24;
                    padding: 12px 30px;
                    font-weight: 700;
                    transition: 0.4s;
                }

                .cta-button i {
                    margin-right: 15px;
                    transition: 0.4s;
                }

                .cta-button:hover {
                    background: #e31e24;
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
                    color: #e31e24;
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
                    border-color: #e31e24;
                }

                .modern-product-card:hover .product-img-wrapper {
                    transform: scale(1.05);
                }

                .modern-product-card:hover .details-link {
                    color: #e31e24;
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


    <!-- Start finlance_testimonial section -->
    @if ($bs->testimonial_section == 1)
        <section class="finlance_testimonial testimonial_v1 pt-115 pb-120">
            <div class="container" <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section_title text-center">
                        <span>{{ convertUtf8($bs->testimonial_title) }}</span>
                        <h2>{{ convertUtf8($bs->testimonial_subtitle) }}</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial_slide">
                @foreach ($testimonials as $key => $testimonial)
                    <div class="testimonial_box">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5">
                                <div class="finlance_img">
                                    <img data-src="{{ asset('assets/front/img/testimonials/' . $testimonial->image) }}"
                                        class="img-fluid lazy" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="finlance_content">
                                    <img data-src="{{ asset('assets/front/img/quote.png') }}" class="lazy"
                                        alt="">
                                    <p>{{ convertUtf8($testimonial->comment) }}</p>
                                    <h3>{{ convertUtf8($testimonial->name) }}</h3>
                                    <h6>{{ convertUtf8($testimonial->rank) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </section>
    @endif
    <!-- End finlance_testimonial section -->


    <!-- Start finlance_team section -->
    @if ($bs->team_section == 1)
        <section class="finlance_team team_v1 gray_bg pt-115 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section_title text-center">
                            <span>{{ convertUtf8($bs->team_section_title) }}</span>
                            <h2>{{ convertUtf8($bs->team_section_subtitle) }}</h2>
                        </div>
                    </div>
                </div>
                <div class="team_slide team_slick">
                    @foreach ($members as $key => $member)
                        <div class="grid_item">
                            <div class="grid_inner_item">
                                <div class="finlance_img">
                                    <img data-src="{{ asset('assets/front/img/members/' . $member->image) }}"
                                        class="img-fluid lazy" alt="">
                                    <div class="team_overlay">
                                        <div class="finlance_content">
                                            <h3>{{ convertUtf8($member->name) }}</h3>
                                            <p>{{ convertUtf8($member->rank) }}</p>
                                            <ul class="social_box">
                                                @if (!empty($member->facebook))
                                                    <li><a href="{{ $member->facebook }}" target="_blank"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                @endif
                                                @if (!empty($member->twitter))
                                                    <li><a href="{{ $member->twitter }}" target="_blank"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                @endif
                                                @if (!empty($member->linkedin))
                                                    <li><a href="{{ $member->linkedin }}" target="_blank"><i
                                                                class="fab fa-linkedin-in"></i></a></li>
                                                @endif
                                                @if (!empty($member->instagram))
                                                    <li><a href="{{ $member->instagram }}" target="_blank"><i
                                                                class="fab fa-instagram"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End finlance_team section -->


    <!-- Start finlance_pricing section -->
    @if ($be->pricing_section == 1)
        <section class="logistics_pricing pricing_v1 pt-115 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="section_title text-center">
                            <span>{{ convertUtf8($be->pricing_title) }}</span>
                            <h2>{{ convertUtf8($be->pricing_subtitle) }}</h2>
                        </div>
                    </div>
                </div>
                <div class="pricing_slide pricing_slick">
                    @foreach ($packages as $key => $package)
                        <div class="pricing_box text-center">
                            <div class="pricing_title">
                                <h3>{{ convertUtf8($package->title) }}</h3>
                            </div>
                            <div class="pricing_price">
                                <h3>{{ $bex->base_currency_symbol_position == 'left' ? $bex->base_currency_symbol : '' }}{{ $package->price }}{{ $bex->base_currency_symbol_position == 'right' ? $bex->base_currency_symbol : '' }}
                                </h3>
                            </div>
                            <div class="pricing_body">
                                {!! replaceBaseUrl(convertUtf8($package->description)) !!}
                            </div>
                            <div class="pricing_button">
                                @if ($package->order_status == 1)
                                    <a href="{{ route('front.packageorder.index', $package->id) }}"
                                        class="finlance_btn">{{ __('Place Order') }}</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- End finlance_pricing section -->


    <!-- Start finlance_cta section -->
    @if ($bs->call_to_action_section == 1)
        <section class="finlance_cta cta_v1 main_bg pt-70 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="section_title">
                            <h2 class="text-white">{{ convertUtf8($bs->cta_section_text) }}</h2>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="button_box">
                            <a href="{{ $bs->cta_section_button_url }}"
                                class="finlance_btn">{{ convertUtf8($bs->cta_section_button_text) }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End finlance_cta section -->


    <!-- Start finlance_blog section -->
    @if ($bs->news_section == 1)
        <section class="modern-blog-section pt-120 pb-120">
            <div class="container">
                {{-- رأس القسم بتصميم احترافي --}}
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center mb-5">
                        <div class="section-title-wrapper">
                            <span class="sub-title">{{ $bs->blog_section_title }}</span>
                            {{-- <h2 class="main-title">{{ $bs->blog_section_subtitle }}</h2> --}}
                            <div class="title-line"></div>
                        </div>
                    </div>
                </div>

                {{-- السلايدر --}}
                <div class="blog-slider-container">
                    <div class="blog_slide blog_slick">
                        @foreach ($blogs as $key => $blog)
                            <div class="blog-item">
                                <div class="blog-card">
                                    <div class="blog-img">
                                        <a href="{{ route('front.blogdetails', [$blog->slug, $blog->id]) }}">
                                            <img src="{{ asset('assets/front/img/blogs/' . $blog->main_image) }}"
                                                class="img-fluid" alt="{{ $blog->title }}">
                                        </a>
                                        {{-- تاريخ فوق الصورة بشكل مميز --}}
                                        @php
                                            $date = \Carbon\Carbon::parse($blog->created_at);
                                        @endphp
                                        <div class="blog-date-badge">
                                            <span>{{ $date->format('d') }}</span>
                                            <small>{{ $date->format('M') }}</small>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <div class="blog-meta">
                                            <span><i class="far fa-user"></i> {{ __('Admin') }}</span>
                                            <span><i class="far fa-folder"></i>
                                                {{ $blog->category ? $blog->category->name : 'General' }}</span>
                                        </div>
                                        <h3 class="blog-title">
                                            <a href="{{ route('front.blogdetails', [$blog->slug, $blog->id]) }}">
                                                {{ strlen($blog->title) > 50 ? mb_substr($blog->title, 0, 50, 'utf-8') . '...' : $blog->title }}
                                            </a>
                                        </h3>
                                        <p class="blog-excerpt">
                                            {!! strlen(strip_tags($blog->content)) > 110
                                                ? mb_substr(strip_tags($blog->content), 0, 110, 'utf-8') . '...'
                                                : strip_tags($blog->content) !!}
                                        </p>
                                        <a href="{{ route('front.blogdetails', [$blog->slug, $blog->id]) }}"
                                            class="read-more-btn">
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
