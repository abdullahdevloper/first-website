<!-- استيراد الخطوط (يفضل وضعه في head الموقع) -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<header class="first-header-area">
    <div class="container-fluid custom-container">
        <div class="header-inner d-flex align-items-center justify-content-between">

            {{-- 1. الشعار (Logo) --}}
            <div class="logo-wrapper">
                <a href="{{ route('front.index') }}">
                    <img src="{{ asset('assets/front/img/' . $bs->logo) }}" alt="Logo" class="img-fluid logo-img">
                </a>
            </div>

            {{-- 2. القائمة الرئيسية (للكمبيوتر فقط) --}}
            <nav class="main-menu d-none d-lg-block">
                <ul>
                    @php $links = json_decode($menus, true); @endphp
                    @foreach ($links as $index => $link)
                        @php
                            $href = getHref($link);
                            $hasChildren = isset($link["children"]) && !empty($link["children"]);
                        @endphp
                        <li class="{{ $hasChildren ? 'has-dropdown' : '' }} {{ $index == 0 ? 'active-red' : '' }}">
                            <a href="{{ $href }}" target="{{ $link["target"] }}">
                                {{ $link["text"] }} 
                                @if($hasChildren) <i class="fas fa-chevron-down small-chevron"></i> @endif
                            </a>
                            @if ($hasChildren)
                                <ul class="dropdown-menu-custom">
                                    @foreach ($link["children"] as $level2)
                                        @php $l2Href = getHref($level2); @endphp
                                        <li><a href="{{ $l2Href }}" target="{{ $level2["target"] }}">{{ $level2["text"] }}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>

            {{-- 3. الجانب الأيمن (أيقونات وزر) --}}
            <div class="header-right-actions d-flex align-items-center">
                {{-- سوشيال (يختفي في الموبايل الصغير جداً) --}}
                <div class="social-icons-wrapper d-none d-sm-flex">
                    @foreach ($socials as $social)
                        <a href="{{ $social->url }}" target="_blank" class="social-link"><i class="{{ $social->icon }}"></i></a>
                    @endforeach
                </div>

                {{-- زر FIND PARTS --}}
                <div class="cta-button-wrapper d-none d-md-block">
                    <a href="{{url('/FIND-PART')}}" class="btn-find-parts">FIND PARTS</a>
                </div>

                {{-- زر القائمة للموبايل (Hamburger Icon) --}}
                <div class="mobile-menu-trigger d-lg-none ml-3">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</header>

{{-- ========================================= --}}
{{-- 4. قائمة الموبايل الجانبية (Mobile Sidebar) --}}
{{-- ========================================= --}}
<div class="mobile-menu-overlay"></div>
<div class="mobile-menu-sidebar">
    <div class="mobile-menu-header">
        {{-- الشعار داخل القائمة --}}
        <img src="{{ asset('assets/front/img/' . $bs->logo) }}" alt="Logo">
        {{-- زر الإغلاق --}}
        <div class="close-mobile-menu">
            <i class="fas fa-times"></i>
        </div>
    </div>
    
    <div class="mobile-menu-body">
        <ul>
            @foreach ($links as $link)
                @php
                    $href = getHref($link);
                    $hasChildren = isset($link["children"]) && !empty($link["children"]);
                @endphp
                <li class="{{ $hasChildren ? 'mobile-has-dropdown' : '' }}">
                    <a href="{{ $href }}">
                        {{ $link["text"] }}
                        @if($hasChildren) <i class="fas fa-chevron-right float-right"></i> @endif
                    </a>
                    {{-- القائمة المنسدلة في الموبايل --}}
                    @if ($hasChildren)
                        <ul class="mobile-submenu">
                            @foreach ($link["children"] as $level2)
                                <li><a href="{{ getHref($level2) }}">{{ $level2["text"] }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        
        {{-- زر FIND PARTS في الموبايل --}}
        <div class="mt-4 px-3">
            <a href="{{ route('front.product') }}" class="btn-find-parts w-100 text-center">FIND PARTS</a>
        </div>
    </div>
</div>


<style>
    /* =========================================
       تصميم الهيدر المطابق للصورة
       ========================================= */
    .first-header-area {
        background-color: #ffffff;
        padding: 15px 0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        font-family: 'Oswald', sans-serif; /* الخط المستخدم في الصورة */
        position: relative;
        z-index: 999;
    }

    .custom-container {
        padding-left: 30px;
        padding-right: 30px;
        max-width: 1600px;
        margin: 0 auto;
    }

    /* 1. الشعار */
    .logo-img {
        max-height: 60px; /* التحكم بحجم الشعار ليطابق الصورة */
        width: auto;
    }

    /* 2. القائمة الرئيسية */
    .main-menu ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        align-items: center;
        gap: 25px; /* المسافة بين الروابط */
    }

    .main-menu ul li {
        position: relative;
        padding: 10px 0;
    }

    .main-menu ul li a {
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        color: #001530; /* اللون الكحلي الغامق لباقي الروابط */
        text-decoration: none;
        transition: color 0.3s;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    /* السهم الصغير للقوائم المنسدلة */
    .small-chevron {
        font-size: 10px;
        margin-top: 2px;
        color: #001530;
    }

    /* جعل العنصر الأول (HOME) لونه أحمر دائماً كما في الصورة */
    .main-menu ul li.active-red > a {
        color: #25D06F !important;
    }

    /* تأثير التحويم */
    .main-menu ul li a:hover {
        color: #25D06F;
    }

    /* القائمة المنسدلة */
    .dropdown-menu-custom {
        position: absolute;
        top: 100%;
        left: 0;
        background: #fff;
        min-width: 200px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        flex-direction: column !important;
        gap: 0 !important;
        border-top: 3px solid #25D06F;
        padding: 10px 0 !important;
    }

    .main-menu ul li:hover .dropdown-menu-custom {
        opacity: 1;
        visibility: visible;
        top: 100%;
    }

    .dropdown-menu-custom li a {
        padding: 8px 20px;
        font-size: 14px;
        color: #333;
        display: block;
        border-bottom: 1px solid #f5f5f5;
    }

    .dropdown-menu-custom li a:hover {
        background-color: #f9f9f9;
        color: #25D06F;
    }

    /* 3. الجانب الأيمن */
    .header-right-actions {
        gap: 30px; /* مسافة بين السوشيال والزر */
    }

    /* أيقونات السوشيال */
    .social-icons-wrapper {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .social-link i {
        font-size: 18px;
        color: #25D06F; /* اللون الأحمر للأيقونات */
        transition: transform 0.3s;
    }

    .social-link:hover i {
        transform: translateY(-3px);
    }

    /* زر FIND PARTS */
    .btn-find-parts {
        background-color: #001530; /* الخلفية الكحلية */
        color: #ffffff;
        font-weight: 700;
        font-size: 15px;
        text-transform: uppercase;
        padding: 12px 35px; /* زر عريض */
        text-decoration: none;
        display: inline-block;
        transition: background 0.3s;
        letter-spacing: 1px;
        border: none;
        border-radius: 0; /* حواف حادة كما في الصورة */
    }

    .btn-find-parts:hover {
        background-color: #25D06F; /* يتحول للأحمر عند التحويم */
        color: #fff;
        text-decoration: none;
    }

    /* زر الموبايل */
    .mobile-menu-trigger {
        font-size: 24px;
        color: #001530;
        cursor: pointer;
    }

    /* تحسينات الاستجابة */
    @media (max-width: 1200px) {
        .main-menu ul { gap: 15px; }
        .main-menu ul li a { font-size: 13px; }
        .btn-find-parts { padding: 10px 20px; font-size: 13px; }
    }

    /* ... (تنسيقات الهيدر السابقة تبقى كما هي) ... */
    
    /* =========================================
       تنسيقات قائمة الموبايل (Mobile Menu Styles)
       ========================================= */
    
    /* 1. طبقة التعتيم الخلفية */
    .mobile-menu-overlay {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.7);
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }
    .mobile-menu-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    /* 2. القائمة الجانبية نفسها */
    .mobile-menu-sidebar {
        position: fixed;
        top: 0;
        left: -300px; /* مخفية خارج الشاشة لليسار */
        width: 280px;
        height: 100vh;
        background: #fff;
        z-index: 1001;
        transition: all 0.4s ease;
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        overflow-y: auto;
    }
    .mobile-menu-sidebar.active {
        left: 0; /* إظهار القائمة */
    }

    /* 3. رأس القائمة الجانبية */
    .mobile-menu-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        border-bottom: 1px solid #eee;
    }
    .mobile-menu-header img {
        max-width: 120px;
    }
    .close-mobile-menu {
        font-size: 20px;
        cursor: pointer;
        color: #25D06F;
    }

    /* 4. روابط القائمة */
    .mobile-menu-body ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }
    .mobile-menu-body ul li {
        border-bottom: 1px solid #f5f5f5;
    }
    .mobile-menu-body ul li a {
        display: block;
        padding: 15px 20px;
        color: #001530;
        font-weight: 700;
        text-transform: uppercase;
        text-decoration: none;
        font-family: 'Oswald', sans-serif;
        font-size: 14px;
    }
    .mobile-menu-body ul li a:hover {
        color: #25D06F;
    }

    /* القوائم المنسدلة في الموبايل */
    .mobile-submenu {
        background: #f9f9f9;
        display: none; /* مخفية افتراضياً */
        padding-left: 15px !important;
    }
    .mobile-submenu li {
        border-bottom: none !important;
    }
    .mobile-submenu li a {
        font-size: 13px;
        padding: 10px 20px;
        color: #555;
    }

    /* زر القائمة (Hamburger) */
    .mobile-menu-trigger {
        cursor: pointer;
        font-size: 24px;
        color: #001530;
    }

</style>
<script>
    $(document).ready(function() {
        
        // 1. عند الضغط على أيقونة القائمة (فتح القائمة)
        $('.mobile-menu-trigger').on('click', function() {
            $('.mobile-menu-sidebar').addClass('active');
            $('.mobile-menu-overlay').addClass('active');
        });

        // 2. عند الضغط على زر الإغلاق أو الخلفية السوداء (إغلاق القائمة)
        $('.close-mobile-menu, .mobile-menu-overlay').on('click', function() {
            $('.mobile-menu-sidebar').removeClass('active');
            $('.mobile-menu-overlay').removeClass('active');
        });

        // 3. (اختياري) فتح القوائم المنسدلة داخل الموبايل عند الضغط
        $('.mobile-has-dropdown > a').on('click', function(e) {
            e.preventDefault(); // منع الرابط من الانتقال فوراً (إذا أردت جعل العنوان زر توسيع فقط)
            $(this).parent().find('.mobile-submenu').slideToggle(); // فتح/إغلاق القائمة الفرعية
            $(this).find('i').toggleClass('fa-chevron-right fa-chevron-down'); // تغيير السهم
        });

    });
</script>
