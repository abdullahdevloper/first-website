@extends("front.$version.layout")

@section('pagename')
 - {{convertUtf8($blog->title)}}
@endsection

@section('meta-keywords', "$blog->meta_keywords")
@section('meta-description', "$blog->meta_description")
@section('breadcrumb-title', convertUtf8($bs->blog_details_title))
@section('breadcrumb-subtitle', strlen($blog->title) > 30 ? mb_substr($blog->title, 0, 30, 'utf-8') . '...' : $blog->title)
@section('breadcrumb-link', __('Blog Details'))

@section('content')

<!--    blog details section start   -->
<div class="blog-details-section section-padding">
    <div class="container">
        <div class="row justify-content-center">
            
            {{-- عمود واحد في المنتصف بعرض مناسب للقراءة --}}
            <div class="col-lg-10">
                
                <div class="blog-article-container">
                    
                    {{-- 1. الصورة البارزة --}}
                    <div class="article-image">
                        <img class="img-fluid lazy" data-src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="{{convertUtf8($blog->title)}}">
                    </div>

                    {{-- 2. رأس المقال (العنوان + الميتا) --}}
                    <div class="article-header">
                        <h1 class="article-main-title">{{convertUtf8($blog->title)}}</h1>
                        
                        <div class="article-meta-info">
                            <span class="meta-date">
                                <i class="fas fa-calendar-alt"></i> {{date('F d, Y', strtotime($blog->created_at))}}
                            </span>
                            <span class="meta-author">
                                <i class="fas fa-user-circle"></i> @lang('synex tech.mkt')
                            </span>
                        </div>
                    </div>

                    {{-- 3. محتوى المقال --}}
                    <div class="article-content-body">
                        {!! replaceBaseUrl(convertUtf8($blog->content)) !!}
                    </div>

                    {{-- 4. المشاركة --}}
                    <div class="article-share-area">
                        <span class="share-label">{{__('Share this post:')}}</span>
                        <ul class="share-icons">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text={{convertUtf8($blog->title)}}&amp;url={{urlencode(url()->current()) }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title={{convertUtf8($blog->title)}}"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>

                    {{-- التعليقات --}}
                    <div class="comment-lists mt-5">
                        <div id="disqus_thread"></div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!--    blog details section end   -->

<style>
    /* =========================================
       Blog Details Design (Exact Match LTR)
       ========================================= */
    .blog-details-section {
        background-color: #fff;
        padding: 80px 0;
        /* فرض الاتجاه LTR ومحاذاة اليسار */
        direction: ltr !important;
        text-align: left !important;
        font-family: 'Open Sans', sans-serif; /* خط النصوص */
    }

    /* 1. تنسيق الصورة */
    .article-image {
        text-align: center;
        margin-bottom: 40px;
    }
    .article-image img {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover; /* لضمان عدم تشوه الصورة */
        /* إزالة أي حدود دائرية لتطابق الصورة */
        border-radius: 0; 
    }

    /* 2. تنسيق العنوان والميتا (مركزي) */
    .article-header {
        text-align: center; /* العنوان والتاريخ في المنتصف كما في الصورة 1 */
        margin-bottom: 50px;
        padding-bottom: 20px;
        border-bottom: 1px solid #f0f0f0;
    }

    .article-main-title {
        font-family: 'Oswald', sans-serif; /* خط العناوين */
        color: #001530; /* كحلي غامق */
        font-size: 2.5rem;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 15px;
        line-height: 1.2;
    }

    .article-meta-info {
        font-size: 0.9rem;
        color: #25D06F; /* اللون الأحمر */
        font-weight: 600;
        display: flex;
        justify-content: center;
        gap: 15px;
    }
    .article-meta-info i { margin-right: 5px; }

    /* 3. تنسيق المحتوى (محاذاة لليسار) */
    .article-content-body {
        color: #555;
        font-size: 1rem;
        line-height: 1.8;
        text-align: left; /* محتوى المقال يبدأ من اليسار */
    }

    /* العناوين الفرعية داخل المقال (مثل WHAT ARE BRAKE DISCS?) */
    .article-content-body h1,
    .article-content-body h2,
    .article-content-body h3,
    .article-content-body h4 {
        font-family: 'Oswald', sans-serif;
        color: #001530;
        font-weight: 800;
        text-transform: uppercase;
        margin-top: 40px;
        margin-bottom: 20px;
        text-align: left; /* محاذاة لليسار كما في الصورة 2 */
        font-size: 1.8rem;
    }

    /* الفقرات */
    .article-content-body p {
        margin-bottom: 20px;
        text-align: left;
    }

    /* الروابط داخل النص */
    .article-content-body a {
        color: #25D06F;
        font-weight: 700;
        text-decoration: none;
    }
    .article-content-body a:hover {
        text-decoration: underline;
    }

    /* القوائم النقطية (Lists) */
    .article-content-body ul {
        list-style: none;
        padding-left: 0;
        margin-bottom: 25px;
    }
    
    .article-content-body ul li {
        position: relative;
        padding-left: 20px; /* مسافة للرمز */
        margin-bottom: 10px;
        text-align: left;
    }

    /* المربع الصغير بجانب القائمة */
    .article-content-body ul li::before {
        content: "";
        position: absolute;
        left: 0;
        top: 10px;
        width: 6px;
        height: 6px;
        background-color: #555; /* مربع رمادي غامق */
    }

    /* 4. تنسيق المشاركة */
    .article-share-area {
        margin-top: 50px;
        padding-top: 20px;
        border-top: 1px solid #f0f0f0;
        text-align: left;
    }
    .share-label {
        font-weight: 700;
        color: #001530;
        margin-right: 15px;
    }
    .share-icons {
        display: inline-block;
        padding: 0;
        margin: 0;
    }
    .share-icons li {
        display: inline-block;
        margin-right: 15px;
    }
    .share-icons li a {
        color: #777;
        font-size: 1.1rem;
        transition: 0.3s;
    }
    .share-icons li a:hover {
        color: #25D06F;
    }

    /* تحسينات للجوال */
    @media (max-width: 768px) {
        .article-main-title { font-size: 1.8rem; }
        .article-content-body h2, .article-content-body h3 { font-size: 1.4rem; }
    }
</style>

@endsection

@section('scripts')
@if($bs->is_disqus == 1)
{!! $bs->disqus_script !!}
@endif
@endsection
