<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>لیست تمام پیشنهادات - پنل ادمین</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            padding: 30px 20px;
            min-height: 100vh;
        }

        /* ===== هدر صفحه ===== */
        .page-header {
            max-width: 1400px;
            margin: 0 auto 30px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            padding: 0 10px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 800;
            color: #1a1a2e;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .page-header h1 i {
            color: #6e8efb;
            font-size: 30px;
        }

        .page-header .count-badge {
            background: #6e8efb;
            color: #fff;
            padding: 6px 18px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
        }

        /* ===== گرید کارت‌ها ===== */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 25px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ===== هر کارت ===== */
        .suggestion-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            padding: 22px 20px 24px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.04);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .suggestion-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 48px rgba(110, 142, 251, 0.15);
            border-color: rgba(110, 142, 251, 0.2);
        }

        .suggestion-card:active {
            transform: scale(0.97);
        }

        /* نشانگر وضعیت (نوار رنگی بالای کارت) */
        .suggestion-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #f59e0b;
            /* پیش‌فرض: در انتظار */
        }

        .suggestion-card.status-approved::before {
            background: #10b981;
        }

        .suggestion-card.status-rejected::before {
            background: #ef4444;
        }

        /* ===== هدر کارت ===== */
        .card-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 14px;
        }

        .avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            flex-shrink: 0;
            overflow: hidden;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            box-shadow: 0 4px 12px rgba(110, 142, 251, 0.25);
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-info {
            flex: 1;
            min-width: 0;
        }

        .user-name {
            font-size: 16px;
            font-weight: 700;
            color: #1a1a2e;
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .user-name .badge {
            font-size: 9px;
            font-weight: 700;
            padding: 2px 10px;
            border-radius: 20px;
            background: #eef2ff;
            color: #4f46e5;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .user-email {
            font-size: 12px;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-email i {
            font-size: 11px;
            color: #9ca3af;
        }

        /* ===== عنوان پیشنهاد ===== */
        .suggestion-title {
            font-size: 17px;
            font-weight: 700;
            color: #111827;
            margin: 6px 0 10px 0;
            line-height: 1.5;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .suggestion-title i {
            color: #f59e0b;
            font-size: 18px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        /* ===== توضیحات ===== */
        .suggestion-desc {
            background: #f9fafb;
            border-radius: 14px;
            padding: 14px 16px;
            margin: 4px 0 14px 0;
            border-right: 3px solid #6e8efb;
            color: #4b5563;
            font-size: 13.5px;
            line-height: 1.8;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .suggestion-desc i {
            color: #6e8efb;
            margin-left: 8px;
            opacity: 0.7;
        }

        /* ===== فوتر کارت ===== */
        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #f3f4f6;
            flex-wrap: wrap;
            gap: 8px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 11.5px;
            color: #6b7280;
        }

        .meta-item i {
            color: #9ca3af;
            font-size: 13px;
        }

        .status-badge {
            padding: 4px 14px;
            border-radius: 30px;
            font-size: 10.5px;
            font-weight: 700;
            background: #fef3c7;
            color: #b45309;
            letter-spacing: 0.3px;
            white-space: nowrap;
        }

        .status-badge.approved {
            background: #d1fae5;
            color: #065f46;
        }

        .status-badge.rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        /* ===== اوورلی جزئیات (صفحه جدید) ===== */
        .detail-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 999;
            justify-content: center;
            align-items: center;
            padding: 20px;
            animation: fadeIn 0.25s ease;
        }

        .detail-overlay.active {
            display: flex;
        }

        .detail-box {
            background: #fff;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 28px;
            padding: 32px 30px;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.3);
            position: relative;
            animation: slideUp 0.3s ease;
        }

        .detail-box::-webkit-scrollbar {
            width: 4px;
        }

        .detail-box::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 10px;
        }

        .detail-box .close-btn {
            position: sticky;
            top: 0;
            float: left;
            background: #f3f4f6;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 18px;
            color: #1f2937;
            cursor: pointer;
            transition: 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            z-index: 10;
        }

        .detail-box .close-btn:hover {
            background: #e5e7eb;
            transform: rotate(90deg);
        }

        .detail-box .detail-user {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 14px;
        }

        .detail-box .detail-user .avatar {
            width: 60px;
            height: 60px;
            font-size: 24px;
        }

        .detail-box .detail-title {
            font-size: 22px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 4px;
        }

        .detail-box .detail-sub {
            color: #6b7280;
            font-size: 14px;
        }

        .detail-box .detail-label {
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 18px 0 6px 0;
        }

        .detail-box .detail-desc {
            background: #f9fafb;
            padding: 18px 20px;
            border-radius: 16px;
            line-height: 2;
            color: #1f2937;
            font-size: 15px;
            border-right: 4px solid #6e8efb;
        }

        .detail-box .detail-meta {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 12px 20px;
            margin: 18px 0 20px 0;
            padding: 16px 0;
            border-top: 1px solid #e5e7eb;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-box .detail-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13.5px;
            color: #374151;
        }

        .detail-box .detail-meta i {
            color: #6e8efb;
            width: 20px;
        }

        .detail-box .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        .detail-box .action-buttons button {
            padding: 10px 24px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            border: none;
            transition: 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .detail-box .action-buttons .btn-approve {
            background: #10b981;
            color: #fff;
        }

        .detail-box .action-buttons .btn-approve:hover {
            background: #059669;
            transform: scale(1.02);
        }

        .detail-box .action-buttons .btn-reject {
            background: #ef4444;
            color: #fff;
        }

        .detail-box .action-buttons .btn-reject:hover {
            background: #dc2626;
            transform: scale(1.02);
        }

        .detail-box .action-buttons .btn-comment {
            background: #f3f4f6;
            color: #4b5563;
        }

        .detail-box .action-buttons .btn-comment:hover {
            background: #e5e7eb;
        }

        /* ===== انیمیشن‌ها ===== */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(40px) scale(0.96);
                opacity: 0;
            }

            to {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }

        /* ===== ریسپانسیو ===== */
        @media (max-width: 768px) {
            body {
                padding: 16px 12px;
            }

            .page-header h1 {
                font-size: 22px;
            }

            .page-header h1 i {
                font-size: 24px;
            }

            .cards-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .suggestion-card {
                padding: 18px 16px 20px;
            }

            .avatar {
                width: 48px;
                height: 48px;
                font-size: 18px;
            }

            .user-name {
                font-size: 15px;
            }

            .suggestion-title {
                font-size: 16px;
            }

            .suggestion-desc {
                font-size: 13px;
                padding: 12px 14px;
                -webkit-line-clamp: 2;
            }

            .detail-box {
                padding: 24px 18px;
                margin: 10px;
                max-height: 95vh;
            }

            .detail-box .detail-title {
                font-size: 19px;
            }

            .detail-box .detail-meta {
                grid-template-columns: 1fr 1fr;
            }

            .detail-box .action-buttons button {
                padding: 8px 18px;
                font-size: 13px;
                flex: 1;
                justify-content: center;
            }
        }

        @media (max-width: 400px) {
            .card-header {
                gap: 10px;
            }

            .avatar {
                width: 40px;
                height: 40px;
                font-size: 14px;
            }

            .user-name {
                font-size: 13px;
            }

            .user-email {
                font-size: 11px;
            }

            .suggestion-title {
                font-size: 14px;
            }

            .suggestion-desc {
                font-size: 12px;
                padding: 10px 12px;
            }

            .card-footer {
                flex-direction: column;
                align-items: stretch;
                gap: 6px;
            }

            .status-badge {
                align-self: flex-start;
            }

            .detail-box .detail-meta {
                grid-template-columns: 1fr;
            }
        }

        /* ===== اسکرول نرم ===== */
        html {
            scroll-behavior: smooth;
        }

        /* ===== حالت خالی ===== */
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border-radius: 24px;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 48px;
            color: #d1d5db;
            margin-bottom: 16px;
        }

        .empty-state h3 {
            font-size: 20px;
            color: #374151;
            margin-bottom: 6px;
        }
    </style>
</head>

<body>
    @include('layouts.partials.header')
    <br>
    @if (session('success'))
        <div class="alert alert-success text-center  my-5" style="font-size: 30px;">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <!-- ===== هدر صفحه ===== -->
    <div class="page-header">
        <h1>
            <i class="fas fa-list-check"></i>
            تمام درخواست‌ها و پیشنهادات
        </h1>
        <span class="count-badge">{{ count($messages) }} پیشنهاد</span>
    </div>

    <!-- ===== گرید کارت‌ها ===== -->
    <div class="cards-grid" id="cardsGrid">
        @if (count($messages) > 0)
            @foreach ($messages as $message)
                <div class="suggestion-card" data-id="{{ $message->id }}">
                    <!-- هدر کارت -->
                    <div class="card-header">
                        <div class="avatar">
                            @if ($message->user && $message->user->image)
                                <a href="{{ Route('profile.show', $message->user->id) }}"><img
                                        src="{{ asset('images/' . $message->user->image) }}"
                                        alt="{{ $message->user->name }}" /></a>
                            @else
                                {{ substr($message->user->name ?? 'کاربر', 0, 1) }}
                            @endif
                        </div>
                        <div class="user-info">
                            <div class="user-name">
                                {{ $message->user->name ?? 'کاربر ناشناس' }}
                                <span class="badge">#{{ $message->id }}</span>
                            </div>
                            <div class="user-email">
                                <i class="fas fa-envelope"></i>
                                {{ $message->user->email ?? 'ایمیل ثبت نشده' }}
                            </div>
                        </div>
                    </div>

                    <!-- عنوان پیشنهاد -->
                    <div class="suggestion-title">
                        <i class="fas fa-lightbulb"></i>
                        {{ $message->title ?? 'بدون عنوان' }}
                    </div>

                    <!-- توضیحات -->
                    <div class="suggestion-desc">
                        <i class="fas fa-quote-right"></i>
                        {{ $message->descriptions ?? 'توضیحاتی وجود ندارد' }}
                    </div>

                    <!-- فوتر کارت -->
                    <div class="card-footer">
                        <div class="meta-item">
                            <i class="far fa-calendar-alt"></i>
                            {{ $message->created_at ? $message->created_at->format('d M Y') : 'تاریخ نامشخص' }}
                        </div>
                        <div class="meta-item">
                            <i class="far fa-clock"></i>
                            {{ $message->created_at ? $message->created_at->diffForHumans() : '--:--' }}
                        </div>
                        <span class="status-badge">
                            {{ $message->status ?? 'در انتظار بررسی' }}
                        </span>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-state">
                <i class="fas fa-inbox"></i>
                <h3>هیچ پیشنهادی موجود نیست</h3>
                <p style="color:#9ca3af;">هنوز هیچ درخواست یا پیشنهادی ثبت نشده است.</p>
            </div>
        @endif
    </div>

    <!-- ===== اوورلی جزئیات ===== -->
    <div class="detail-overlay" id="detailOverlay">
        <div class="detail-box">
            <button class="close-btn" id="closeDetail"><i class="fas fa-times"></i></button>

            <div class="detail-user">
                <div class="avatar" id="detailAvatar">م</div>
                <div>
                    <div class="detail-title" id="detailName">نام کاربر</div>
                    <div class="detail-sub" id="detailEmail">
                        <i class="fas fa-envelope" style="margin-left:6px;color:#6e8efb;"></i>
                        email@example.com
                    </div>
                </div>
            </div>

            <div class="detail-label"><i class="fas fa-tag" style="margin-left:6px;"></i> عنوان پیشنهاد</div>
            <div class="detail-title" style="font-size:20px; margin-bottom:6px;" id="detailTitle">عنوان</div>

            <div class="detail-label"><i class="fas fa-align-left" style="margin-left:6px;"></i> توضیحات کامل</div>
            <div class="detail-desc" id="detailDesc">توضیحات</div>

            <div class="detail-meta">
                <span><i class="far fa-calendar-alt"></i> تاریخ: <strong id="detailDate">-</strong></span>
                <span><i class="far fa-clock"></i> ساعت: <strong id="detailTime">-</strong></span>
                <span><i class="fas fa-flag"></i> وضعیت: <strong id="detailStatus" style="color:#b45309;">در
                        انتظار</strong></span>
                <span><i class="fas fa-hashtag"></i> شناسه: <strong id="detailId">#-</strong></span>
            </div>

            <div class="action-buttons">
                <a href="{{ Route('called.edit', $message->id) }}">
                    <button class="btn-approve", 'approved' )">
                        <i class="fas fa-check"></i> ویرایش
                    </button>
                </a>
                <form action="{{ Route('called.delete', $message->id) }}" method="POST"
                    onsubmit="return confirm('ایا میخواهید این نظر را دلیت کنید ؟ ')">
                    @csrf
                    @method('DELETE')
                    <button class="btn-reject">
                        <i class="fas fa-times"></i> حذف کردن
                    </button>
                </form>
                {{-- <button class="btn-comment"><i class="fas fa-comment"></i> نظر</button> --}}
            </div>
        </div>
    </div>

    <br>
    @include('layouts.partials.footer')

    <script>
        // ============================================================
        // دریافت داده‌های کارت‌ها از المنت‌های HTML
        // ============================================================
        const cards = document.querySelectorAll('.suggestion-card');
        const overlay = document.getElementById('detailOverlay');
        const closeBtn = document.getElementById('closeDetail');

        // المنت‌های جزئیات
        const detailAvatar = document.getElementById('detailAvatar');
        const detailName = document.getElementById('detailName');
        const detailEmail = document.getElementById('detailEmail');
        const detailTitle = document.getElementById('detailTitle');
        const detailDesc = document.getElementById('detailDesc');
        const detailDate = document.getElementById('detailDate');
        const detailTime = document.getElementById('detailTime');
        const detailStatus = document.getElementById('detailStatus');
        const detailId = document.getElementById('detailId');

        // ============================================================
        // تابع نمایش جزئیات
        // ============================================================
        function showDetail(card) {
            // استخراج داده‌ها از کارت
            const avatar = card.querySelector('.avatar');
            const userName = card.querySelector('.user-name');
            const userEmail = card.querySelector('.user-email');
            const title = card.querySelector('.suggestion-title');
            const desc = card.querySelector('.suggestion-desc');
            const footer = card.querySelector('.card-footer');
            const statusBadge = card.querySelector('.status-badge');

            // استخراج تاریخ و ساعت از فوتر
            const metaItems = footer.querySelectorAll('.meta-item');
            let date = '-',
                time = '-';
            if (metaItems.length >= 2) {
                date = metaItems[0].textContent.trim();
                time = metaItems[1].textContent.trim();
            }

            // استخراج ID از کلاس یا دیتا
            const id = card.dataset.id || '?';

            // تنظیم در مودال
            // Avatar
            const avatarContent = avatar.innerHTML;
            detailAvatar.innerHTML = avatarContent;

            // Name
            const nameText = userName.textContent.replace(/#\d+/, '').trim();
            detailName.textContent = nameText;

            // Email
            const emailText = userEmail.textContent.trim();
            detailEmail.innerHTML = `<i class="fas fa-envelope" style="margin-left:6px;color:#6e8efb;"></i> ${emailText}`;

            // Title
            const titleText = title.textContent.trim();
            detailTitle.textContent = titleText;

            // Description
            const descText = desc.textContent.trim();
            detailDesc.textContent = descText;

            // Date & Time
            detailDate.textContent = date;
            detailTime.textContent = time;

            // Status
            const statusText = statusBadge.textContent.trim();
            detailStatus.textContent = statusText;

            // Status color
            const statusColors = {
                'در انتظار بررسی': '#b45309',
                'تأیید شده': '#065f46',
                'رد شده': '#991b1b'
            };
            detailStatus.style.color = statusColors[statusText] || '#b45309';

            // ID
            detailId.textContent = `#${id}`;

            // نمایش مودال
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        // ============================================================
        // تابع بستن جزئیات
        // ============================================================
        function hideDetail() {
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        // ============================================================
        // تابع به‌روزرسانی وضعیت (ارسال به سرور)
        // ============================================================
        function updateStatus(id, status) {
            if (!id || id === 0) {
                alert('شناسه پیشنهاد معتبر نیست!');
                return;
            }

            // ارسال درخواست به سرور
            fetch(`/admin/messages/${id}/status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('وضعیت با موفقیت به‌روزرسانی شد!');
                        location.reload(); // بارگذاری مجدد صفحه
                    } else {
                        alert('خطا در به‌روزرسانی وضعیت!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('خطا در ارتباط با سرور!');
                });
        }

        // ============================================================
        // رویدادها
        // ============================================================

        // کلیک روی هر کارت → نمایش جزئیات
        cards.forEach(card => {
            card.addEventListener('click', function(e) {
                // جلوگیری از اجرای چندباره
                showDetail(this);
            });
        });

        // بستن با دکمه
        closeBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            hideDetail();
        });

        // بستن با کلیک روی پس‌زمینه
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                hideDetail();
            }
        });

        // بستن با کلید Esc
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && overlay.classList.contains('active')) {
                hideDetail();
            }
        });

        // ============================================================
        // تنظیم کلاس وضعیت برای کارت‌ها (رنگ نوار بالایی)
        // ============================================================
        document.querySelectorAll('.suggestion-card').forEach(card => {
            const statusBadge = card.querySelector('.status-badge');
            if (statusBadge) {
                const status = statusBadge.textContent.trim();
                if (status === 'تأیید شده') {
                    card.classList.add('status-approved');
                } else if (status === 'رد شده') {
                    card.classList.add('status-rejected');
                }
            }
        });

        console.log('✅ لیست تمام پیشنهادات با موفقیت بارگذاری شد.');
        console.log(`📌 تعداد: ${document.querySelectorAll('.suggestion-card').length} کارت`);
    </script>

</body>

</html>
