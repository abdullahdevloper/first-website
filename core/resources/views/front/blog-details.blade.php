@extends("front.$version.layout")

@section('pagename')
    - {{ convertUtf8($blog->title) }}
@endsection

@section('meta-keywords', "$blog->meta_keywords")
@section('meta-description', "$blog->meta_description")

@section('breadcrumb-title', convertUtf8($bs->blog_details_title))
@section('breadcrumb-subtitle', strlen($blog->title) > 30 ? mb_substr($blog->title, 0, 30, 'utf-8') . '...' :
    $blog->title)
@section('breadcrumb-link', __('Blog Details'))

@section('content')

    <!--    blog details section start   -->
    <div class="blog-details-page py-5">
        <div class="container">
            <div class="row justify-content-center">
                {{-- منطقة المقال الرئيسي --}}
                <div class="{{ $blog->sidebar == 1 ? 'col-lg-8' : 'col-lg-10' }}">
                    <article class="blog-article-wrapper">
                        {{-- رأس المقال --}}
                        <header class="article-header mb-4">
                            <div class="article-meta">
                                <span class="meta-item"><i class="fas fa-calendar-alt"></i>
                                    {{ date('F d, Y', strtotime($blog->created_at)) }}</span>
                                <span class="meta-item"><i class="fas fa-user"></i> {{ __('BY') }}
                                    {{ __('Admin') }}</span>
                            </div>
                            <h1 class="article-title">{{ convertUtf8($blog->title) }}</h1>
                        </header>

                        {{-- الصورة الرئيسية --}}
                        <div class="article-featured-img mb-5">
                            <img class="img-fluid lazy rounded-4 shadow-sm"
                                data-src="{{ asset('assets/front/img/blogs/' . $blog->main_image) }}"
                                alt="{{ $blog->title }}">
                        </div>

                        {{-- محتوى المقال --}}
                        <div class="article-body-content">
                            {!! replaceBaseUrl(convertUtf8($blog->content)) !!}
                        </div>

                        {{-- أزرار المشاركة بتصميم عصري --}}
                        <div class="article-share-box mt-5">
                            <h5>{{ __('Share this post') }}:</h5>
                            <ul class="share-links">
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                        class="share-fb"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/intent/tweet?text={{ urlencode($blog->title) }}&amp;url={{ urlencode(url()->current()) }}"
                                        class="share-tw"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title={{ convertUtf8($blog->title) }}"
                                        class="share-ln"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}"
                                        class="share-wa"><i class="fab fa-whatsapp"></i></a></li>
                            </ul>
                        </div>

                        {{-- التعليقات --}}
                        <div class="comments-section mt-5">
                            <div id="disqus_thread"></div>
                        </div>
                    </article>
                </div>

                {{-- الجانب الجانبي (يظهر فقط إذا كان مفعلاً) --}}
                @if ($blog->sidebar == 1)
                    <div class="col-lg-4 mt-5 mt-lg-0">
                        <aside class="blog-sidebar">
                            {{-- ويدجت البحث --}}
                            <div class="sidebar-widget">
                                <h4 class="widget-title">{{ __('Search') }}</h4>
                                <div class="search-form">
                                    <form action="{{ route('front.blogs') }}" method="GET">
                                        <input type="text" name="term" placeholder="{{ __('Search Blogs') }}...">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            {{-- ويدجت الأقسام --}}
                            <div class="sidebar-widget">
                                <h4 class="widget-title">{{ __('Categories') }}</h4>
                                <ul class="category-list">
                                    @foreach ($bcats as $bcat)
                                        <li class="{{ request()->input('category') == $bcat->slug ? 'active' : '' }}">
                                            <a
                                                href="{{ route('front.blogs', ['category' => $bcat->slug]) }}">{{ convertUtf8($bcat->name) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- ويدجت النشرة البريدية --}}
                            <div class="sidebar-widget newsletter-widget text-center">
                                <div class="newsletter-inner" style="background-color: #0A3041;">
                                    <h4 class="text-white">{{ __('Stay Updated') }}</h4>
                                    <p class="text-white-50">{{ __('Subscribe for latest news') }}</p>
                                    <form id="subscribeForm" action="{{ route('front.subscribe') }}" method="POST">
                                        @csrf
                                        <input type="email" name="email" placeholder="{{ __('Email Address') }}"
                                            required>
                                        <button type="submit" class="identity-btn-sm">{{ __('Subscribe') }}</button>
                                    </form>
                                </div>
                            </div>
                        </aside>
                    </div>
                @endif
            </div>
        </div>
    </div>
<style>
    :root {
    --primary: #25D06F;
    --secondary: #0A3041;
}

.blog-details-page { background-color: #fff; direction: rtl; }

/* المقال */
.article-header .article-title {
    font-size: 2.5rem;
    font-weight: 900;
    color: var(--secondary);
    line-height: 1.3;
}

.article-meta { margin-bottom: 15px; }
.meta-item {
    font-size: 0.9rem;
    color: #888;
    margin-left: 20px;
}
.meta-item i { color: var(--primary); margin-left: 5px; }

.article-featured-img img {
    width: 100%;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
}

/* محتوى النص */
.article-body-content {
    font-size: 1.15rem;
    line-height: 1.9;
    color: #444;
}

.article-body-content p { margin-bottom: 25px; }
.article-body-content h2, .article-body-content h3 {
    color: var(--secondary);
    font-weight: 800;
    margin: 40px 0 20px;
}

/* أزرار المشاركة */
.share-links {
    list-style: none;
    padding: 0;
    display: flex;
    gap: 10px;
}

.share-links li a {
    width: 45px; height: 45px;
    display: flex; align-items: center; justify-content: center;
    border-radius: 50%;
    color: #fff;
    transition: 0.3s;
    text-decoration: none;
}

.share-fb { background: #3b5998; }
.share-tw { background: #1da1f2; }
.share-ln { background: #0077b5; }
.share-wa { background: #25d366; }

.share-links li a:hover { transform: translateY(-5px); opacity: 0.8; }

/* Sidebar */
.sidebar-widget {
    background: #f9f9f9;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 30px;
}

.widget-title {
    font-size: 1.2rem;
    font-weight: 800;
    color: var(--secondary);
    margin-bottom: 20px;
    border-right: 4px solid var(--primary);
    padding-right: 15px;
}

.search-form { position: relative; }
.search-form input {
    width: 100%; padding: 12px 15px;
    border: 1px solid #ddd; border-radius: 8px;
}
.search-form button {
    position: absolute; left: 5px; top: 5px;
    background: var(--primary); border: none;
    color: var(--secondary); padding: 7px 15px; border-radius: 6px;
}

.category-list { list-style: none; padding: 0; }
.category-list li { border-bottom: 1px solid #eee; padding: 10px 0; }
.category-list li a { color: var(--secondary); text-decoration: none; font-weight: 600; display: block; }
.category-list li a:hover { color: var(--primary); }

.newsletter-inner { padding: 30px 20px; border-radius: 15px; }
.newsletter-inner input {
    width: 100%; padding: 10px; border-radius: 8px; border: none; margin: 15px 0;
}
.identity-btn-sm {
    background: var(--primary); color: var(--secondary);
    border: none; padding: 10px 25px; border-radius: 8px; font-weight: 800;
}

/* نسخة الجوال */
@media (max-width: 768px) {
    .article-header .article-title { font-size: 1.8rem; }
    .article-body-content { font-size: 1.05rem; }
    .share-links { justify-content: center; }
}

</style>
    <!--    blog details section end   -->

@endsection

@section('scripts')
    @if ($bs->is_disqus == 1)
        {!! $bs->disqus_script !!}
    @endif
@endsection
