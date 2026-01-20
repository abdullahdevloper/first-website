@extends("front.$version.layout")

@section('pagename')
- {{__('Contact Us')}}
@endsection

@section('meta-keywords', "$be->contact_meta_keywords")
@section('meta-description', "$be->contact_meta_description")

@section('breadcrumb-title', $bs->contact_title)
@section('breadcrumb-subtitle', $bs->contact_subtitle)
@section('breadcrumb-link', __('Contact Us'))

@section('content')

<!-- Start Quick Enquiry Section -->
<div class="quick-enquiry-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="enquiry-wrapper">
                    
                    {{-- العنوان والنص الوصفي --}}
                    <div class="enquiry-header">
                        <h2 class="enquiry-title">QUICK ENQUIRY</h2>
                        <p class="enquiry-desc">
                            Please feel free to contact us by filling out the inquiry form provided. We will gladly respond back to you with your queries.
                        </p>
                    </div>

                    {{-- بداية الفورم --}}
                    <form action="{{route('front.sendmail')}}" class="contact-form" method="POST">
                        @csrf
                        
                        <div class="row">
                            
                            {{-- حقل الاسم الكامل (عرض كامل) --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="fullname">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="fullname" placeholder="Full Name" required>
                                    @error('name')
                                        <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- حقل البريد الإلكتروني (نصف عرض) --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                                    @error('email')
                                        <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- حقل الهاتف (نصف عرض) --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    {{-- تم إضافة كلاس لتهيئة مكتبة الأعلام إذا كانت مستخدمة، أو يبقى حقل عادي --}}
                                    <div class="phone-input-wrapper">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
                                    </div>
                                    @error('phone')
                                        <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- حقل الرسالة (عرض كامل) --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message">Comment or Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="5" placeholder=""></textarea>
                                    @error('message')
                                        <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- كود الكابتشا (إذا كان مفعلاً في نظامك) --}}
                            @if ($bs->is_recaptcha == 1)
                                <div class="col-12 mb-4">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                    @error('g-recaptcha-response')
                                        <p class="text-danger mb-0">{{ $message }}</p>
                                    @enderror
                                </div>
                            @endif

                            {{-- زر الإرسال --}}
                            <div class="col-12">
                                <button type="submit" class="btn-submit">Submit Now</button>
                            </div>

                        </div>
                    </form>
                    {{-- نهاية الفورم --}}

                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Quick Enquiry Section -->

<style>
    /* =========================================
       تنسيقات نموذج الاستفسار السريع (Quick Enquiry)
       ========================================= */
    .quick-enquiry-section {
        padding: 60px 0;
        background-color: #fff; /* خلفية القسم بيضاء */
    }

    /* الحاوية الرمادية للفورم */
    .enquiry-wrapper {
        background-color: #E9ECEF; /* لون رمادي فاتح مطابق للصورة */
        padding: 40px;
        /* لا يوجد بوردر راديوس أو ظلال في الصورة، تصميم مسطح */
    }

    /* 1. رأس النموذج */
    .enquiry-title {
        color: #001530; /* كحلي غامق */
        font-family: 'Oswald', sans-serif; /* خط العناوين */
        font-weight: 800;
        font-size: 2rem;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .enquiry-desc {
        color: #666;
        font-size: 0.95rem;
        font-family: 'Open Sans', sans-serif;
        margin-bottom: 30px;
    }

    /* 2. حقول الإدخال */
    .form-group {
        margin-bottom: 20px;
        text-align: left; /* محاذاة التسميات لليسار */
    }

    .form-group label {
        font-weight: 700;
        color: #333;
        margin-bottom: 8px;
        font-size: 0.9rem;
        font-family: 'Open Sans', sans-serif;
    }

    .form-group label .text-danger {
        color: #25D06F !important; /* النجمة الحمراء */
    }

    /* تخصيص الـ Inputs */
    .form-control {
        background-color: #ffffff;
        border: 1px solid #ddd; /* حدود خفيفة جداً أو بدون */
        border-radius: 2px; /* حواف شبه حادة */
        padding: 12px 15px;
        height: auto; /* ترك الارتفاع تلقائي مع البادينغ */
        font-size: 0.95rem;
        color: #555;
        box-shadow: none;
    }

    .form-control:focus {
        border-color: #ccc;
        box-shadow: none; /* إزالة توهج البوتستراب الافتراضي */
        background-color: #fff;
    }

    .form-control::placeholder {
        color: #aaa;
        font-weight: 400;
    }

    /* تخصيص الـ Textarea */
    textarea.form-control {
        resize: vertical; /* السماح بتغيير الحجم عمودياً فقط */
        min-height: 120px;
    }

    /* 3. زر الإرسال */
    .btn-submit {
        background-color: #005691; /* أزرق متوسط (مطابق للصورة) */
        color: #fff;
        border: none;
        padding: 12px 30px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s;
        border-radius: 2px;
        font-family: 'Open Sans', sans-serif;
    }

    .btn-submit:hover {
        background-color: #00447a; /* درجة أغمق عند التحويم */
    }

    /* استجابة الجوال */
    @media (max-width: 768px) {
        .enquiry-wrapper {
            padding: 20px;
        }
        .enquiry-title {
            font-size: 1.5rem;
        }
    }
</style>

<!--    contact form and map end   -->
@endsection
