		{{-- <section class="finlance_banner banner_v1">
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


        
   --}}

   <section class="finlance_banner banner_v1" style="position: relative;">

    {{-- 1. السلايدر (يبقى كما هو، لا تضع البحث داخله) --}}
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
                                    {{-- محتوى السلايدر (نصوص وأزرار) --}}
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

    {{-- 2. شريط البحث الثابت (خارج السلايدر) --}}
    <div class="static-search-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    
                    {{-- بداية فورم البحث --}}
                    <form action="#" method="GET" class="search-flex-form">
                        {{-- القائمة الأولى: خلفية غامقة --}}
                        <div class="search-select-group dark-bg">
                            <select name="type">
                                <option value="">Passenger car</option>
                                <option value="sedan">Sedan</option>
                                <option value="suv">SUV</option>
                            </select>
                        </div>
                        {{-- القوائم البيضاء --}}
                        <div class="search-select-group white-bg">
                            <select name="manufacturer">
                                <option value="">Manufacturer</option>
                                <option value="toyota">Toyota</option>
                            </select>
                        </div>
                        <div class="search-select-group white-bg">
                            <select name="make">
                                <option value="">Make</option>
                                <option value="1">Option 1</option>
                            </select>
                        </div>
                        <div class="search-select-group white-bg">
                            <select name="year">
                                <option value="">Model Year</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                        <div class="search-select-group white-bg">
                            <select name="fuel">
                                <option value="">Fuel Type</option>
                                <option value="petrol">Petrol</option>
                            </select>
                        </div>
                        {{-- زر البحث --}}
                        <button type="submit" class="search-submit-btn">SEARCH</button>
                    </form>

                    <div class="advance-search-link">
                        <a href="#">Advance Search</a>
                    </div>
                    {{-- نهاية فورم البحث --}}

                </div>
            </div>
        </div>
    </div>
<style>
    /* حاوية البحث الثابتة */
    .static-search-container {
        position: absolute; /* وضع مطلق فوق القسم */
        bottom: 80px;       /* المسافة من الأسفل (عدلها حسب رغبتك) */
        left: 0;
        width: 100%;
        z-index: 10;        /* لضمان ظهوره فوق السلايدر */
    }

    /* تنسيق الفورم (نفس السابق) */
    .search-flex-form {
        display: inline-flex;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    .search-select-group {
        position: relative;
        width: 160px;
        height: 50px;
        border-right: 1px solid #e5e5e5;
    }
    .search-select-group:last-of-type { border-right: none; }

    .search-select-group select {
        width: 100%;
        height: 100%;
        border: none;
        padding: 0 15px;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        background: transparent;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 12px;
    }

    .dark-bg { background-color: #333333; }
    .dark-bg select { 
        color: #fff; 
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    }

    .white-bg { background-color: #ffffff; }
    .white-bg select { color: #333; }

    .search-submit-btn {
        background-color: #333333;
        color: #fff;
        border: none;
        padding: 0 30px;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.3s;
    }
    .search-submit-btn:hover { background-color: #000; }

    .advance-search-link {
        margin-top: 10px;
        text-align: right; 
        padding-right: 17%; /* ضبط تقريبي ليكون تحت الزر */
    }
    .advance-search-link a {
        color: #fff;
        font-size: 13px;
        text-decoration: none;
        text-shadow: 0 1px 3px rgba(0,0,0,0.8); /* ظل للنص ليظهر بوضوح */
    }

    /* استجابة الجوال */
    @media (max-width: 991px) {
        .static-search-container {
            position: relative; /* في الجوال نلغي التثبيت لعدم تغطية الصورة */
            bottom: auto;
            background: #222; /* خلفية داكنة في الجوال */
            padding: 30px 0;
            margin-top: -5px;
        }
        .search-flex-form {
            flex-direction: column;
            width: 90%;
            max-width: 400px;
            border-radius: 10px;
        }
        .search-select-group {
            width: 100%;
            border-bottom: 1px solid #eee;
        }
        .advance-search-link {
            text-align: center;
            padding-right: 0;
        }
    }
</style>

</section>
