<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مؤسسة زهرةالريان</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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

    <section id="services" class="services-section section-padding section-gradient-2">
        <div class="container">
            <h2 class="section-title center-title" data-aos="fade-up">خدماتنا المتكاملة</h2>
            <div class="services-grid">
                @foreach ($blogs as $blog)
                    <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-img">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="زراعة النخيل">
                        </div>
                        <div class="service-content">
                            <h3>{{ $blog->title }}</h3>
                            <p>
                                {{ Str::limit(strip_tags($blog->content), 120) }}
                                <br>
                                <a href="{{ route('blog.show', $blog->id) }}" class="details-link">اضغط للتفاصيل <i
                                        class="fas fa-arrow-left"></i></a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-wrapper">
                {{ $blogs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>

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
    <script src="script.js"></script>
</body>

</html>
