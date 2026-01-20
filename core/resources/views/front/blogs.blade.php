@extends("front.$version.layout")

@section('pagename')
 -
 @if (empty($category))
 {{__('All')}}
 @else
 {{convertUtf8($category->name)}}
 @endif
 {{__('Blogs')}}
@endsection

@section('meta-keywords', "$be->blogs_meta_keywords")
@section('meta-description', "$be->blogs_meta_description")

@section('breadcrumb-title', convertUtf8($bs->blog_title))
@section('breadcrumb-subtitle', convertUtf8($bs->blog_subtitle))
@section('breadcrumb-link', __('Latest Blogs'))

@section('content')


  <!--    blog lists start   -->
  {{-- <div class="blog-lists section-padding">
     <div class="container">
        <div class="row">
           <div class="col-lg-8">
              <div class="row">
                @if (count($blogs) == 0)
                  <div class="col-md-12">
                    <div class="bg-light py-5">
                      <h3 class="text-center">{{__('NO BLOG FOUND')}}</h3>
                    </div>
                  </div>
                @else
                  @foreach ($blogs as $key => $blog)
                    <div class="col-md-6">
                       <div class="single-blog">
                          <div class="blog-img-wrapper">
                             <img class="lazy" data-src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="">
                          </div>
                          <div class="blog-txt">
                            @php
                                if (!empty($currentLang)) {
                                    $blogDate = \Carbon\Carbon::parse($blog->created_at)->locale("$currentLang->code");
                                } else {
                                    $blogDate = \Carbon\Carbon::parse($blog->created_at)->locale("en");
                                }

                                $blogDate = $blogDate->translatedFormat('jS F, Y');
                            @endphp
                             <p class="date"><small>{{__('By')}} <span class="username">{{__('Admin')}}</span></small> | <small>{{$blogDate}}</small> </p>

                             <h4 class="blog-title"><a href="{{route('front.blogdetails', [$blog->slug])}}">{{strlen($blog->title) > 40 ? mb_substr($blog->title, 0, 40, 'utf-8') . '...' : $blog->title}}</a></h4>

                             <p class="blog-summary">{!! strlen(strip_tags($blog->content)) > 100 ? mb_substr(strip_tags($blog->content), 0, 100, 'utf-8') . '...' : strip_tags($blog->content) !!}</p>

                             <a href="{{route('front.blogdetails', [$blog->slug])}}" class="readmore-btn"><span>{{__('Read More')}}</span></a>

                          </div>
                       </div>
                    </div>
                  @endforeach
                @endif
              </div>
              @if ($blogs->total() > 6)
                <div class="row">
                   <div class="col-md-12">
                      <nav class="pagination-nav {{$blogs->total() > 6 ? 'mb-4' : ''}}">
                        {{$blogs->appends(['term'=>request()->input('term'), 'month'=>request()->input('month'), 'year'=>request()->input('year'), 'category' => request()->input('category')])->links()}}
                      </nav>
                   </div>
                </div>
              @endif
           </div>
           <!--    blog sidebar section start   -->
           <div class="col-lg-4">
              <div class="sidebar">
                 <div class="blog-sidebar-widgets">
                    <div class="searchbar-form-section">
                       <form action="{{route('front.blogs', ['category' => request()->input('category'), 'month' => request()->input('month'), 'year' => request()->input('year')])}}" method="GET">
                          <div class="searchbar">
                             <input name="category" type="hidden" value="{{request()->input('category')}}">
                             <input name="month" type="hidden" value="{{request()->input('month')}}">
                             <input name="year" type="hidden" value="{{request()->input('year')}}">
                             <input name="term" type="text" placeholder="{{__('Search Blogs')}}" value="{{request()->input('term')}}">
                             <button type="submit"><i class="fa fa-search"></i></button>
                          </div>
                       </form>
                    </div>
                 </div>
                 <div class="blog-sidebar-widgets category-widget">
                    <div class="category-lists job">
                       <h4>{{__('Categories')}}</h4>
                       <ul>
                          @foreach ($bcats as $key => $bcat)
                            <li class="single-category @if(request()->input('category') == $bcat->slug) active @endif"><a href="{{route('front.blogs', ['term'=>request()->input('term'), 'category'=>$bcat->slug, 'month' => request()->input('month'), 'year' => request()->input('year')])}}">{{convertUtf8($bcat->name)}}</a></li>
                          @endforeach
                       </ul>
                    </div>
                 </div>
                 <div class="blog-sidebar-widgets category-widget">
                    <div class="category-lists job">
                       <h4>{{__('Archives')}}</h4>
                       <ul>
                          @foreach ($archives as $key => $archive)
                            @php
                              $myArr = explode('-', $archive->date);
                              $monthNum  = $myArr[0];
                              $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                              $monthName = $dateObj->format('F');
                            @endphp
                            <li class="single-category @if(request()->input('month') == $myArr[0] && request()->input('year') == $myArr[1]) active @endif">
                                <a href="{{route('front.blogs', ['term'=>request()->input('term'), 'category'=>request()->input('category'),'month'=>$myArr[0], 'year'=>$myArr[1]])}}">

                                    @php
                                        if (!empty($currentLang)) {
                                            $monthName = \Carbon\Carbon::parse($monthName)->locale("$currentLang->code");
                                            $year = \Carbon\Carbon::parse($myArr[1])->locale("$currentLang->code");
                                        } else {
                                            $monthName = \Carbon\Carbon::parse($monthName)->locale("en");
                                            $year = \Carbon\Carbon::parse($myArr[1])->locale("en");
                                        }

                                        $monthName = $monthName->translatedFormat('F');
                                        $year = $year->translatedFormat('Y');
                                    @endphp

                                    {{$monthName}} {{$year}}
                                </a>
                            </li>
                          @endforeach
                       </ul>
                    </div>
                 </div>
                 <div class="subscribe-section">
                    <span>{{__('SUBSCRIBE')}}</span>
                    <h3>{{__('SUBSCRIBE FOR NEWSLETTER')}}</h3>
                    <form id="subscribeForm" class="subscribe-form" action="{{route('front.subscribe')}}" method="POST">
                       @csrf
                       <div class="form-element"><input name="email" type="email" placeholder="{{__('Email')}}"></div>
                       <p id="erremail" class="text-danger mb-3 err-email"></p>
                       <div class="form-element"><input type="submit" value="{{__('Subscribe')}}"></div>
                    </form>
                 </div>
              </div>
           </div>
           <!--    blog sidebar section end   -->
        </div>
     </div>
  </div> --}}

  <div class="modern-blog-listing-page py-5">
    <div class="container">
        <div class="row">
            {{-- منطقة المقالات الرئيسية --}}
            <div class="col-lg-12">
                <div class="row">
                    @if (count($blogs) == 0)
                        <div class="col-md-12">
                            <div class="no-content-found text-center py-5">
                                <i class="far fa-frown mb-3"></i>
                                <h3>{{__('NO BLOG FOUND')}}</h3>
                            </div>
                        </div>
                    @else
                        @foreach ($blogs as $key => $blog)
                        <div class="col-md-4 mb-4">
                            <article class="blog-post-card">
                                <div class="post-img-wrapper">
                                    <a href="{{route('front.blogdetails', [$blog->slug])}}">
                                        <img class="lazy img-fluid" data-src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="{{$blog->title}}">
                                    </a>
                                    {{-- تاريخ فوق الصورة --}}
                                    @php
                                        $date = \Carbon\Carbon::parse($blog->created_at);
                                    @endphp
                                    <div class="post-date-badge">
                                        <span>{{ $date->format('d') }}</span>
                                        <small>{{ $date->format('M') }}</small>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <div class="post-meta">
                                        <span><i class="far fa-user"></i> {{__('Admin')}}</span>
                                    </div>
                                    <h4 class="post-title">
                                        <a href="{{route('front.blogdetails', [$blog->slug])}}">
                                            {{strlen($blog->title) > 45 ? mb_substr($blog->title, 0, 45, 'utf-8') . '...' : $blog->title}}
                                        </a>
                                    </h4>
                                    <p class="post-excerpt">
                                        {!! strlen(strip_tags($blog->content)) > 90 ? mb_substr(strip_tags($blog->content), 0, 90, 'utf-8') . '...' : strip_tags($blog->content) !!}
                                    </p>
                                    <a href="{{route('front.blogdetails', [$blog->slug])}}" class="read-more-link">
                                        {{__('Read More')}} <i class="fas fa-arrow-left"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    @endif
                </div>

                {{-- الترقيم (Pagination) --}}
                @if ($blogs->total() > 6)
                <div class="row mt-4">
                    <div class="col-12 d-flex justify-content-center">
                        <nav class="custom-pagination">
                            {{$blogs->appends(['term'=>request()->input('term'), 'month'=>request()->input('month'), 'year'=>request()->input('year'), 'category' => request()->input('category')])->links()}}
                        </nav>
                    </div>
                </div>
                @endif
            </div>

            {{-- الجانب الجانبي (Sidebar) --}}
            {{-- <div class="col-lg-4 mt-5 mt-lg-0">
                <aside class="blog-sidebar">
                    <div class="sidebar-widget search-widget">
                        <h4 class="widget-title">{{__('Search')}}</h4>
                        <form action="{{route('front.blogs')}}" method="GET">
                            <div class="search-input-group">
                                <input type="text" name="term" placeholder="{{__('Search Blogs')}}..." value="{{request()->input('term')}}">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="sidebar-widget category-widget">
                        <h4 class="widget-title">{{__('Categories')}}</h4>
                        <ul class="category-list">
                            @foreach ($bcats as $bcat)
                            <li class="{{request()->input('category') == $bcat->slug ? 'active' : ''}}">
                                <a href="{{route('front.blogs', ['category'=>$bcat->slug])}}">
                                    {{convertUtf8($bcat->name)}}
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-widget newsletter-widget">
                        <div class="newsletter-box" style="background-color: #0A3041;">
                            <i class="far fa-paper-plane mb-3"></i>
                            <h3>{{__('Newsletter')}}</h3>
                            <p>{{__('Subscribe for latest updates and news')}}</p>
                            <form id="subscribeForm" action="{{route('front.subscribe')}}" method="POST">
                                @csrf
                                <input type="email" name="email" placeholder="{{__('Your Email')}}" required>
                                <p id="erremail" class="text-danger err-email"></p>
                                <button type="submit" class="subscribe-btn">{{__('Subscribe')}}</button>
                            </form>
                        </div>
                    </div>
                </aside>
            </div> --}}
        </div>
    </div>
</div>
<style>
   :root {
    --primary: #25D06F;
    --secondary: #0A3041;
    --text-gray: #666;
}

.modern-blog-listing-page {
    background-color: #f9f9f9;
}

/* بطاقة المقال */
.blog-post-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    transition: 0.3s;
    height: 100%;
    border: 1px solid #eee;
}

.blog-post-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.1);
}

.post-img-wrapper {
    position: relative;
    height: 220px;
    overflow: hidden;
}

.post-img-wrapper img {
    width: 100%; height: 100%; object-fit: cover;
}

.post-date-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: var(--primary);
    color: var(--secondary);
    padding: 8px 12px;
    border-radius: 12px;
    text-align: center;
    line-height: 1.2;
    font-weight: 800;
}

.post-info { padding: 25px; }

.post-meta { font-size: 0.85rem; color: var(--primary); margin-bottom: 10px; font-weight: 700; }

.post-title { font-size: 1.25rem; font-weight: 800; margin-bottom: 15px; }
.post-title a { color: var(--secondary); text-decoration: none; }
.post-title a:hover { color: var(--primary); }

.post-excerpt { font-size: 0.95rem; color: var(--text-gray); line-height: 1.6; margin-bottom: 20px; }

.read-more-link {
    color: var(--secondary);
    font-weight: 800;
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
}

.read-more-link i { transition: 0.3s; color: var(--primary); }
.read-more-link:hover i { transform: translateX(-5px); }

/*Sidebar Widgets */
.sidebar-widget {
    background: #fff;
    padding: 30px;
    border-radius: 20px;
    margin-bottom: 30px;
    border: 1px solid #eee;
}

.widget-title {
    font-size: 1.2rem;
    font-weight: 800;
    color: var(--secondary);
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--primary);
    display: inline-block;
}

.search-input-group {
    position: relative;
}

.search-input-group input {
    width: 100%;
    padding: 12px 20px;
    border: 2px solid #eee;
    border-radius: 12px;
    outline: none;
}

.search-input-group button {
    position: absolute;
    left: 5px; top: 5px;
    background: var(--primary);
    border: none;
    width: 40px; height: 40px;
    border-radius: 10px;
    color: var(--secondary);
}

.category-list { list-style: none; padding: 0; }
.category-list li {
    padding: 12px 0;
    border-bottom: 1px solid #f4f4f4;
}

.category-list li a {
    display: flex; justify-content: space-between;
    color: var(--secondary); text-decoration: none; font-weight: 600;
}

.category-list li.active a, .category-list li a:hover { color: var(--primary); }

/* Newsletter Sidebar Box */
.newsletter-box {
    border-radius: 20px;
    padding: 40px 25px;
    text-align: center;
    color: #fff;
}

.newsletter-box i { font-size: 3rem; color: var(--primary); }

.newsletter-box input {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: none;
    margin-bottom: 15px;
    text-align: center;
}

.subscribe-btn {
    background: var(--primary);
    color: var(--secondary);
    width: 100%;
    border: none;
    padding: 12px;
    border-radius: 10px;
    font-weight: 800;
    transition: 0.3s;
}

.subscribe-btn:hover { background: #fff; }

/* Responsive */
@media (max-width: 768px) {
    .post-img-wrapper { height: 180px; }
    .post-title { font-size: 1.1rem; }
}

</style>
  <!--    blog lists end   -->
@endsection
