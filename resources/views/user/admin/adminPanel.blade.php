<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت پیشرفته</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* =============== RESET & BASE =============== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f0f2f5;
            color: #1a1a2e;
        }

        /* =============== SIDEBAR =============== */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #1a1a2e 0%, #16213e 100%);
            color: #fff;
            padding: 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            right: 0;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar-header h2 {
            font-size: 22px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .sidebar-header h2 i {
            color: #f59e0b;
        }

        .admin-badge {
            display: inline-block;
            background: #4F46E5;
            color: #fff;
            font-size: 11px;
            padding: 3px 12px;
            border-radius: 20px;
            margin-top: 8px;
        }

        .sidebar-nav {
            flex: 1;
            padding: 20px 15px;
            overflow-y: auto;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s;
            margin-bottom: 5px;
            position: relative;
            cursor: pointer;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .nav-item.active {
            background: #4F46E5;
            color: #fff;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
        }

        .nav-item i {
            width: 20px;
            font-size: 16px;
        }

        .nav-item span:not(.badge) {
            flex: 1;
        }

        .badge {
            background: #ef4444;
            color: #fff;
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 20px;
        }

        .badge.danger {
            background: #ef4444;
        }

        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
        }

        .admin-info img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .admin-info strong {
            display: block;
            font-size: 14px;
        }

        .admin-info small {
            color: rgba(255, 255, 255, 0.6);
            font-size: 12px;
        }

        .logout-btn {
            width: 100%;
            padding: 10px;
            background: rgba(239, 68, 68, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: #fff;
        }

        /* =============== MAIN CONTENT =============== */
        .main-content {
            flex: 1;
            margin-right: 260px;
            padding: 0;
        }

        .top-header {
            background: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #1a1a2e;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #4b5563;
        }

        .notification-btn .badge {
            position: absolute;
            top: -5px;
            right: -8px;
            font-size: 10px;
            padding: 2px 6px;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: #f3f4f6;
            border-radius: 8px;
            padding: 5px 15px;
            gap: 10px;
        }

        .search-box i {
            color: #9ca3af;
        }

        .search-box input {
            border: none;
            background: none;
            padding: 8px 0;
            outline: none;
            width: 200px;
        }

        /* =============== CONTENT WRAPPER =============== */
        .content-wrapper {
            padding: 25px 30px;
        }

        .page-section {
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .page-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =============== STATS CARDS =============== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #fff;
        }

        .stat-icon.blue {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        .stat-icon.green {
            background: linear-gradient(135deg, #22c55e, #16a34a);
        }

        .stat-icon.orange {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .stat-icon.purple {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        }

        .stat-info h3 {
            font-size: 28px;
            font-weight: 700;
            color: #1a1a2e;
        }

        .stat-info p {
            color: #6b7280;
            font-size: 14px;
            margin-top: 2px;
        }

        /* =============== SECTION HEADER =============== */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .section-header h2 {
            font-size: 22px;
            font-weight: 600;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: #4F46E5;
            color: #fff;
        }

        .btn-primary:hover {
            background: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
        }

        .btn-danger {
            background: #ef4444;
            color: #fff;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-warning {
            background: #f59e0b;
            color: #fff;
        }

        .btn-success {
            background: #22c55e;
            color: #fff;
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 12px;
        }

        .btn-block {
            width: 100%;
            justify-content: center;
        }

        /* =============== FILTERS =============== */
        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filters select,
        .filters input {
            padding: 10px 15px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: #fff;
            outline: none;
            font-size: 14px;
        }

        .filters input {
            flex: 1;
            min-width: 200px;
        }

        /* =============== TABLE =============== */
        .table-responsive {
            overflow-x: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .data-table thead {
            background: #f8fafc;
        }

        .data-table th {
            padding: 15px 18px;
            text-align: right;
            font-weight: 600;
            color: #4b5563;
            border-bottom: 2px solid #e5e7eb;
            white-space: nowrap;
        }

        .data-table td {
            padding: 15px 18px;
            border-bottom: 1px solid #f3f4f6;
        }

        .data-table tbody tr:hover {
            background: #f8fafc;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .status-published {
            background: #dcfce7;
            color: #166534;
        }

        .status-draft {
            background: #fef3c7;
            color: #92400e;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status-archived {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .status-approved {
            background: #dcfce7;
            color: #166534;
        }

        .action-btns {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
        }

        .action-btns button {
            padding: 5px 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            transition: all 0.3s;
        }

        .btn-edit {
            background: #e0e7ff;
            color: #4F46E5;
        }

        .btn-edit:hover {
            background: #4F46E5;
            color: #fff;
        }

        .btn-delete {
            background: #fee2e2;
            color: #ef4444;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: #fff;
        }

        .btn-approve {
            background: #dcfce7;
            color: #16a34a;
        }

        .btn-approve:hover {
            background: #16a34a;
            color: #fff;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #9ca3af;
        }

        /* =============== RECENT ACTIVITY =============== */
        .recent-activity {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .recent-activity h3 {
            margin-bottom: 15px;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 15px;
            background: #f8fafc;
            border-radius: 8px;
            border-right: 3px solid #4F46E5;
        }

        .activity-item .activity-text {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .activity-item .activity-time {
            color: #9ca3af;
            font-size: 12px;
        }

        /* =============== MODAL =============== */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal.show {
            display: flex;
        }

        .modal-content {
            background: #fff;
            border-radius: 16px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideDown 0.3s ease;
        }

        .modal-lg {
            max-width: 800px;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 25px;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-header h3 {
            font-size: 20px;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #9ca3af;
            transition: color 0.3s;
        }

        .close-btn:hover {
            color: #1a1a2e;
        }

        .modal-content form {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #374151;
            font-size: 14px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
            background: #fff;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #4F46E5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* =============== RESPONSIVE =============== */
        @media (max-width: 992px) {
            .sidebar {
                right: -280px;
            }

            .sidebar.open {
                right: 0;
            }

            .main-content {
                margin-right: 0;
            }

            .menu-toggle {
                display: block;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .top-header {
                flex-direction: column;
                gap: 10px;
                padding: 15px;
            }

            .header-left {
                width: 100%;
                justify-content: space-between;
            }

            .header-right {
                width: 100%;
                flex-wrap: wrap;
            }

            .search-box {
                width: 100%;
            }

            .search-box input {
                width: 100%;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .content-wrapper {
                padding: 15px;
            }

            .section-header {
                flex-direction: column;
                align-items: stretch;
            }

            .data-table {
                font-size: 12px;
            }

            .data-table th,
            .data-table td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    @if (Auth::user()->role == 'admin')


        <div class="dashboard-container">
            <!-- سایدبار -->
            <aside class="sidebar" id="sidebar">
                <div class="sidebar-header">
                    <h2><i class="fas fa-crown"></i> پنل مدیریت</h2>
                    <span class="admin-badge">ادمین ارشد</span>
                </div>

                <nav class="sidebar-nav">
                    <a href="#" class="nav-item active" data-page="dashboard">
                        <i class="fas fa-chart-line"></i>
                        <span>داشبورد</span>
                    </a>
                    <a href="#" class="nav-item" data-page="users">
                        <i class="fas fa-users-cog"></i>
                        <span>مدیریت کاربران</span>
                        <span class="badge" style="color: white; font-size: 10px; "
                            id="articleCount">{{ $users->count() }}</span>
                    </a>
                    <a href="#" class="nav-item" data-page="articles">
                        <i class="fas fa-newspaper"></i>
                        <span>مدیریت مقالات</span>
                        <span class="badge" style="color: white; font-size: 10px; "
                            id="articleCount">{{ $articles->count() }}</span>
                    </a>
                    <a href="#" class="nav-item" data-page="categories">
                        <i class="fas fa-tags"></i>
                        <span>دسته‌بندی‌ها</span>
                        <span class="badge" style="color: white; font-size: 10px; "
                            id="articleCount">{{ $category->count() }}</span>
                    </a>
                    <a href="#" class="nav-item" data-page="comments">
                        <i class="fas fa-comments"></i>
                        <span>نظرات یا تماس ها</span>
                        <span style="color: white; font-size: 10px; " class="badge danger"
                            id="commentCount">{{ $messages->count() }}</span>
                    </a>
                    <a href="#" class="nav-item" data-page="settings">
                        <i class="fas fa-cog"></i>
                        <span>تنظیمات</span>
                    </a>
                </nav>

                <div class="sidebar-footer">
                    <div class="admin-info">
                        <img src="{{ asset('images/' . $is_admin->image) }}" alt="Admin">
                        <div>
                            <strong>{{ $is_admin->name }}</strong>
                            <small>{{ $is_admin->email }}</small>
                        </div>
                    </div>
                    <a href="{{ ROute('logoutAcount') }}">
                        <button class="logout-btn" onclick="logout()">
                            <i class="fas fa-sign-out-alt"></i> خروج
                        </button>
                    </a>
                </div>
            </aside>

            <!-- محتوای اصلی -->
            <main class="main-content">
                <!-- هدر -->

                @include('layouts.partials.header')

                @if (session('success'))
                    <div class="alert alert-success text-center  my-5" style="font-size: 30px;">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- بخش‌های مختلف -->
                <div class="content-wrapper">
                    <!-- داشبورد -->
                    <section id="page-dashboard" class="page-section active">
                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-icon blue">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stat-info">
                                    <h3>{{ $users->count() }}</h3>
                                    <p>کاربران کل</p>
                                </div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon green">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="stat-info">
                                    <h3>{{ $articles->count() }}</h3>
                                    <p>مقالات</p>
                                </div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon orange">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="stat-info">
                                    <h3>{{ $category->count() }}</h3>
                                    <p>تمام کتیگوری ها</p>
                                </div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-icon purple">
                                    <i class="fas fa-comment-dots"></i>
                                </div>
                                <div class="stat-info">
                                    <h3 id="totalComments">۰</h3>
                                    <p>نظرات</p>
                                </div>
                            </div>
                        </div>

                        <!-- فعالیت‌های اخیر -->
                        <div class="recent-activity">
                            <h3><i class="fas fa-clock"></i> فعالیت‌های اخیر</h3>
                            <div style="display: flex; justify-content: space-between; flex-direction: column;">
                                @foreach ($latestArticles as $latestArticle)
                                    <div style="display: flex; justify-content: space-between; margin: 10px 0;">
                                        <div class="title">
                                            <a href="{{ Route('singlePage', ['id' => $latestArticle->id]) }}"
                                                style="all: unset; color: #2563eb; cursor: pointer;"> 📝 عنوان
                                                این مقاله : {{ $latestArticle->title }}
                                        </div></a>
                                        <div>
                                            <i>📅
                                                {{ $latestArticle->created_at->diffForHumans() }}
                                            </i>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

                    <!-- مدیریت کاربران -->
                    <section id="page-users" class="page-section">
                        <div class="section-header">
                            <h2>مدیریت کاربران</h2>
                            <button class="btn btn-primary" onclick="showAddUserModal()">
                                <i class="fas fa-user-plus"></i> کاربر جدید
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="data-table" id="usersTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عکس</th>
                                        <th>نام</th>
                                        <th>درباره</th>
                                        <th>ایمیل</th>
                                        <th>نقش</th>
                                        <th>وضعیت</th>
                                        <th>تاریخ ثبت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th>{{ $user->id }}</th>
                                            <th><a href="{{ Route('profile.show', $user->id) }}"><img
                                                        style="height: 40px ; width: 40px; border-radius: 9999px"
                                                        src="{{ asset('images/' . $user->image) }}"
                                                        alt=""></a>
                                            </th>
                                            <th><a
                                                    href="{{ Route('profile.show', $user->id) }}">{{ $user->name }}</a>
                                            </th>
                                            <th><a
                                                    href="{{ Route('profile.show', $user->id) }}">{{ Str::limit($user->about, 60) }}</a>
                                            </th>
                                            <th><a
                                                    href="{{ Route('profile.show', $user->id) }}">{{ $user->email }}</a>
                                            </th>
                                            <th>{{ $user->role }}</th>
                                            <th>وضعیت</th>
                                            <th> {{ $user->created_at->diffForHumans() }}</th>
                                            <th style="display: flex; margin-top: 20px;">

                                                <form action="{{ Route('admin.destroy', $user->id) }}" method="POST"
                                                    onsubmit="return confirm('آیا مطمئن هستید که میخواهید این مقاله حذف شود؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger">حذف</button>
                                                </form>
                                                <a href="{{ Route('admin.edit', $user->id) }}">
                                                    <button class="btn btn-outline-success mx-2">ویرایش</button>
                                                </a>

                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <!-- مدیریت مقالات -->
                    <section id="page-articles" class="page-section">
                        <div class="section-header">
                            <h2>مدیریت مقالات</h2>
                            <a href="{{ Route('create.index') }}">
                                <button class="btn btn-primary" onclick="showAddArticleModal()">
                                    <i class="fas fa-plus"></i> مقاله جدید
                                </button>
                            </a>
                        </div>

                        <!-- فیلتر مقالات -->
                        <div class="filters">
                            <select id="articleStatusFilter" onchange="filterArticles()">
                                <option value="all">همه مقالات</option>
                                <option value="published">منتشر شده</option>
                                <option value="draft">پیش‌نویس</option>
                                <option value="pending">در انتظار</option>
                            </select>
                            <input type="text" placeholder="جستجوی مقاله..." id="articleSearch"
                                onkeyup="filterArticles()">
                        </div>

                        <div class="table-responsive">
                            <table class="data-table" id="articlesTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عکس</th>
                                        <th>عنوان</th>
                                        <th>نویسنده</th>
                                        <th>دسته‌بندی</th>
                                        <th>وضعیت</th>
                                        <th>بازدید</th>
                                        <th>تاریخ</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody id="articlesTableBody">
                                    @foreach ($articles as $article)
                                        <tr>
                                            <th>{{ $article->id }}</th>
                                            <th><a href="{{ Route('singlePage', ['id' => $article->id]) }}"><img
                                                        style="height: 50px ; width: 70px; border-radius: 5px"
                                                        src="{{ asset('article/images/' . $article->image) }}"
                                                        alt=""></a>
                                            </th>
                                            <th><a
                                                    href="{{ Route('singlePage', ['id' => $article->id]) }}">{{ $article->title }}</a>
                                            </th>
                                            <th><a
                                                    href="{{ Route('profile.show', ['profile' => $article->user->id]) }}">{{ $article->user->name }}</a>
                                            </th>
                                            <th>Category</th>
                                            <th>وضعیت</th>
                                            <th>بازدید</th>
                                            <th> {{ $article->created_at->diffForHumans() }}</th>
                                            <th style="display: flex; margin-top: 20px;">
                                                <form action="{{ Route('articles.destroy', $article->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('ایا میخواهید این مقاله را حذف کنید؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger">حذف</button>
                                                </form>
                                                <a href="{{ Route('articles.edit', $article->id) }}">
                                                    <button class="btn btn-outline-success mx-2">ویرایش</button>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <!-- دسته‌بندی‌ها -->
                    <section id="page-categories" class="page-section">
                        <div class="section-header">
                            <h2>دسته‌بندی‌ها</h2>
                            <button class="btn btn-primary" onclick="showAddCategoryModal()">
                                <i class="fas fa-plus"></i> دسته جدید
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام</th>
                                        <th>اسلاگ</th>
                                        <th>تعداد مقاله</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $categorys)
                                        <tr>
                                            <th>{{ $categorys->id }}</th>
                                            <th><a
                                                    href="{{ Route('category.show', $categorys->id) }}">{{ $categorys->title }}</a>
                                            </th>
                                            <th>{{ $categorys->slug }}</th>
                                            <th>{{ $categorys->articles->count() }}</th>
                                            <th>
                                                <button class="btn btn-outline-danger">حذف</button>
                                                <button class="btn btn-outline-success">ویرایش</button>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <!-- نظرات -->
                    <section id="page-comments" class="page-section">
                        <div class="section-header">
                            <h2>مدیریت نظرات</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عکس</th>
                                        <th>کاربر</th>
                                        <th>امیل</th>
                                        <th> موضوع</th>
                                        <th>توضیحات</th>
                                        <th>تاریخ</th>
                                        <th>عملیات</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <th>{{ $message->id }}</th>
                                            <th><a href="{{ Route('profile.show', $message->user->id) }}"><img
                                                        style="height: 40px ; width: 40px; border-radius: 9999px"
                                                        src="{{ asset('images/' . $message->user->image) }}"
                                                        alt=""></a>
                                            </th>
                                            <th> <a
                                                    href="{{ Route('profile.show', ['profile' => $message->user->id]) }}">{{ $message->name }}</a>
                                            </th>
                                            <th> <a
                                                    href="{{ Route('profile.show', ['profile' => $message->user->id]) }}">{{ $message->email }}</a>
                                            </th>
                                            <th> <a
                                                    href="{{ Route('called.messgesCard') }}">{{ Str::limit($message->title, 60) }}</a>
                                            </th>
                                            <th>{{ Str::limit($message->descriptions, 60) }}</th>
                                            <th>{{ $message->created_at->diffForHumans() }}</th>
                                            <th style="display: flex; margin-top: 20px;">
                                                <form action="{{ Route('called.delete', $message->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('ایا میخواهید این مقاله را حذف کنید؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger">حذف</button>
                                                </form>
                                                <a href="{{ Route('called.edit', $message->id) }}">
                                                    <button class="btn btn-outline-success mx-2">ویرایش</button>
                                                </a>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <!-- تنظیمات -->
                    <section id="page-settings" class="page-section">
                        <div class="section-header">
                            <h2>تنظیمات پنل</h2>
                        </div>
                        <div
                            style="background:#fff;padding:30px;border-radius:12px;box-shadow:0 2px 10px rgba(0,0,0,0.05);">
                            <div class="form-group">
                                <label>عنوان پنل</label>
                                <input type="text" id="panelTitle" value="پنل مدیریت پیشرفته"
                                    style="width:100%;padding:10px 14px;border:1px solid #e5e7eb;border-radius:8px;">
                            </div>
                            <div class="form-group">
                                <label>تعداد آیتم در هر صفحه</label>
                                <select id="itemsPerPage"
                                    style="width:100%;padding:10px 14px;border:1px solid #e5e7eb;border-radius:8px;">
                                    <option value="5">۵</option>
                                    <option value="10" selected>۱۰</option>
                                    <option value="25">۲۵</option>
                                    <option value="50">۵۰</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" onclick="saveSettings()">ذخیره تنظیمات</button>
                        </div>
                    </section>
                </div>
            </main>
        </div>

        <!-- مودال کاربر -->
        <div class="modal" id="userModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="userModalTitle">افزودن کاربر جدید</h3>
                    <button class="close-btn" onclick="closeModal('userModal')">&times;</button>
                </div>
                <form id="userForm" onsubmit="saveUser(event)">
                    <input type="hidden" id="editUserId">
                    <div class="form-group">
                        <label>نام کامل</label>
                        <input type="text" id="userName" required placeholder="نام و نام خانوادگی">
                    </div>
                    <div class="form-group">
                        <label>ایمیل</label>
                        <input type="email" id="userEmail" required placeholder="example@email.com">
                    </div>
                    <div class="form-group">
                        <label>نقش</label>
                        <select id="userRole">
                            <option value="admin">ادمین</option>
                            <option value="editor">ویرایشگر</option>
                            <option value="user">کاربر عادی</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>رمز عبور</label>
                        <input type="password" id="userPassword" placeholder="حداقل ۶ کاراکتر">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">ذخیره</button>
                </form>
            </div>
        </div>

        <!-- مودال مقاله -->
        <div class="modal" id="articleModal">
            <div class="modal-content modal-lg">

                <form id="articleForm" onsubmit="saveArticle(event)">
                    <input type="hidden" id="editArticleId">
                    <div class="form-group">
                        <label>عنوان مقاله</label>
                        <input type="text" id="articleTitle" required placeholder="عنوان مقاله را وارد کنید">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>دسته‌بندی</label>
                            <select id="articleCategory" required></select>
                        </div>
                        <div class="form-group">
                            <label>وضعیت</label>
                            <select id="articleStatus">
                                <option value="draft">پیش‌نویس</option>
                                <option value="pending">در انتظار</option>
                                <option value="published">منتشر شده</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>خلاصه</label>
                        <textarea id="articleExcerpt" rows="3" placeholder="خلاصه مقاله"></textarea>
                    </div>
                    <div class="form-group">
                        <label>متن مقاله</label>
                        <textarea id="articleContent" rows="10" placeholder="متن کامل مقاله را وارد کنید..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">ذخیره مقاله</button>
                </form>
            </div>
        </div>

        <!-- مودال دسته‌بندی -->
        <div class="modal" id="categoryModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>دسته‌بندی جدید</h3>
                    <button class="close-btn" onclick="closeModal('categoryModal')">&times;</button>
                </div>
                <form id="categoryForm" onsubmit="saveCategory(event)">
                    <div class="form-group">
                        <label>نام دسته‌بندی</label>
                        <input type="text" id="categoryName" required placeholder="نام دسته">
                    </div>
                    <div class="form-group">
                        <label>توضیحات</label>
                        <textarea id="categoryDesc" rows="3" placeholder="توضیحات دسته"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">ذخیره</button>
                </form>
            </div>
        </div>

        <script>
            // ============================================================
            // DATA MANAGEMENT
            // ============================================================
            const defaultData = {
                users: [{
                        id: 1,
                        name: 'مدیر ارشد',
                        email: 'admin@panel.com',
                        role: 'admin',
                        status: 'active',
                        createdAt: '2026-01-01'
                    },
                    {
                        id: 2,
                        name: 'علی رضایی',
                        email: 'ali@example.com',
                        role: 'editor',
                        status: 'active',
                        createdAt: '2026-01-10'
                    },
                    {
                        id: 3,
                        name: 'سارا محمدی',
                        email: 'sara@example.com',
                        role: 'user',
                        status: 'inactive',
                        createdAt: '2026-01-15'
                    },
                ],
                articles: [{
                        id: 1,
                        title: 'آموزش جامع لاراول ۱۱',
                        excerpt: 'در این مقاله به صورت کامل با لاراول ۱۱ آشنا می‌شوید...',
                        content: 'متن کامل مقاله آموزش لاراول ۱۱...',
                        category: 'برنامه‌نویسی',
                        author: 'مدیر ارشد',
                        status: 'published',
                        views: 1200,
                        createdAt: '2026-01-05'
                    },
                    {
                        id: 2,
                        title: 'طراحی رابط کاربری با Tailwind',
                        excerpt: 'آموزش طراحی حرفه‌ای با Tailwind CSS...',
                        content: 'متن کامل مقاله Tailwind...',
                        category: 'طراحی',
                        author: 'علی رضایی',
                        status: 'draft',
                        views: 450,
                        createdAt: '2026-01-12'
                    },
                    {
                        id: 3,
                        title: 'بهترین روش‌های سئو در ۲۰۲۶',
                        excerpt: 'روش‌های جدید سئو برای رشد سایت...',
                        content: 'متن کامل مقاله سئو...',
                        category: 'سئو',
                        author: 'سارا محمدی',
                        status: 'pending',
                        views: 780,
                        createdAt: '2026-01-18'
                    },
                ],
                categories: [{
                        id: 1,
                        name: 'برنامه‌نویسی',
                        slug: 'programming',
                        description: 'مقالات برنامه‌نویسی'
                    },
                    {
                        id: 2,
                        name: 'طراحی',
                        slug: 'design',
                        description: 'مقالات طراحی'
                    },
                    {
                        id: 3,
                        name: 'سئو',
                        slug: 'seo',
                        description: 'مقالات سئو و بازاریابی'
                    },
                ],
                comments: [{
                        id: 1,
                        user: 'احمد کریمی',
                        article: 'آموزش جامع لاراول ۱۱',
                        content: 'عالی بود!',
                        status: 'approved',
                        createdAt: '2026-01-06'
                    },
                    {
                        id: 2,
                        user: 'مریم حسینی',
                        article: 'آموزش جامع لاراول ۱۱',
                        content: 'ممنون از شما',
                        status: 'pending',
                        createdAt: '2026-01-07'
                    },
                ]
            };

            function saveData(key, data) {
                localStorage.setItem(key, JSON.stringify(data));
            }

            function getData(key) {
                const data = localStorage.getItem(key);
                if (data) {
                    return JSON.parse(data);
                }
                if (defaultData[key]) {
                    saveData(key, defaultData[key]);
                    return defaultData[key];
                }
                return [];
            }

            function generateId() {
                return Date.now() + Math.floor(Math.random() * 1000);
            }

            function getDate() {
                return new Date().toISOString().split('T')[0];
            }

            // ============================================================
            // NAVIGATION
            // ============================================================
            document.querySelectorAll('.nav-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const page = this.dataset.page;
                    navigateTo(page);
                });
            });

            function navigateTo(page) {
                document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
                document.querySelector(`.nav-item[data-page="${page}"]`)?.classList.add('active');

                document.querySelectorAll('.page-section').forEach(s => s.classList.remove('active'));
                document.getElementById(`page-${page}`)?.classList.add('active');

                const titles = {
                    dashboard: 'داشبورد',
                    users: 'مدیریت کاربران',
                    articles: 'مدیریت مقالات',
                    categories: 'دسته‌بندی‌ها',
                    comments: 'نظرات',
                    settings: 'تنظیمات'
                };
                document.getElementById('pageTitle').textContent = titles[page] || page;

                // Close sidebar on mobile
                document.getElementById('sidebar').classList.remove('open');

                // Refresh data
                if (page === 'dashboard') updateDashboard();
                if (page === 'users') renderUsers();
                if (page === 'articles') renderArticles();
                if (page === 'categories') renderCategories();
                if (page === 'comments') renderComments();

                updateCounts();
            }

            function toggleSidebar() {
                document.getElementById('sidebar').classList.toggle('open');
            }

            function logout() {
                if (confirm('آیا مطمئن هستید؟')) {
                    localStorage.clear();
                    location.reload();
                }
            }

            // ============================================================
            // MODALS
            // ============================================================
            function openModal(id) {
                document.getElementById(id).classList.add('show');
            }

            function closeModal(id) {
                document.getElementById(id).classList.remove('show');
            }

            // Close modal on background click
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        this.classList.remove('show');
                    }
                });
            });

            // ============================================================
            // DASHBOARD
            // ============================================================
            function updateDashboard() {
                const users = getData('users');
                const articles = getData('articles');
                const comments = getData('comments');

                document.getElementById('totalUsers').textContent = users.length;
                document.getElementById('totalArticles').textContent = articles.length;
                document.getElementById('totalComments').textContent = comments.length;

                let totalViews = 0;
                articles.forEach(a => totalViews += a.views || 0);
                document.getElementById('totalViews').textContent = totalViews.toLocaleString();

                // Recent activities
                const activities = [];
                const today = new Date();
                users.forEach(u => {
                    if (u.createdAt) {
                        const days = Math.floor((today - new Date(u.createdAt)) / (1000 * 60 * 60 * 24));
                        activities.push({
                            text: `👤 کاربر جدید: ${u.name}`,
                            time: days === 0 ? 'امروز' : days + ' روز پیش'
                        });
                    }
                });
                articles.forEach(a => {
                    if (a.createdAt) {
                        const days = Math.floor((today - new Date(a.createdAt)) / (1000 * 60 * 60 * 24));
                        activities.push({
                            text: `📄 مقاله جدید: ${a.title}`,
                            time: days === 0 ? 'امروز' : days + ' روز پیش'
                        });
                    }
                });

                activities.sort((a, b) => {
                    const aNum = parseInt(a.time) || 0;
                    const bNum = parseInt(b.time) || 0;
                    return aNum - bNum;
                });

                const list = document.getElementById('recentActivities');
                if (activities.length === 0) {
                    list.innerHTML = '<p class="empty-state">هیچ فعالیتی ثبت نشده است</p>';
                } else {
                    list.innerHTML = activities.slice(0, 5).map(a => `
                    <div class="activity-item">
                        <span class="activity-text">${a.text}</span>
                        <span class="activity-time">${a.time}</span>
                    </div>
                `).join('');
                }
            }

            // ============================================================
            // USERS
            // ============================================================
            function renderUsers() {
                const users = getData('users');
                const tbody = document.getElementById('usersTableBody');
                if (users.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="7" class="empty-state">هیچ کاربری یافت نشد</td></tr>';
                    return;
                }
                tbody.innerHTML = users.map((u, index) => `
                <tr>
                    <td>${index + 1}</td>
                    <td>${u.name}</td>
                    <td>${u.email}</td>
                    <td><span class="status-badge ${u.role === 'admin' ? 'status-published' : u.role === 'editor' ? 'status-pending' : 'status-draft'}">${u.role === 'admin' ? 'ادمین' : u.role === 'editor' ? 'ویرایشگر' : 'کاربر'}</span></td>
                    <td><span class="status-badge ${u.status === 'active' ? 'status-active' : 'status-inactive'}">${u.status === 'active' ? 'فعال' : 'غیرفعال'}</span></td>
                    <td>${u.createdAt || '-'}</td>
                    <td>
                        <div class="action-btns">
                            <button class="btn-edit" onclick="editUser(${u.id})"><i class="fas fa-edit"></i></button>
                            <button class="btn-delete" onclick="deleteUser(${u.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            `).join('');
            }

            function showAddUserModal() {
                document.getElementById('userModalTitle').textContent = 'افزودن کاربر جدید';
                document.getElementById('editUserId').value = '';
                document.getElementById('userForm').reset();
                document.getElementById('userPassword').required = true;
                openModal('userModal');
            }

            function editUser(id) {
                const users = getData('users');
                const user = users.find(u => u.id === id);
                if (!user) return;

                document.getElementById('userModalTitle').textContent = 'ویرایش کاربر';
                document.getElementById('editUserId').value = id;
                document.getElementById('userName').value = user.name;
                document.getElementById('userEmail').value = user.email;
                document.getElementById('userRole').value = user.role;
                document.getElementById('userPassword').required = false;
                document.getElementById('userPassword').placeholder = 'برای تغییر وارد کنید';
                openModal('userModal');
            }

            function saveUser(e) {
                e.preventDefault();
                const id = parseInt(document.getElementById('editUserId').value);
                const name = document.getElementById('userName').value;
                const email = document.getElementById('userEmail').value;
                const role = document.getElementById('userRole').value;
                const password = document.getElementById('userPassword').value;

                let users = getData('users');

                if (id) {
                    // Edit
                    const user = users.find(u => u.id === id);
                    if (user) {
                        user.name = name;
                        user.email = email;
                        user.role = role;
                        if (password && password.length >= 6) {
                            user.password = password;
                        }
                    }
                } else {
                    // Add
                    if (!password || password.length < 6) {
                        alert('رمز عبور باید حداقل ۶ کاراکتر باشد');
                        return;
                    }
                    users.push({
                        id: generateId(),
                        name,
                        email,
                        role,
                        password,
                        status: 'active',
                        createdAt: getDate()
                    });
                }

                saveData('users', users);
                closeModal('userModal');
                renderUsers();
                updateCounts();
                updateDashboard();
            }

            function deleteUser(id) {
                if (!confirm('آیا از حذف این کاربر مطمئن هستید؟')) return;
                let users = getData('users');
                users = users.filter(u => u.id !== id);
                saveData('users', users);
                renderUsers();
                updateCounts();
                updateDashboard();
            }

            // ============================================================
            // ARTICLES
            // ============================================================
            function renderArticles() {
                const articles = getData('articles');
                const categories = getData('categories');
                const tbody = document.getElementById('articlesTableBody');

                // Populate category filter
                const filter = document.getElementById('articleStatusFilter').value;
                const search = document.getElementById('articleSearch').value.toLowerCase();

                let filtered = articles;
                if (filter !== 'all') {
                    filtered = filtered.filter(a => a.status === filter);
                }
                if (search) {
                    filtered = filtered.filter(a => a.title.toLowerCase().includes(search));
                }

                if (filtered.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="8" class="empty-state">هیچ مقاله‌ای یافت نشد</td></tr>';
                    return;
                }

                tbody.innerHTML = filtered.map((a, index) => `
                <tr>
                    <td>${index + 1}</td>
                    <td><strong>${a.title}</strong></td>
                    <td>${a.author || 'نامشخص'}</td>
                    <td>${a.category || 'بدون دسته'}</td>
                    <td><span class="status-badge status-${a.status}">${a.status === 'published' ? 'منتشر شده' : a.status === 'draft' ? 'پیش‌نویس' : 'در انتظار'}</span></td>
                    <td>${a.views || 0}</td>
                    <td>${a.createdAt || '-'}</td>
                    <td>
                        <div class="action-btns">
                            <button class="btn-edit" onclick="editArticle(${a.id})"><i class="fas fa-edit"></i></button>
                            <button class="btn-delete" onclick="deleteArticle(${a.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            `).join('');
            }

            function filterArticles() {
                renderArticles();
            }

            function showAddArticleModal() {
                document.getElementById('articleModalTitle').textContent = 'افزودن مقاله جدید';
                document.getElementById('editArticleId').value = '';
                document.getElementById('articleForm').reset();

                // Populate categories
                const categories = getData('categories');
                const select = document.getElementById('articleCategory');
                select.innerHTML = categories.map(c => `<option value="${c.name}">${c.name}</option>`).join('');

                openModal('articleModal');
            }

            function editArticle(id) {
                const articles = getData('articles');
                const article = articles.find(a => a.id === id);
                if (!article) return;

                document.getElementById('articleModalTitle').textContent = 'ویرایش مقاله';
                document.getElementById('editArticleId').value = id;
                document.getElementById('articleTitle').value = article.title;
                document.getElementById('articleExcerpt').value = article.excerpt || '';
                document.getElementById('articleContent').value = article.content || '';
                document.getElementById('articleStatus').value = article.status;

                // Populate categories
                const categories = getData('categories');
                const select = document.getElementById('articleCategory');
                select.innerHTML = categories.map(c =>
                    `<option value="${c.name}" ${c.name === article.category ? 'selected' : ''}>${c.name}</option>`
                ).join('');

                openModal('articleModal');
            }

            function saveArticle(e) {
                e.preventDefault();
                const id = parseInt(document.getElementById('editArticleId').value);
                const title = document.getElementById('articleTitle').value;
                const category = document.getElementById('articleCategory').value;
                const status = document.getElementById('articleStatus').value;
                const excerpt = document.getElementById('articleExcerpt').value;
                const content = document.getElementById('articleContent').value;

                let articles = getData('articles');
                const users = getData('users');
                const admin = users.find(u => u.role === 'admin');

                if (id) {
                    // Edit
                    const article = articles.find(a => a.id === id);
                    if (article) {
                        article.title = title;
                        article.category = category;
                        article.status = status;
                        article.excerpt = excerpt;
                        article.content = content;
                    }
                } else {
                    // Add
                    articles.push({
                        id: generateId(),
                        title,
                        category,
                        status,
                        excerpt,
                        content,
                        author: admin ? admin.name : 'مدیر',
                        views: 0,
                        createdAt: getDate()
                    });
                }

                saveData('articles', articles);
                closeModal('articleModal');
                renderArticles();
                updateCounts();
                updateDashboard();
            }

            function deleteArticle(id) {
                if (!confirm('آیا از حذف این مقاله مطمئن هستید؟')) return;
                let articles = getData('articles');
                articles = articles.filter(a => a.id !== id);
                saveData('articles', articles);
                renderArticles();
                updateCounts();
                updateDashboard();
            }

            // ============================================================
            // CATEGORIES
            // ============================================================
            function renderCategories() {
                const categories = getData('categories');
                const articles = getData('articles');
                const tbody = document.getElementById('categoriesTableBody');

                if (categories.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="5" class="empty-state">هیچ دسته‌بندی یافت نشد</td></tr>';
                    return;
                }

                tbody.innerHTML = categories.map((c, index) => {
                    const count = articles.filter(a => a.category === c.name).length;
                    return `
                    <tr>
                        <td>${index + 1}</td>
                        <td><strong>${c.name}</strong></td>
                        <td>${c.slug || '-'}</td>
                        <td>${count}</td>
                        <td>
                            <div class="action-btns">
                                <button class="btn-delete" onclick="deleteCategory(${c.id})"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                `;
                }).join('');
            }

            function showAddCategoryModal() {
                document.getElementById('categoryForm').reset();
                openModal('categoryModal');
            }

            function saveCategory(e) {
                e.preventDefault();
                const name = document.getElementById('categoryName').value;
                const description = document.getElementById('categoryDesc').value;

                let categories = getData('categories');
                categories.push({
                    id: generateId(),
                    name,
                    slug: name.replace(/\s+/g, '-').toLowerCase(),
                    description
                });

                saveData('categories', categories);
                closeModal('categoryModal');
                renderCategories();
            }

            function deleteCategory(id) {
                if (!confirm('آیا از حذف این دسته‌بندی مطمئن هستید؟')) return;
                let categories = getData('categories');
                categories = categories.filter(c => c.id !== id);
                saveData('categories', categories);
                renderCategories();
            }

            // ============================================================
            // COMMENTS
            // ============================================================
            function renderComments() {
                const comments = getData('comments');
                const tbody = document.getElementById('commentsTableBody');

                if (comments.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="7" class="empty-state">هیچ نظری یافت نشد</td></tr>';
                    return;
                }

                tbody.innerHTML = comments.map((c, index) => `
                <tr>
                    <td>${index + 1}</td>
                    <td>${c.user}</td>
                    <td>${c.article}</td>
                    <td>${c.content.length > 50 ? c.content.substring(0, 50) + '...' : c.content}</td>
                    <td><span class="status-badge ${c.status === 'approved' ? 'status-approved' : 'status-pending'}">${c.status === 'approved' ? 'تایید شده' : 'در انتظار'}</span></td>
                    <td>${c.createdAt || '-'}</td>
                    <td>
                        <div class="action-btns">
                            ${c.status !== 'approved' ? `<button class="btn-approve" onclick="approveComment(${c.id})"><i class="fas fa-check"></i></button>` : ''}
                            <button class="btn-delete" onclick="deleteComment(${c.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            `).join('');
            }

            function approveComment(id) {
                let comments = getData('comments');
                const comment = comments.find(c => c.id === id);
                if (comment) {
                    comment.status = 'approved';
                    saveData('comments', comments);
                    renderComments();
                    updateCounts();
                }
            }

            function deleteComment(id) {
                if (!confirm('آیا از حذف این نظر مطمئن هستید؟')) return;
                let comments = getData('comments');
                comments = comments.filter(c => c.id !== id);
                saveData('comments', comments);
                renderComments();
                updateCounts();
            }

            // ============================================================
            // SETTINGS
            // ============================================================
            function saveSettings() {
                const title = document.getElementById('panelTitle').value;
                const itemsPerPage = document.getElementById('itemsPerPage').value;
                saveData('settings', {
                    title,
                    itemsPerPage
                });
                alert('تنظیمات با موفقیت ذخیره شد!');
                document.querySelector('.sidebar-header h2').textContent = title;
            }

            // Load settings
            const settings = getData('settings');
            if (settings && settings.title) {
                document.querySelector('.sidebar-header h2').textContent = settings.title;
                document.getElementById('panelTitle').value = settings.title;
                document.getElementById('itemsPerPage').value = settings.itemsPerPage || 10;
            }

            // ============================================================
            // GLOBAL SEARCH
            // ============================================================
            function globalSearch() {
                const query = document.getElementById('globalSearch').value.toLowerCase();
                if (!query) {
                    document.querySelectorAll('.page-section').forEach(s => s.classList.remove('active'));
                    document.getElementById('page-dashboard').classList.add('active');
                    return;
                }

                const users = getData('users').filter(u =>
                    u.name.toLowerCase().includes(query) ||
                    u.email.toLowerCase().includes(query)
                );

                const articles = getData('articles').filter(a =>
                    a.title.toLowerCase().includes(query) ||
                    a.content.toLowerCase().includes(query)
                );

                const results = [];
                users.forEach(u => results.push(`👤 کاربر: ${u.name} (${u.email})`));
                articles.forEach(a => results.push(`📄 مقاله: ${a.title}`));

                if (results.length === 0) {
                    alert('نتیجه‌ای یافت نشد');
                    return;
                }

                alert('نتایج جستجو:\n\n' + results.join('\n'));
            }

            // ============================================================
            // UPDATE COUNTS
            // ============================================================
            function updateCounts() {
                const users = getData('users');
                const articles = getData('articles');
                const comments = getData('comments');

                document.getElementById('userCount').textContent = users.length;
                document.getElementById('articleCount').textContent = articles.length;
                document.getElementById('commentCount').textContent = comments.length;
            }

            // ============================================================
            // INIT
            // ============================================================
            function init() {
                updateDashboard();
                renderUsers();
                renderArticles();
                renderCategories();
                renderComments();
                updateCounts();

                // Auto-show dashboard
                navigateTo('dashboard');
            }

            // Run on load
            init();
        </script>
    @else
        <h1>با این هوشیاریت ترافیک میشدی ؟</h1>
    @endif
</body>

</html>
