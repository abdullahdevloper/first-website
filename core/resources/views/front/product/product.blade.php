@extends("front.$version.layout")

@section('pagename')
 -
 @if (empty($category))
 {{__('All')}}
 @else
 {{convertUtf8($category->name)}}
 @endif
 {{__('Products')}}
@endsection

@section('meta-keywords', "$be->products_meta_keywords")
@section('meta-description', "$be->products_meta_description")


@section('styles')
<link rel="stylesheet" href="{{asset('assets/front/css/jquery-ui.min.css')}}">
@endsection

@section('breadcrumb-title', convertUtf8($be->product_title))
@section('breadcrumb-subtitle', convertUtf8($be->product_subtitle))
@section('breadcrumb-link', __('Our Product'))

@section('content')

<!--    product section start    -->
{{-- <div class="product-area">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-3 col-md-6">
                <div class="shop-search mt-30">
                    <input type="text" placeholder="Search Keywords" class="input-search" name="search" value="{{request()->input('search') ? request()->input('search') : ''}}">
                    <i  class="fas fa-search input-search-btn cursor-pointer"></i>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="shop-dropdown mt-30 text-right">
                    <select name="type" id="type_sort">
                        <option value="new" {{ request()->input('type') == 'new' ? 'selected' : '' }}>{{__('Newest Product')}}</option>
                        <option value="old" {{ request()->input('type') == 'old' ? 'selected' : '' }}>{{__('Oldest Product')}}</option>

                        @if ($bex->catalog_mode == 0)
                            <option value="hight-to-low" {{ request()->input('type') == 'high-to-low' ? 'selected' : '' }}>{{__('High To Low')}}</option>
                            <option value="low-to-high" {{ request()->input('type') == 'low-to-high' ? 'selected' : '' }}>{{__('Low To High')}}</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-5 col-sm-7 order-2 order-lg-1">
                <div class="shop-sidebar">
                    <div class="shop-box shop-category">
                        <div class="sidebar-title">
                            <h4 class="title">{{__('Category')}}</h4>
                        </div>
                        <div class="category-item">
                            <ul>
                            <li class="{{ request()->input('category_id') == '' ? 'active-search' : '' }}" ><a data-href="0" class="category-id cursor-pointer">{{__('All')}}</a></li>
                                @foreach ($categories as $category)
                                <li class="{{ request()->input('category_id') == $category->id ? 'active-search' : '' }}"><a data-href="{{$category->id}}" class="category-id cursor-pointer">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @if($be->popular_tags)
                    <div class="shop-box shop-tag mt-30">
                        <div class="sidebar-title">
                            <h4 class="title">{{__('Populer Tags')}}</h4>
                        </div>
                        <div class="tag-item">
                            <ul>
                                <li class="{{ request()->input('tag') == '' ? 'active-search' : '' }}"><a data-href="" class="tag-id cursor-pointer">{{__('All')}}</a></li>
                                @foreach (explode(',',$be->popular_tags) as $tag)
                                <li class="{{ request()->input('tag') == $tag ? 'active-search' : '' }}"><a data-href="{{$tag}}" class="tag-id cursor-pointer">{{convertUtf8($tag)}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    @if ($bex->product_rating_system == 1 && $bex->catalog_mode == 0)
                    <div class="shop-box shop-filter mt-30">
                        <div class="sidebar-title">
                            <h4 class="title">{{__('Filter Products')}}</h4>
                        </div>
                        <div class="filter-item">
                             <ul class="checkbox_common checkbox_style2">
                                <li>
                                    <input type="radio" class="review_val" name="review_value"
                                    {{request()->input('review') == '' ? 'checked' : ''}}
                                    id="checkbox4" value="">
                                    <label for="checkbox4"><span></span> {{__('Show All')}}</label>
                                </li>

                                <li>
                                    <input type="radio" class="review_val" name="review_value" id="checkbox5" value="4" {{request()->input('review') == 4 ? 'checked' : ''}}
                                    id="checkbox4" value="all">
                                    <label for="checkbox5"><span></span>4 {{__('Star and higher')}}</label>
                                </li>

                                <li>
                                    <input type="radio" class="review_val" name="review_value" id="checkbox6" value="3" {{request()->input('review') == 3 ? 'checked' : ''}}
                                    id="checkbox4" value="all">
                                    <label for="checkbox6"><span></span>3 {{__('Star and higher')}}</label>
                                </li>

                                <li>
                                    <input type="radio" class="review_val" name="review_value" id="checkbox7" value="2" {{request()->input('review') == 2 ? 'checked' : ''}}
                                    id="checkbox4" value="all">
                                    <label for="checkbox7"><span></span>2 {{__('Star and higher')}}</label>
                                </li>

                                <li>
                                    <input type="radio" class="review_val" name="review_value" id="checkbox8" value="1" {{request()->input('review') == 1 ? 'checked' : ''}}
                                    id="checkbox4" value="all">
                                    <label for="checkbox8"><span></span>1 {{__('Star and higher')}}</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif

                    @if ($bex->catalog_mode == 0)
                        <div class="shop-box shop-price mt-30">
                            <div class="sidebar-title">
                                <h4 class="title">{{__('Filter By Price')}}</h4>
                            </div>
                            <div class="price-item">
                                <div class="price-range-box">
                                <form action="#">
                                    <div id="slider-range"></div>
                                    <span>{{__('Price')}}: </span>
                                    <input type="text" name="text" id="amount" />
                                    <button class="btn filter-button" type="button">{{__('Filter')}}</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="row">
                    @if($products->count() > 0)

                  @foreach ($products as $product)
                  <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="shop-item">
                        <div class="shop-thumb">
                            <img class="lazy" data-src="{{asset('assets/front/img/product/featured/'.$product->feature_image)}}" alt="">
                            <ul>
                                @if ($bex->catalog_mode == 0)
                                    <li><a href="{{route('front.product.checkout',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="{{__('Order Now')}}"><i class="far fa-credit-card"></i></a></li>

                                    <li><a class="cart-link" data-href="{{route('add.cart',$product->id)}}" data-toggle="tooltip" data-placement="top" title="{{__('Add to Cart')}}"><i class="fas fa-shopping-cart"></i></a></li>
                                @endif

                                <li><a href="{{route('front.product.details',$product->slug)}}" data-toggle="tooltip" data-placement="top" title="{{__('View Details')}}"><i class="fas fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <div class="shop-content text-center">
                            @if ($bex->product_rating_system == 1 && $bex->catalog_mode == 0)
                            <div class="rate">
                                <div class="rating" style="width:{{$product->rating * 20}}%"></div>
                            </div>
                            @endif
                            <a class="{{$bex->product_rating_system == 0 || $bex->catalog_mode == 1 ? 'mt-3' : ''}}" href="{{route('front.product.details',$product->slug)}}">
                                {{strlen($product->title) > 40 ? mb_substr($product->title,0,40,'utf-8') . '...' : $product->title}}
                            </a> <br>

                            @if ($bex->catalog_mode == 0)
                                <span>
                                    {{$bex->base_currency_symbol_position == 'left' ? $bex->base_currency_symbol : ''}}{{$product->current_price}}{{$bex->base_currency_symbol_position == 'right' ? $bex->base_currency_symbol : ''}}
                                    @if (!empty($product->previous_price))
                                        <del>  <span class="prepice"> {{ $bex->base_currency_symbol_position == 'left' ? $bex->base_currency_symbol : '' }}{{$product->previous_price}}{{ $bex->base_currency_symbol_position == 'right' ? $bex->base_currency_symbol : '' }}</span></del>
                                    @endif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                  @endforeach
                  @else
                    <div class="col-12 text-center py-5 bg-light" style="margin-top: 30px;">
                        <h4 class="text-center">{{__('Product Not Found')}}</h4>
                    </div>
                  @endif
              </div>
                <div class="row">
                    <div class="col-md-12">
                        <nav class="pagination-nav {{$products->count() > 6 ? 'mb-4' : ''}}">
                            {{ $products->appends(['minprice' => request()->input('minprice'), 'maxprice' => request()->input('maxprice'), 'category_id' => request()->input('category_id'), 'type' => request()->input('type'), 'tag' => request()->input('tag'), 'review' => request()->input('review')])->links() }}
                        </nav>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div> --}}
<div class="product-area-minimal">
    <div class="container">
        
        {{-- عنوان القسم --}}
        <div class="row">
            <div class="col-12">
                <h2 class="section-main-title">OUR PRODUCTS</h2>
            </div>
        </div>

        <div class="row">
            @if($products->count() > 0)
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="minimal-product-item">
                            
                            {{-- النقطة الحمراء الزخرفية --}}
                            <div class="decoration-dot"></div>

                            {{-- صورة المنتج --}}
                            <div class="img-holder">
                                <a href="{{route('front.product.details',$product->slug)}}">
                                    <img class="lazy img-fluid" 
                                         data-src="{{asset('assets/front/img/product/featured/'.$product->feature_image)}}" 
                                         alt="{{$product->title}}">
                                </a>
                            </div>

                            {{-- عنوان المنتج --}}
                            <h3 class="product-title">
                                <a href="{{route('front.product.details',$product->slug)}}">
                                    {{$product->title}}
                                </a>
                            </h3>

                            {{-- رابط المشاهدة --}}
                            <a href="{{route('front.product.details',$product->slug)}}" class="view-more-link">
                                VIEW MORE
                            </a>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <h3 class="text-muted">{{\__('Product Not Found')}}</h3>
                </div>
            @endif
        </div>

        {{-- التصفح (Pagination) --}}
        <div class="row mt-5">
            <div class="col-12">
                <nav class="pagination-nav d-flex justify-content-center">
                    {{ $products->appends(request()->input())->links() }}
                </nav>
            </div>
        </div>

    </div>
</div>

<style>
    /* =========================================
       تنسيقات قسم المنتجات (Minimal Style)
       ========================================= */
    .product-area-minimal {
        padding: 80px 0;
        background-color: #ffffff;
        font-family: 'Oswald', sans-serif; /* نفس الخط المستخدم في الأقسام السابقة */
    }

    /* عنوان القسم الرئيسي */
    .section-main-title {
        color: #001530; /* كحلي غامق */
        font-size: 2rem;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 50px;
        /* محاذاة لليسار قليلاً ليتناسب مع الشبكة، أو يمكن توسيطه */
        padding-left: 15px; 
    }

    /* كارت المنتج */
    .minimal-product-item {
        text-align: center;
        margin-bottom: 50px;
        padding: 0 15px;
        transition: transform 0.3s ease;
    }

    .minimal-product-item:hover {
        transform: translateY(-5px);
    }

    /* النقطة الحمراء */
    .decoration-dot {
        width: 8px;
        height: 8px;
        background-color: #25D06F;
        border-radius: 50%;
        margin: 0 auto 30px auto; /* توسيط ومسافة من الأسفل */
    }

    /* حاوية الصورة */
    .img-holder {
        height: 200px; /* ارتفاع ثابت لتوحيد الصور */
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        overflow: hidden;
    }

    .img-holder img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        transition: transform 0.4s ease;
    }

    .minimal-product-item:hover .img-holder img {
        transform: scale(1.05);
    }

    /* عنوان المنتج */
    .product-title {
        font-size: 1.25rem;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 15px;
        line-height: 1.2;
    }

    .product-title a {
        color: #001530;
        text-decoration: none;
        transition: color 0.3s;
    }

    .product-title a:hover {
        color: #25D06F;
    }

    /* رابط VIEW MORE */
    .view-more-link {
        color: #25D06F;
        font-size: 0.85rem;
        font-weight: 600; /* Open Sans SemiBold */
        text-transform: uppercase;
        text-decoration: none;
        letter-spacing: 0.5px;
        font-family: 'Open Sans', sans-serif; /* خط النصوص */
        transition: opacity 0.3s;
    }

    .view-more-link:hover {
        opacity: 0.8;
        text-decoration: none;
        color: #25D06F;
    }

    /* تنسيق الترقيم (Pagination) ليتناسب مع التصميم الجديد */
    .pagination-nav .page-link {
        color: #001530;
        border: none;
        font-weight: bold;
    }
    .pagination-nav .page-item.active .page-link {
        background-color: #25D06F;
        border-color: #25D06F;
        color: #fff;
    }
</style>


@endsection


@section('scripts')
<script src="{{asset('assets/front/js/jquery.ui.js')}}"></script>

@if ($bex->catalog_mode == 0)
    <script src="{{asset('assets/front/js/cart.js')}}"></script>
    <script>
        var position = "{{$bex->base_currency_symbol_position}}";
        var symbol = "{{$bex->base_currency_symbol}}";

        // console.log(position,symbol);
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: '{{$maxprice }}',
            values: [ '{{ !empty(request()->input('minprice')) ? request()->input('minprice') : $minprice }}', {{ !empty(request()->input('maxprice')) ? request()->input('maxprice') : $maxprice }} ],
            slide: function( event, ui ) {
            $( "#amount" ).val( (position == 'left' ? symbol : '') + ui.values[ 0 ] + (position == 'right' ? symbol : '') + " - " + (position == 'left' ? symbol : '') + ui.values[ 1 ] + (position == 'right' ? symbol : '') );
        }
        });
        $( "#amount" ).val( (position == 'left' ? symbol : '') + $( "#slider-range" ).slider( "values", 0 ) + (position == 'right' ? symbol : '') + " - " + (position == 'left' ? symbol : '') + $( "#slider-range" ).slider( "values", 1 ) + (position == 'right' ? symbol : '') );

    </script>
@endif


<script>

    let maxprice = 0;
    let minprice = 0;
    let typeSort = '';
    let category = '';
    let tag = '';
    let review = '';
    let search = '';


    $(document).on('click','.filter-button',function(){
        let filterval = $('#amount').val();
        filterval = filterval.split('-');
        maxprice = filterval[1].replace('$','');
        minprice = filterval[0].replace('$','');
        maxprice = parseInt(maxprice);
        minprice = parseInt(minprice);
        $('#maxprice').val(maxprice);
        $('#minprice').val(minprice);
        $('#search-button').click();
    });

$(document).on('change','#type_sort',function(){
    typeSort = $(this).val();
    $('#type').val(typeSort);
    $('#search-button').click();
})
$(document).ready(function(){
    typeSort = $('#type_sort').val();
    $('#type').val(typeSort);
})

$(document).on('click','.category-id',function(e){
    e.preventDefault();
    category = '';
    if($(this).attr('data-href') != 0){
        category = $(this).attr('data-href');
    }
    $('#category_id').val(category);
    $('#search-button').click();
})
$(document).on('click','.tag-id',function(){
    tag = '';
    if($(this).attr('data-href') != 0){
        tag = $(this).attr('data-href');
    }
   $('#tag').val(tag);
   $('#search-button').click();
})

$(document).on('click','.review_val',function(){
    review = $(".review_val:checked").val();
    $('#review').val(review);
    $('#search-button').click();
})

$(document).on('keypress','.input-search',function(e){
    var key = e.which;
    if(key == 13)  // the enter key code
    {
        search = $('.input-search').val();
        $('#search').val(search);
        $('#search-button').click();
        return false;  
    }

})

</script>
@endsection
