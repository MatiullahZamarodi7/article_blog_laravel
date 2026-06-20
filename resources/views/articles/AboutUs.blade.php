<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>درباره ما - سایت مقاله نویسی</title>
    <!-- فونت وزیر (وزن‌های ۴۰۰ و ۷۰۰) -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet" />
    <!-- Font Awesome برای آیکون‌ها -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Vazirmatn', sans-serif;
            background: #f9fafc;
            color: #1e293b;
            line-height: 1.8;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        /* هدر با تصویر */
        .about-header {
            text-align: center;
            margin-bottom: 3.5rem;
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            padding: 3rem 2rem;
            border-radius: 30px;
            color: white;
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.3);
        }

        .about-header img {
            width: 100%;
            max-width: 800px;
            height: auto;
            border-radius: 20px;
            margin: 1.5rem 0 1rem 0;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
            border: 3px solid rgba(255, 255, 255, 0.2);
        }

        .about-header h1 {
            font-size: 2.8rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .about-header p {
            font-size: 1.2rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 1rem auto 0;
        }

        /* بخش توضیحات */
        .about-text {
            background: white;
            padding: 2.5rem;
            border-radius: 28px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 3rem;
            border: 1px solid #e9edf4;
        }

        .about-text h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #0f172a;
            border-right: 6px solid #3b82f6;
            padding-right: 1rem;
        }

        .about-text p {
            margin-bottom: 1.2rem;
            font-size: 1.05rem;
            color: #334155;
        }

        .about-text .highlight {
            color: #2563eb;
            font-weight: 700;
        }

        /* تیم نویسندگان */
        .team-section {
            margin-top: 3rem;
        }

        .team-section h2 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }

        .team-section h2:after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background: #3b82f6;
            margin: 0.5rem auto 0;
            border-radius: 10px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .team-card {
            background: lightgray;
            border-radius: 28px;
            padding: 2rem 1.5rem 1.8rem;
            text-align: center;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.04);
            transition: transform 0.25s ease, box-shadow 0.3s ease;
            border: 1px solid #eef2f8;
        }

        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.12);
        }

        .team-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
            border: 4px solid #e0e7f0;
            background: #f1f5f9;
        }

        .team-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
        }

        .team-card .role {
            color: #3b82f6;
            font-weight: 600;
            font-size: 0.95rem;
            margin: 0.2rem 0 0.8rem;
        }

        .team-card p {
            font-size: 0.95rem;
            text-align: justify;
            color: #475569;
            margin-bottom: 1rem;
        }

        .social-icons a {
            display: inline-block;
            margin: 0 6px;
            color: #64748b;
            font-size: 1.2rem;
            transition: color 0.2s;
        }

        .social-icons a:hover {
            color: #1e293b;
        }

        /* فوتر */
        .footer-note {
            margin-top: 4rem;
            text-align: center;
            border-top: 1px solid #dce3ec;
            padding-top: 2rem;
            color: #64748b;
        }

        /* ریسپانسیو */
        @media (max-width: 640px) {
            .about-header h1 {
                font-size: 2rem;
            }

            .about-header {
                padding: 2rem 1rem;
            }

            .about-text {
                padding: 1.8rem;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

    @include('layouts.partials.header');

    <div class="container">

        <!-- ========== HEADER با عکس ========== -->
        <div class="about-header">
            <h1>📖 درباره ما</h1>
            <p>ما تیمی از نویسندگان و پژوهشگران هستیم که عاشق کلمه‌ها و ایده‌های ناب هستیم.</p>
            <!-- عکس اصلی صفحه (می‌توانید لینک را با عکس خودتان جایگزین کنید) -->
            <img src="{{ asset('images/about.svg') }}" style="height: 450px !important"
                alt="تیم نویسندگان سایت مقاله نویسی">
        </div>

        <!-- ========== توضیحات ========== -->
        <div class="about-text">
            <h2>چرا مقاله‌نویسی را شروع کردیم؟</h2>
            <p>
                <span class="highlight">سایت مقاله‌نویسی ما</span> در سال ۱۴۰۰ با هدف تولید محتوای
                <strong>عمیق، مستند و کاربردی</strong> شروع به کار کرد. ما معتقدیم هر مقاله می‌تواند یک
                پنجره جدید به سوی آگاهی باشد.
            </p>
            <p>
                تیم ما متشکل از نویسندگان، مترجمان و ویراستارانی است که در حوزه‌های مختلف
                از <strong>تکنولوژی</strong> و <strong>روانشناسی</strong> گرفته تا
                <strong>تاریخ</strong> و <strong>ادبیات</strong> تخصص دارند.
                ما به‌دنبال ارائه محتوایی باکیفیت، منحصربه‌فرد و الهام‌بخش هستیم.
            </p>
            <p>
                <i class="fas fa-quote-right" style="color:#3b82f6; margin-left:6px;"></i>
                هدف ما این است که مطالعه را به یک عادت لذت‌بخش تبدیل کنیم و دانش را در دسترس همه قرار دهیم.
            </p>
        </div>

        <!-- ========== تیم نویسندگان ========== -->
        <div class="team-section">
            <h2>👥 اعضای تیم</h2>
            <div class="team-grid">

                @foreach ($abouts as $about)
                    <div class="team-card">
                        <!-- عکس نویسنده (لینک placeholder – حتماً عکس واقعی جایگزین کنید) -->
                        <a href="{{ Route('profile.show', $about->id) }}">
                            <img src="{{ asset('images/' . $about->image) }}" alt="مدیر تیم">
                        </a>
                        <a href="{{ Route('profile.show', $about->id) }}">
                            <h3> {{ $about->name }}</h3>
                        </a>

                        <div class="role">{{ $about->role }}</div>
                        <p>{{ Str::limit($about->about, 70) }}</p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                @endforeach
                <!-- کارت ۱ -->



            </div>
        </div>

        <!-- ========== فوتر ========== -->


    </div>
    @include('layouts.partials.footer')

</body>

</html>
