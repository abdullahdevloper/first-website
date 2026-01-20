@extends('front.gym.layout')


@section('content')

    
    <!-- مكتبات الخطوط والأيقونات والـ Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* =========================================
           GLOBAL STYLES
           ========================================= */
        body {
            font-family: 'Open Sans', sans-serif;
            color: #555;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        h1, h2, h3, h4 {
            font-family: 'Oswald', sans-serif;
            text-transform: uppercase;
        }

        :root {
            --primary-red: #25D06F;
            --primary-navy: #001530;
            --text-grey: #666;
        }

        /* =========================================
           SECTION 1: WHO WE ARE
           ========================================= */
        .who-we-are-section {
            padding: 80px 0;
            background: #fff;
        }

        .section-subtitle-red {
            color: var(--primary-red);
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 20px;
            display: block;
            letter-spacing: 1px;
            font-family: 'Oswald', sans-serif;
        }

        .who-text p {
            font-size: 0.95rem;
            line-height: 1.8;
            color: var(--text-grey);
            margin-bottom: 25px;
            text-align: justify;
        }

        /* مربع سنوات الخبرة */
        .experience-box {
            background-color: var(--primary-red);
            color: #fff;
            padding: 20px;
            display: inline-block;
            text-align: center;
            font-weight: 700;
            margin-top: 10px;
            box-shadow: 0 10px 20px rgba(227, 30, 36, 0.2);
            min-width: 160px;
        }

        .experience-box .years {
            font-size: 2.5rem;
            line-height: 1;
            font-family: 'Oswald', sans-serif;
            margin-bottom: 5px;
        }

        .experience-box .label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* شبكة الصور */
        .image-grid .row { margin-right: -5px; margin-left: -5px; }
        .image-grid .col-6 { padding-right: 5px; padding-left: 5px; margin-bottom: 10px; }
        
        .grid-img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            display: block;
        }
        
        /* زر الفيديو */
        .video-thumb { position: relative; cursor: pointer; }
        .play-overlay {
            position: absolute; top: 0; right: 0; width: 60px; height: 60px;
            background: var(--primary-red); display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 1.5rem; transition: 0.3s;
        }
        .play-overlay:hover { background: #25D06F; }


        /* =========================================
           SECTION 2: FACTORY STATS (Dark Background)
           ========================================= */
        .stats-section {
            position: relative;
            /* استبدل الرابط أدناه بصورة المصنع الخاصة بك */
            background-image: url('http://localhost/first-parts/assets/front/img/product/featured/696e8e4857bd1.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* تثبيت الخلفية */
            background-repeat: no-repeat;
            padding: 100px 0;
            color: #fff;
            text-align: center;
        }

        /* طبقة التعتيم */
        .stats-section::before {
            content: "";
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.85); /* تعتيم قوي */
            z-index: 1;
        }

        .stats-section .container { position: relative; z-index: 2; }

        .stats-title { font-size: 2rem; font-weight: 700; margin-bottom: 50px; letter-spacing: 1px; }
        .stats-sub-title { font-size: 2rem; font-weight: 700; margin: 60px 0 50px; letter-spacing: 1px; text-transform: uppercase; }

        .stat-item { margin-bottom: 30px; }

        .stat-icon { font-size: 3rem; color: var(--primary-red); margin-bottom: 20px; }
        
        /* جعل الأيقونات Outline */
        .stat-icon i { -webkit-text-stroke: 1.5px var(--primary-red); color: transparent; }
        /* استثناء لبعض الأيقونات لتكون Filled */
        .stat-icon .fa-globe, .stat-icon .fa-users { -webkit-text-stroke: 0; color: var(--primary-red); }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            font-family: 'Oswald', sans-serif;
            margin-bottom: 8px;
            color: #fff;
        }

        .stat-label { font-size: 0.8rem; text-transform: uppercase; color: #ccc; font-weight: 600; letter-spacing: 1px; }


        /* =========================================
           SECTION 3: DISTINCTION
           ========================================= */
        .distinction-section { padding: 90px 0; background: #fff; text-align: center; }
        
        .dist-subtitle {
            color: var(--primary-red);
            font-weight: 700;
            font-size: 0.95rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 20px;
            display: block;
            font-family: 'Oswald', sans-serif;
        }

        .dist-title {
            color: var(--primary-navy);
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1.3;
            margin-bottom: 35px;
        }

        .dist-text {
            max-width: 850px;
            margin: 0 auto;
            color: var(--text-grey);
            font-size: 1.05rem;
            line-height: 1.7;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .grid-img { height: 130px; }
            .dist-title { font-size: 1.8rem; }
            .stats-title, .stats-sub-title { font-size: 1.6rem; }
            .experience-box { display: block; width: 100%; margin-bottom: 30px; }
        }
    </style>
    <!-- =========================================
         1. SECTION: WHO WE ARE
         ========================================= -->
    <section class="who-we-are-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Column -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <span class="section-subtitle-red">WHO WE ARE</span>
                    
                    <div class="who-text">
                        <p>FIRST has earned an outstanding reputation for consistently delivering high-quality products. FIRST has meticulously crafted an extensive range of brake components, including brake pads, brake shoes, disc rotors, fuel pumps, brake fluids, horns, and shock absorbers. FIRST's unwavering dedication to quality has been a driving force behind its substantial growth in market share, with products now being sold in over 80 countries.</p>
                        
                        <p>A cornerstone of FIRST's success lies in its exceptional Research and Development, which is wholeheartedly committed to continuously refining and enhancing original formulas in ceramic, semi-metal, and low-metal materials.</p>
                    </div>

                    <div class="d-flex justify-content-center justify-content-lg-start">
                         <div class="experience-box">
                            <!-- Counter: Years Experience -->
                            <div class="years counter" data-target="22" data-suffix=" +">0 +</div>
                            <div class="label">YEARS EXPERIENCE</div>
                        </div>
                    </div>
                </div>

                <!-- Images Column -->
                <div class="col-lg-6">
                    <div class="image-grid">
                        <div class="row">
                            <div class="col-6"><img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=400&h=300" class="grid-img" alt="Factory 1"></div>
                            <div class="col-6 video-thumb">
                                <img src="https://images.unsplash.com/photo-1565043589221-1a6fd9ae45c7?auto=format&fit=crop&w=400&h=300" class="grid-img" alt="Factory 2">
                                <div class="play-overlay"><i class="fas fa-play"></i></div>
                            </div>
                            <div class="col-6"><img src="https://images.unsplash.com/photo-1531297461136-82bf88d8e935?auto=format&fit=crop&w=400&h=300" class="grid-img" alt="Factory 3"></div>
                            <div class="col-6"><img src="https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?auto=format&fit=crop&w=400&h=300" class="grid-img" alt="Factory 4"></div>
                            <div class="col-6"><img src="https://images.unsplash.com/photo-1621905252507-b35492cc74b4?auto=format&fit=crop&w=400&h=300" class="grid-img" alt="Factory 5"></div>
                            <div class="col-6"><img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=400&h=300" class="grid-img" alt="Factory 6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================
         2. SECTION: FACTORY STATS
         ========================================= -->
    <section class="stats-section">
        <div class="container">
            <h2 class="stats-title">FIRST FACTORY STATS</h2>
            
            <div class="row justify-content-center">
                <!-- Stat 1 -->
                <div class="col-md-4 col-sm-6 stat-item">
                    <div class="stat-icon"><i class="far fa-building"></i></div>
                    <div class="stat-number counter" data-target="256000" data-suffix=" Sq Mtr">0 Sq Mtr</div>
                    <div class="stat-label">OVERALL AREA</div>
                </div>
                <!-- Stat 2 -->
                <div class="col-md-4 col-sm-6 stat-item">
                    <div class="stat-icon"><i class="fas fa-file-signature"></i></div>
                    <div class="stat-number counter" data-target="256000" data-suffix=" Sq Mtr">0 Sq Mtr</div>
                    <div class="stat-label">BUILDING AREA</div>
                </div>
                <!-- Stat 3 -->
                <div class="col-md-4 col-sm-6 stat-item">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-number counter" data-target="1100" data-suffix=" +">0 +</div>
                    <div class="stat-label">TOTAL EMPLOYEES</div>
                </div>
            </div>

            <h2 class="stats-sub-title">YEARLY CAPACITY</h2>

            <div class="row justify-content-center">
                <!-- Capacity 1 -->
                <div class="col-lg-3 col-6 stat-item">
                    <div class="stat-icon"><i class="far fa-building"></i></div>
                    <div class="stat-number counter" data-target="3.6" data-decimals="1" data-suffix=" Million Sets">0 Million Sets</div>
                    <div class="stat-label">BRAKE SHOES</div>
                </div>
                <!-- Capacity 2 -->
                <div class="col-lg-3 col-6 stat-item">
                    <div class="stat-icon"><i class="fas fa-paste"></i></div>
                    <div class="stat-number counter" data-target="15" data-suffix=" Million Sets">0 Million Sets</div>
                    <div class="stat-label">BRAKE PADS</div>
                </div>
                <!-- Capacity 3 -->
                <div class="col-lg-3 col-6 stat-item">
                    <div class="stat-icon"><i class="fas fa-globe"></i></div>
                    <div class="stat-number counter" data-target="80" data-suffix=" Million Pieces">0 Million Pieces</div>
                    <div class="stat-label">ACCESSORIES</div>
                </div>
                <!-- Capacity 4 -->
                <div class="col-lg-3 col-6 stat-item">
                    <div class="stat-icon"><i class="fas fa-cogs"></i></div>
                    <div class="stat-number counter" data-target="250" data-suffix=" Tools">0 Tools</div>
                    <div class="stat-label">PRODUCT MODELS</div>
                </div>
            </div>
        </div>
    </section>


    <!-- =========================================
         3. SECTION: DISTINCTION
         ========================================= -->
    <section class="distinction-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <span class="dist-subtitle">OVER TWO DECADES OF DISTINCTION</span>
                    
                    <h2 class="dist-title">
                        ENCOMPASSING OVER 80 COUNTRIES<br>
                        AND THE LEGACY CONTINUES
                    </h2>

                    <p class="dist-text">
                        Taking a proactive stand on quality, FIRST maximizes its market share while enabling retailers to achieve brand excellence. We display unparalleled quality, reliability, and road safety, making us the number ONE choice for brake products. Whether you are an enthusiast or an everyday commuter, we bestow absolute on-road confidence with our brake products.
                    </p>
                </div>
            </div>
        </div>
    </section>


        <!-- =========================================
             JAVASCRIPT FOR COUNTER ANIMATION
             ========================================= -->

    @endsection

    @section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.counter');
        
        const startCounter = (counter) => {
            // 1. قراءة البيانات وتنظيفها بشكل صارم جداً
            const rawTarget = counter.getAttribute('data-target');
            
            // إزالة أي شيء ليس رقماً أو نقطة (يحذف المسافات والفواصل والحروف)
            let cleanTarget = rawTarget ? rawTarget.toString().replace(/[^0-9.]/g, '') : '0';
            
            // تحويل إلى رقم، وإذا فشل التحويل نعتبره صفر
            let target = parseFloat(cleanTarget);
            if (isNaN(target)) target = 0;

            const suffix = counter.getAttribute('data-suffix') || '';
            // التأكد من أن المنازل العشرية رقم صحيح
            let decimals = parseInt(counter.getAttribute('data-decimals'));
            if (isNaN(decimals)) decimals = 0;
            
            const duration = 2000; // 2 ثانية
            let startTime = null;

            const animate = (currentTime) => {
                if (!startTime) startTime = currentTime;
                const progress = currentTime - startTime;
                
                // حساب النسبة (من 0 إلى 1)
                const percentage = Math.min(progress / duration, 1);
                
                // معادلة الحركة لجعلها ناعمة
                const easeOut = 1 - Math.pow(1 - percentage, 3);
                
                let currentCount = easeOut * target;

                // حماية إضافية: إذا كان الرقم الناتج غير صالح، استخدم الهدف مباشرة
                if (isNaN(currentCount)) currentCount = target;

                // العرض أثناء الحركة
                counter.innerText = currentCount.toLocaleString('en-US', {
                    minimumFractionDigits: decimals,
                    maximumFractionDigits: decimals
                }) + suffix;

                if (progress < duration) {
                    requestAnimationFrame(animate);
                } else {
                    // 2. الخطوة النهائية: ضمان عدم ظهور NaN أبداً
                    // نستخدم target المحسوب مسبقاً والذي تأكدنا أنه رقم
                    counter.innerText = target.toLocaleString('en-US', {
                        minimumFractionDigits: decimals,
                        maximumFractionDigits: decimals
                    }) + suffix;
                }
            };
            
            requestAnimationFrame(animate);
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    startCounter(counter);
                    observer.unobserve(counter);
                }
            });
        }, {
            threshold: 0.2
        });

        counters.forEach(counter => {
            observer.observe(counter);
        });
    });
</script>

    @endsection
