@extends("front.$version.layout")

@section('pagename')
 - {{__('Product')}} - {{convertUtf8($product->title)}}
@endsection

@section('styles')
<link rel="stylesheet" href="{{asset('assets/front/css/slick.css')}}">
@endsection

@section('meta-keywords', "$product->meta_keywords")
@section('meta-description', "$product->meta_description")

@php
    $reviews = App\ProductReview::where('product_id', $product->id)->get();
    $avarage_rating = App\ProductReview::where('product_id',$product->id)->avg('review');
    $avarage_rating =  round($avarage_rating,2);

@endphp

@section('breadcrumb-title', $be->product_details_title)
@section('breadcrumb-subtitle', strlen($product->title) > 40 ? mb_substr($product->title,0,40,'utf-8') . '...' : $product->title)
@section('breadcrumb-link', strlen($product->title) > 40 ? mb_substr($product->title,0,40,'utf-8') . '...' : $product->title)

@section('content')

<style>
    /* =========================================
       تنسيقات صفحة المنتج (Clean Catalog Style)
       ========================================= */
    .product-details-clean {
        padding: 60px 0;
        font-family: 'Open Sans', sans-serif;
        color: #555;
    }

    /* 1. تنسيق مسار التنقل (Breadcrumb) */
    .clean-breadcrumb {
        font-size: 0.9rem;
        color: #888;
        margin-bottom: 40px;
    }
    .clean-breadcrumb a {
        color: #888;
        text-decoration: none;
        transition: 0.3s;
    }
    .clean-breadcrumb a:hover { color: #25D06F; }
    .clean-breadcrumb span { margin: 0 5px; }

    /* 2. تنسيق الصورة */
    .clean-product-image {
        border: 1px solid #eee; /* إطار خفيف اختياري */
        padding: 20px;
        background: #fff;
        text-align: center;
    }
    .clean-product-image img {
        max-width: 100%;
        height: auto;
    }

    /* 3. تنسيق المحتوى (الجانب الأيمن) */
    .clean-product-content {
        padding-left: 30px;
    }

    .clean-product-title {
        font-family: 'Oswald', sans-serif;
        color: #001530; /* كحلي غامق */
        font-size: 2.5rem;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 25px;
        line-height: 1.1;
    }

    .clean-description {
        font-size: 1rem;
        line-height: 1.8;
        margin-bottom: 30px;
    }

    /* تنسيق العناوين داخل الوصف (مثل FEATURES AND BENEFITS) */
    .clean-description h3, 
    .clean-description h4, 
    .clean-description strong {
        color: #25D06F; /* اللون الأحمر */
        font-family: 'Oswald', sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        display: block;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    /* تنسيق القوائم داخل الوصف */
    .clean-description ul {
        list-style: none;
        padding: 0;
        margin-bottom: 20px;
    }
    .clean-description ul li {
        position: relative;
        padding-left: 15px;
        margin-bottom: 8px;
    }
    .clean-description ul li::before {
        content: "■"; /* مربع صغير */
        color: #555;
        font-size: 10px;
        position: absolute;
        left: 0;
        top: 4px;
    }

    /* الروابط داخل النص */
    .clean-description a {
        color: #25D06F;
        text-decoration: none;
    }

    /* زر تحميل الكتالوج */
    .btn-download-catalog {
        display: inline-block;
        background-color: #25D06F;
        color: #fff;
        padding: 15px 35px;
        font-family: 'Oswald', sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 1px;
        text-decoration: none;
        border: none;
        transition: background 0.3s;
        margin-top: 20px;
    }
    .btn-download-catalog:hover {
        background-color: #25D06F;
        color: #fff;
    }

    /* =========================================
       تنسيقات المنتجات المشابهة (Related Products)
       ========================================= */
    .related-products-clean {
        padding-bottom: 80px;
        padding-top: 40px;
    }

    .related-title {
        font-family: 'Oswald', sans-serif;
        color: #001530;
        font-size: 2rem;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 40px;
    }

    .related-item {
        margin-bottom: 30px;
        text-align: left; /* محاذاة لليسار كما في الصورة */
    }

    .related-img-box {
        height: 180px;
        display: flex;
        align-items: center;
        justify-content: center; /* الصورة في المنتصف */
        margin-bottom: 20px;
        background: #fff;
    }
    .related-img-box img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }

    .related-item-title {
        font-family: 'Oswald', sans-serif;
        color: #001530;
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 15px;
        letter-spacing: 0.5px;
        min-height: 40px; /* لضبط المحاذاة */
    }

    .btn-read-more {
        display: inline-block;
        background-color: #E9ECEF; /* رمادي فاتح جداً */
        color: #333;
        padding: 10px 25px;
        font-size: 0.85rem;
        text-decoration: none;
        transition: 0.3s;
        font-weight: 600;
    }
    .btn-read-more:hover {
        background-color: #dbe2e8;
        color: #000;
        text-decoration: none;
    }

    @media (max-width: 991px) {
        .clean-product-content { padding-left: 0; margin-top: 30px; }
        .related-item { text-align: center; }
    }
</style>

<!-- =========================================
     1. قسم تفاصيل المنتج (Product Details)
     ========================================= -->
<div class="product-details-clean">
    <div class="container">
        
        {{-- Breadcrumb (مسار التنقل) --}}
        <div class="row">
            <div class="col-12">
                <div class="clean-breadcrumb">
                    <a href="{{ route('front.index') }}">Home</a> <span>/</span>
                    <a href="{{ route('front.product') }}">First Products</a> <span>/</span>
                    <span class="text-dark">{{ $product->title }}</span>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- العمود الأيسر: الصورة --}}
            <div class="col-lg-5">
                <div class="clean-product-image">
                    {{-- عرض الصورة الرئيسية فقط (بدون سلايدر لتبسيط التصميم مثل الصورة) --}}
                    @foreach ($product->product_images as $index => $image)
                        @if($index == 0) {{-- عرض الصورة الأولى فقط --}}
                            <img src="{{ asset('assets/front/img/product/sliders/'.$image->image) }}" alt="{{ $product->title }}">
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- العمود الأيمن: التفاصيل --}}
            <div class="col-lg-7">
                <div class="clean-product-content">
                    
                    {{-- العنوان الرئيسي --}}
                    <h1 class="clean-product-title">{{ $product->title }}</h1>

                    {{-- الوصف (Description) --}}
                    <div class="clean-description">
                        {{-- ملاحظة: تأكد من أن محتوى الوصف في قاعدة البيانات يحتوي على العناوين والتفاصيل --}}
                        {{-- إذا لم يكن كذلك، سيظهر النص العادي. الكلاسات في CSS ستلون العناوين بالأحمر تلقائياً --}}
                        {!! replaceBaseUrl(convertUtf8($product->description)) !!}
                        
                        <br>
                        {{-- نص ثابت يحاكي الصورة إذا لم يكن موجوداً في الداتا --}}
                        <p>
                            Asimco is a trusted automotive parts manufacturer, offering premium quality horns along with 
                            <a href="#">brake pads</a>, <a href="#">shock absorbers</a>, <a href="#">radiators</a>, and more.
                        </p>
                    </div>

                    {{-- زر تحميل الكتالوج --}}
                    {{-- يمكنك وضع رابط ملف الـ PDF هنا إذا كان متاحاً في المتغيرات --}}
                    <a href="{{ $product->catalog_file ?? '#' }}" class="btn-download-catalog">
                        DOWNLOAD CATALOG
                    </a>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- =========================================
     2. قسم المنتجات المشابهة (Related Products)
     ========================================= -->
@if($related_product->count() > 0)
<div class="related-products-clean">
    <div class="container">
        
        <div class="row">
            <div class="col-12">
                <h2 class="related-title">RELATED PRODUCTS</h2>
            </div>
        </div>

        <div class="row">
            @foreach ($related_product->take(4) as $r_product) {{-- عرض 4 منتجات فقط --}}
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="related-item">
                    
                    {{-- الصورة --}}
                    <div class="related-img-box">
                        <img class="lazy" data-src="{{ asset('assets/front/img/product/featured/'.$r_product->feature_image) }}" alt="{{ $r_product->title }}">
                    </div>

                    {{-- العنوان --}}
                    <h4 class="related-item-title">{{ $r_product->title }}</h4>

                    {{-- زر القراءة --}}
                    <a href="{{ route('front.product.details', $r_product->slug) }}" class="btn-read-more">
                        Read more
                    </a>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endif

@endsection

@section('scripts')

<script src="{{asset('assets/front/js/slick.min.js')}}"></script>
<script src="{{asset('assets/front/js/product.js')}}"></script>
<script src="{{asset('assets/front/js/cart.js')}}"></script>
<script>
    $('.image-popup').magnificPopup({
        type: 'image',
        gallery:{
            enabled:true
        }
    });

</script>

<script>
    $(document).on('click','.review-value li a',function(){
        $('.review-value li a i').removeClass('text-primary');
        let reviewValue = $(this).attr('data-href');
         parentClass = `review-${reviewValue}`;
        $('.'+parentClass+ ' li a i').addClass('text-primary');
        $('#reviewValue').val(reviewValue);
    })
</script>

@endsection
