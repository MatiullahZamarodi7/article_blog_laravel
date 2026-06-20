<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>هدر با منوی تاگل کاربر</title>
    <!-- Font Awesome برای آیکون‌ها -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href=" {{ asset('assets/Css/Main.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/Css/Menu-demo1.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/Css/Style.css') }}" rel="stylesheet" />
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f1f5f9;
            padding: 20px;
            direction: rtl;
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

        /* ===== RESPONSIVE ===== */
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
    </style>
</head>

<body>

    <!-- ============================================================ -->
    <!-- HEADER با منوی تاگل کاربر و منوی افقی کنار لوگو              -->
    <!-- ============================================================ -->
    <header class="main_header wide_header">
        <div class="header_container">
            <div class="menu_wrapper menu_sticky" style="display: flex; padding: 20px 200px ;">

                <!-- ===== بخش چپ: لوگو + منوی اصلی ===== -->
                <div class="header-left">
                    <!-- لوگو -->
                    <a href="{{ Route('home') }}" class="logo-link">
                        <img src="{{ asset('logo.png') }}" style="height: 80px !important" alt="لوگو سایت" />
                    </a>

                    <!-- منوی اصلی (افقی) -->
                    <ul class="main-nav">
                        <li><a href="{{ Route('home') }}" class="current">صفحه اصلی</a></li>
                        <li><a href="{{ Route('articles.index') }}"> مقالات من</a></li>
                        <li><a href="{{ Route('About.index') }}">درباره ما</a></li>
                        <li><a href="{{ Route('called.calledForUs') }}">تماس با ما</a></li>
                    </ul>
                </div>

                <!-- ===== بخش راست: کاربر ===== -->
                <div class="header-right">

                    <!-- ===== حالت لاگین شده (با تاگل) ===== -->
                    @auth
                        <div class="user-profile" id="userProfile">
                            <img src="{{ asset('images/' . Auth::user()->image) }}" alt="عکس کاربر" class="user-avatar" />
                            <div class="user-info">
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <span class="user-role">نویسنده</span>
                            </div>
                            <i class="fas fa-chevron-down user-dropdown-icon"></i>

                            <!-- منوی تاگل کاربر -->
                            <div class="user-dropdown-menu">
                                <a href="{{ route('profile.show', auth()->user()->id) }}">
                                    <i class="fas fa-user"></i> پروفایل
                                </a>
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('admin.index') }}" class="menu-item active">
                                        <i class="fas fa-shield-alt"></i>
                                        <span>پنل ادمین</span>
                                    </a>
                                    <a href="{{ route('called.messgesCard') }}" class="menu-item active">
                                        <i class="fas fa-shield-alt"></i>
                                        <span>پیشنهادها 💡</span>
                                    </a>
                                @endif
                                <a href="#"><i class="fas fa-cog"></i> تنظیمات</a>
                                <a href="{{ Route('create.index') }}"><i class="fas fa-book"></i>اضافه کردن مقاله </a>
                                <a href="{{ Route('logoutAcount') }}" class="logout-item"><i
                                        class="fas fa-sign-out-alt"></i> خروج</a>
                            </div>
                        </div>
                    @endauth

                    <!-- ===== حالت مهمان (کامنت شده) ===== -->

                    @guest
                        <div class="auth-buttons">
                            <a href="{{ Route('login') }}" class="btn-outline">
                                <i class="fas fa-sign-in-alt"></i> ورود
                            </a>
                            <a href="{{ Route('register') }}" class="btn-primary">
                                <i class="fas fa-user-plus"></i> ثبت‌نام
                            </a>
                        </div>
                    @endguest


                </div>

            </div>
        </div>
    </header>

    <!-- ===== توضیحات ===== -->

    <!-- ===== اسکریپت تاگل ===== -->
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
