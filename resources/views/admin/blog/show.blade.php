<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مؤسسة زهرةالريان</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('fav.svg') }}">
    <link rel="shortcut icon" href="{{ asset('fav.svg') }}">

</head>

<body>

    <nav class="mobile-nav" id="mobileNav">
        <div class="close-btn" id="closeBtn"><i class="fas fa-times"></i></div>
        <ul>
            <li><a href="/#home">الرئيسية</a></li>
            <li><a href="/#about">من نحن</a></li>
            <li><a href="/#services">خدماتنا</a></li>
            <li><a href="/#process">خطوات العمل</a></li>
            <li><a href="{{ route('blog.index') }}">المدونات</a></li>
            <li><a href="/#why-us">لماذا نحن</a></li>
            <li><a href="/#contact">تواصل معنا</a></li>
        </ul>
    </nav>
    <header id="header">
        <div class="container">
            <div class="logo">
                <h1><i class="fas fa-leaf"></i> حدائق و ملاعب زهرة الريان </h1>
            </div>
            <ul class="nav-links">
                <li><a href="/#home" class="active">الرئيسية</a></li>
                <li><a href="/#about">من نحن</a></li>
                <li><a href="/#services">خدماتنا</a></li>
                <li><a href="/#process">خطوات العمل</a></li>
                <li><a href="{{ route('blog.index') }}">المدونات</a></li>
                <li><a href="/#contact">تواصل معنا</a></li>
            </ul>
            <div class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content" data-aos="zoom-in" data-aos-duration="1500">
            <h1>حوّل حلمك إلى <span class="highlight-text">واقع أخضر</span></h1>
            <div class="experience-badge" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-certificate"></i> خبرة أكثر من 15 سنة في مجال تنسيق الحدائق والملاعب
            </div>

            <p>
                في مؤسسة حدائق و ملاعب زهرة الريان، نبتكر مساحات خضراء تخطف الأنظار، وملاعب بمعايير عالمية، وديكورات
                تروي قصص الفخامة. دعنا نصمم لك ملاذاً طبيعياً يجمع بين الهدوء والجمال في قلب منزلك.
            </p>
            <div class="hero-btns">
                <a href="tel:0509085728" class="btn btn-secondary">اتصل بنا <i class="fas fa-phone-alt"></i></a>
                <a href="https://wa.me/966509085728" target="_blank" class="btn btn-primary pulse-btn">راسلنا واتساب <i
                        class="fab fa-whatsapp"></i> </a>

            </div>
        </div>
    </section>

    {{-- تفاصيل المقال --}}
    <section class="blog-details">
        <div class="container">

            <div class="blog-header">
                <h1>{{ $blog->title }}</h1>
            </div>

            <div class="blog-image">
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
            </div>

            <div class="blog-body">
                {!! $blog->content !!}
            </div>

        </div>
    </section>

    {{-- أحدث المدونات --}}
    @if ($latestBlogs->count())
        <section class="latest-blogs">
            <div class="container">

                <div class="section-title">
                    <h2>أحدث المدونات</h2>
                    <p>تعرّف على آخر ما كتبناه</p>
                </div>

                <div class="blogs-grid">
                    @foreach ($latestBlogs as $item)
                        <div class="blog-card">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">

                            <div class="blog-content">
                                <h3>{{ $item->title }}</h3>
                                <p>
                                    {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 90) }}
                                </p>

                                <a href="{{ route('blog.show', $item->id) }}" class="read-more">
                                    اقرأ المزيد
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    @endif
    <style>
        /* ================== تفاصيل المقال ================== */
        .blog-details {
            padding: 90px 0 60px;
            background: linear-gradient(to bottom, #f4f8f6, #ffffff);
        }

        .blog-header h1 {
            text-align: center;
            font-size: 40px;
            font-weight: 800;
            color: #1f4037;
            margin-bottom: 35px;
            line-height: 1.4;
        }

        .blog-image {
            text-align: center;
            margin-bottom: 35px;
        }

        .blog-image img {
            max-width: 100%;
            max-height: 450px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .blog-body {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            line-height: 2.1;
            font-size: 17px;
            color: #444;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .blog-body h2,
        .blog-body h3 {
            color: #2f5d50;
            margin: 30px 0 15px;
        }

        /* ================== أحدث المدونات ================== */
        .latest-blogs {
            padding: 80px 0;
            background: #f6f9f7;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 34px;
            font-weight: 800;
            color: #1f4037;
        }

        .section-title p {
            color: #777;
            margin-top: 10px;
            font-size: 15px;
        }

        /* ================== شبكة المدونات ================== */
        .blogs-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        @media (max-width: 992px) {
            .blogs-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .blogs-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ================== كارد المدونة ================== */
        .blog-card {
            background: #fff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
            transition: all 0.35s ease;
        }

        .blog-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.15);
        }

        .blog-card img {
            width: 100%;
            height: 210px;
            object-fit: cover;
        }

        .blog-content {
            padding: 25px;
        }

        .blog-content h3 {
            font-size: 21px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #2f5d50;
            line-height: 1.4;
        }

        .blog-content p {
            font-size: 14px;
            color: #666;
            line-height: 1.9;
        }

        /* ================== زر اقرأ المزيد ================== */
        .read-more {
            display: inline-block;
            margin-top: 18px;
            padding: 10px 22px;
            border-radius: 30px;
            background: linear-gradient(135deg, #3da35d, #2f5d50);
            color: #fff;
            font-weight: bold;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .read-more:hover {
            background: linear-gradient(135deg, #2f5d50, #1f4037);
            transform: translateX(-4px);
        }
    </style>


    <footer>
        <div class="container">
            <div class="footer-row">
                <div class="footer-col">
                    <h3><i class="fas fa-leaf"></i> حدائق و ملاعب زهرة الريان</h3>
                    <p>
                        مؤسسة رائدة في مجال تنسيق الحدائق والملاعب. نسعى لتحويل المساحات إلى واحات خضراء تسر الناظرين،
                        مع الالتزام بأعلى معايير الجودة والدقة في التنفيذ.
                    </p>
                    <div class="footer-social-icons">
                        <a href="https://www.instagram.com/landscape1801?utm_source=qr&igsh=MXN6Z3MwenAwcWEweQ=="
                            target="_blank" class="icon-link insta-icon"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@user63571166347308?_r=1&_t=ZS-91vAYhCdVKP" target="_blank"
                            class="icon-link tiktok-icon"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h3>روابط تهمك</h3>
                    <ul class="footer-links-list">
                        <li><a href="/#home">الرئيسية</a></li>
                        <li><a href="/#about">من نحن</a></li>
                        <li><a href="/#services">خدماتنا</a></li>
                        <li><a href="/#process">كيف نعمل</a></li>
                        <li><a href="/#contact">تواصل معنا</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>بيانات التواصل</h3>

                    <div class="contact-row">
                        <div class="text">الرياض، المملكة العربية السعودية</div>
                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    </div>

                    <div class="contact-row">
                        <div class="text"><a href="tel:0509085728"
                                style="color:inherit; text-decoration:none;">0509085728</a></div>
                        <div class="icon"><i class="fas fa-phone-alt"></i></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <p>جميع الحقوق محفوظة &copy; مؤسسة حدائق و ملاعب زهرة الريان</p>
                <p class="developer">
                    تصميم و برمجة
                    <a href="https://www.facebook.com/share/17UzqgSwiu/" target="_blank">GMTWeb</a>
                </p>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('script.js') }}"></script>
</body>

</html>
