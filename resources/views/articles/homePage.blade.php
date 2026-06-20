<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مجله آنلاین | صفحه اول</title>
    <!-- Font Awesome برای آیکون‌ها -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafc;
            color: #1e293b;
            line-height: 1.6;
            direction: rtl;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ============================================================ */
        /* HEADER با منوی تاگل کاربر و منوی افقی کنار لوگو              */
        /* ============================================================ */
        .main_header {
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            padding: 0 20px;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid #e9edf2;
        }

        .header_container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .menu_wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 0;
        }

        /* ===== بخش چپ (لوگو + منوی اصلی) ===== */
        .header-left {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        /* ===== LOGO ===== */
        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .logo-link img {
            height: 48px;
            width: auto;
            display: block;
            transition: transform 0.2s;
        }

        .logo-link:hover img {
            transform: scale(1.03);
        }

        /* ===== منوی اصلی (افقی) ===== */
        .main-nav {
            display: flex;
            align-items: center;
            list-style: none;
            gap: 6px;
        }

        .main-nav li a {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            color: #1e293b;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            border-radius: 12px;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .main-nav li a:hover {
            background: #f1f5f9;
            color: #3b82f6;
        }

        .main-nav li a.current {
            background: #eff6ff;
            color: #2563eb;
            font-weight: 600;
        }

        /* ===== بخش راست (کاربر) ===== */
        .header-right {
            display: flex;
            align-items: center;
        }

        /* ===== USER PROFILE (تاگل‌شونده) ===== */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 4px 12px 4px 4px;
            background: #f8fafc;
            border-radius: 50px;
            border: 1px solid #e2e8f0;
            transition: all 0.25s;
            cursor: pointer;
            position: relative;
        }

        .user-profile:hover {
            background: #f1f5f9;
            border-color: #94a3b8;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            background: #e2e8f0;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            line-height: 1.3;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
            color: #0f172a;
        }

        .user-role {
            font-size: 12px;
            color: #64748b;
        }

        .user-dropdown-icon {
            color: #94a3b8;
            font-size: 14px;
            margin-right: 4px;
            transition: transform 0.3s;
        }

        .user-profile.active .user-dropdown-icon {
            transform: rotate(180deg);
        }

        /* ===== منوی تاگل کاربر ===== */
        .user-dropdown-menu {
            position: absolute;
            top: calc(100% + 12px);
            left: 0;
            right: 0;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
            border: 1px solid #e2e8f0;
            padding: 8px 0;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .user-profile.active .user-dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .user-dropdown-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 20px;
            color: #1e293b;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .user-dropdown-menu a:hover {
            background: #f1f5f9;
            color: #3b82f6;
        }

        .user-dropdown-menu a i {
            width: 20px;
            color: #64748b;
        }

        .user-dropdown-menu .logout-item {
            color: #ef4444;
            border-top: 1px solid #e2e8f0;
            margin-top: 4px;
            padding-top: 8px;
        }

        .user-dropdown-menu .logout-item i {
            color: #ef4444;
        }

        .user-dropdown-menu .logout-item:hover {
            background: #fef2f2;
            color: #dc2626;
        }

        /* ===== دکمه‌های لاگین/رجیستر (مهمان) ===== */
        .auth-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .btn-outline {
            padding: 8px 18px;
            border: 2px solid #e2e8f0;
            border-radius: 40px;
            color: #1e293b;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s;
        }

        .btn-outline:hover {
            border-color: #3b82f6;
            color: #3b82f6;
            background: #f8fafc;
        }

        .btn-primary {
            padding: 8px 22px;
            background: #3b82f6;
            border-radius: 40px;
            color: #ffffff !important;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
        }

        /* ============================================================ */
        /* HERO SECTION */
        /* ============================================================ */
        .hero {
            padding: 60px 0 40px;
            background: linear-gradient(145deg, #ffffff 0%, #f1f5f9 100%);
            border-radius: 32px;
            margin: 30px 0 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.03);
        }

        .hero-grid {
            display: flex;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
            padding: 20px;
        }

        .hero-text {
            flex: 1 1 300px;

        }

        .hero-text h2 {
            font-size: 36px;
            font-weight: 700;
            line-height: 1.3;
            color: #0f172a;
        }

        .hero-text h2 span {
            color: #3b82f6;
        }

        .hero-text p {
            font-size: 18px;
            color: #475569;
            margin: 16px 0 24px;
            max-width: 500px;
        }

        .btn-primary-hero {
            display: inline-block;
            background-color: #3b82f6;
            color: #fff;
            padding: 12px 32px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s, transform 0.1s;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-primary-hero:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
        }

        .hero-image {
            flex: 1 1 300px;
            text-align: center;
        }

        .hero-image img {
            max-width: 100%;
            border-radius: 28px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        /* ============================================================ */
        /* آخرین مقاله (Latest Post) */
        /* ============================================================ */
        .section-title {
            font-size: 28px;
            font-weight: 700;
            margin: 50px 0 20px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            right: 0;
            width: 60px;
            height: 4px;
            background: #3b82f6;
            border-radius: 4px;
        }

        .latest-post-card {
            background: #ffffff;
            border-radius: 32px;
            padding: 25px;
            margin: 20px 0 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            align-items: center;
            border: 1px solid #e9edf2;
            transition: box-shadow 0.25s;
        }

        .latest-post-card:hover {
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.06);
        }

        .post-img {
            flex: 1 1 280px;
        }

        .post-img img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 24px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
            display: block;
        }

        .post-content {
            flex: 2 1 320px;
        }

        .post-badge {
            display: inline-block;
            background: #e0f2fe;
            color: #0369a1;
            font-size: 14px;
            font-weight: 600;
            padding: 4px 16px;
            border-radius: 30px;
            margin-bottom: 10px;
        }

        .post-content h3 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #0f172a;
        }

        .post-content h3 a {
            text-decoration: none;
            color: inherit;
            transition: color 0.15s;
        }

        .post-content h3 a:hover {
            color: #3b82f6;
        }

        .post-meta {
            display: flex;
            gap: 20px;
            color: #64748b;
            font-size: 14px;
            margin: 6px 0 12px;
            flex-wrap: wrap;
        }

        .post-meta i {
            font-style: normal;
            background: #f1f5f9;
            padding: 2px 12px;
            border-radius: 30px;
        }

        .post-excerpt {
            color: #334155;
            margin: 12px 0 18px;
        }

        .read-more {
            color: #3b82f6;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .read-more:hover {
            text-decoration: underline;
        }

        /* ============================================================ */
        /* Info about site (درباره سایت) */
        /* ============================================================ */
        .about-site {
            background: #ffffff;
            border-radius: 32px;
            padding: 40px 35px;
            margin: 30px 0 50px;
            border: 1px solid #e9edf2;
        }

        .about-site h3 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 16px;
            color: #0f172a;
        }

        .about-site p {
            font-size: 17px;
            color: #334155;
            max-width: 800px;
            line-height: 1.8;
        }

        .about-site .highlight {
            color: #3b82f6;
            font-weight: 600;
        }

        /* ============================================================ */
        /* FOOTER */
        /* ============================================================ */
        footer {
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
            padding: 30px 0;
            margin-top: 30px;
        }

        .footer-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-links a {
            color: #475569;
            text-decoration: none;
            margin-right: 24px;
            font-size: 15px;
            transition: color 0.15s;
        }

        .footer-links a:hover {
            color: #3b82f6;
        }

        .copy {
            color: #94a3b8;
            font-size: 14px;
        }

        /* ============================================================ */
        /* RESPONSIVE */
        /* ============================================================ */
        @media (max-width: 992px) {
            .header-left {
                gap: 15px;
            }

            .main-nav li a {
                padding: 8px 12px;
                font-size: 14px;
            }

            .user-info {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .main_header {
                padding: 0 10px;
            }

            .header-left {
                gap: 10px;
                flex-wrap: wrap;
            }

            .main-nav {
                gap: 2px;
                flex-wrap: wrap;
            }

            .main-nav li a {
                padding: 6px 10px;
                font-size: 13px;
            }

            .logo-link img {
                height: 38px;
            }

            .user-avatar {
                width: 34px;
                height: 34px;
            }

            .auth-buttons .btn-outline,
            .auth-buttons .btn-primary {
                padding: 6px 14px;
                font-size: 12px;
            }

            .user-dropdown-menu {
                min-width: 170px;
                right: -20px;
                left: -20px;
            }

            .hero-text h2 {
                font-size: 28px;
            }

            .latest-post-card {
                flex-direction: column;
            }

            .post-img img {
                height: 190px;
            }

            .about-site {
                padding: 28px 20px;
            }
        }

        @media (max-width: 480px) {
            .header-left {
                flex-wrap: wrap;
                justify-content: center;
            }

            .main-nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            .user-profile {
                padding: 2px 8px 2px 2px;
            }

            .user-avatar {
                width: 30px;
                height: 30px;
            }
        }
    </style>
</head>

<body>

    <!-- ============================================================ -->
    <!-- HEADER با منوی تاگل کاربر و منوی افقی کنار لوگو              -->
    <!-- ============================================================ -->
    @include('layouts.partials.header')

    <!-- ============================================================ -->
    <!-- MAIN CONTENT -->
    <!-- ============================================================ -->
    <main class="container">

        <!-- Hero Section -->
        @if (session('success'))
            <div class="alert alert-success text-center  my-5" style="font-size: 30px;">
                {{ session('success') }}
            </div>
        @endif
        <section class="hero">

            <div class="hero-grid">
                <div class="hero-text">
                    <h2>ایده‌های تازه <br> <span>در قالب کلمات</span></h2>
                    <p>هر روز یک مقاله جدید از بهترین نویسندگان. مطالعه کنید، الهام بگیرید و دانش خود را گسترش دهید.</p>
                    <a href="{{ Route('articles.index') }}" class="btn-primary-hero text-white">مشاهده مقالات</a>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('assets/Img/homepage.svg') }}" alt="نوشتن و ایده">
                </div>
            </div>
        </section>

        <!-- آخرین مقاله (Latest Post) با عکس -->
        <h2 class="section-title">🔥 آخرین مقاله</h2>
        <div class="latest-post-card">
            <div class="post-img">
                <img src="{{ $lasrArticles && $lasrArticles->image
                    ? asset('article/images/' . $lasrArticles->image)
                    : asset('notFound.svg') }}"
                    alt="تصویر آخرین مقاله">
            </div>
            <div class="post-content">
                <span class="post-badge">جدید</span>
                <h3><a
                        href="#">{{ $lasrArticles && $lasrArticles->title ? $lasrArticles->title : 'تایتل موجود نیست !' }}</a>
                </h3>
                <div class="post-meta">
                    <span>✍️ نویسنده:
                        {{ $lasrArticles && $lasrArticles->user->name ? $lasrArticles->user->name : 'نام یوزیر پیدا نشد' }}</span>
                    <span><i>📅
                            {{ $lasrArticles && $lasrArticles->created_at->diffForHumans() ? $lasrArticles->created_at->diffForHumans() : 'تاریخ یوزیر پیدا نشد' }}
                        </i></span>
                    <span>⏱ ۵ دقیقه مطالعه</span>
                </div>
                <p class="post-excerpt">
                    {{ $lasrArticles && $lasrArticles->content ? $lasrArticles->content : 'تاریخ یوزیر پیدا نشد' }}
                </p>
                <a href="{{ Route('singlePage', $lasrArticles && $lasrArticles->id ? $lasrArticles->id : 'چیزی موجود نیست') }}"
                    class="read-more">ادامه مطلب ←</a>
            </div>
        </div>

        <!-- بخش اطلاعات درباره سایت (معرفی سایت) -->
        <section class="about-site">
            <h3>📖 درباره «نوشتارآنلاین»</h3>
            <p>
                <span class="highlight">نوشتارآنلاین</span> یک مجلهٔ دیجیتال برای علاقه‌مندان به مطالعه، نویسندگی و
                یادگیری است.
                هدف ما تولید محتوای عمیق، کاربردی و به‌روز در حوزه‌های روانشناسی، موفقیت، تکنولوژی و سبک زندگی است.
                هر روز یک مقالهٔ جدید با کیفیت بالا منتشر می‌کنیم و به نویسندگان مستقل امکان نوشتن و دیده‌شدن می‌دهیم.
                تیم ما متشکل از روزنامه‌نگاران، محققان و نویسندگان حرفه‌ای است که عاشق کلمات هستند.
                <br><br>
                <strong>چرا ما را انتخاب کنید؟</strong>
                محتوای بی‌طرفانه، منبع‌دار و بدون تبلیغات مزاحم. ما به کیفیت نوشتار و ارزش اطلاعات اعتقاد داریم.
            </p>
        </section>

    </main>

    <!-- ============================================================ -->
    <!-- FOOTER -->
    <!-- ============================================================ -->
    @include('layouts.partials.footer')

    <!-- ============================================================ -->
    <!-- اسکریپت تاگل کاربر -->
    <!-- ============================================================ -->
    <script>
        const userProfile = document.getElementById('userProfile');

        userProfile.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('active');
        });

        // بستن منوی تاگل با کلیک خارج از آن
        document.addEventListener('click', function(e) {
            if (!userProfile.contains(e.target)) {
                userProfile.classList.remove('active');
            }
        });
    </script>

</body>

</html>
