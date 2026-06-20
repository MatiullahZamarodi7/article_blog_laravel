<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پروفایل کاربر | ویرایش اطلاعات</title>
    <!-- Font Awesome 6 (رایگان) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(145deg, #f5f7fa 0%, #e9edf5 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;

            justify-content: center;
            padding: 1.5rem;
        }

        /* کارت اصلی پروفایل */
        .profile-card {
            max-width: 700px;
            position: relative;
            right: 30%;
            margin: 30px 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 48px;
            padding: 2.5rem 2.2rem;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.12), 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
        }

        .profile-card:hover {
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.15);
        }

        /* هدر با آواتار و عنوان */
        .profile-header {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-bottom: 2.5rem;
        }

        .avatar-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            flex-shrink: 0;
        }

        .avatar-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }

        .avatar-edit-btn {
            position: absolute;
            bottom: 2px;
            right: 2px;
            background: #4f46e5;
            color: white;
            border: 2px solid white;
            border-radius: 50%;
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            cursor: pointer;
            transition: 0.2s;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.3);
        }

        .avatar-edit-btn:hover {
            background: #4338ca;
            transform: scale(1.05);
        }

        .profile-title {
            flex: 1;
        }

        .profile-title h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1e1b2e;
            letter-spacing: -0.5px;
        }

        .profile-title p {
            color: #5b5b7b;
            font-weight: 400;
            font-size: 0.95rem;
            margin-top: 4px;
        }

        /* فرم */
        .edit-form {
            display: flex;
            flex-direction: column;
            gap: 1.8rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 0.9rem;
            color: #2d2a44;
            letter-spacing: 0.3px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group label i {
            color: #4f46e5;
            width: 20px;
            font-size: 1rem;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 60px;
            padding: 0 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            border: 1.5px solid #e9ecf3;
            transition: all 0.25s;
        }

        .input-wrapper:focus-within {
            border-color: #4f46e5;
            box-shadow: 0 4px 16px rgba(79, 70, 229, 0.15);
        }

        .input-wrapper input {
            width: 100%;
            border: none;
            padding: 16px 6px 16px 0;
            font-size: 1rem;
            background: transparent;
            color: #1e1b2e;
            outline: none;
            direction: ltr;
        }

        .input-wrapper input::placeholder {
            color: #b0b3c9;
            font-weight: 300;
        }

        .input-wrapper i.fa-eye,
        .input-wrapper i.fa-eye-slash {
            color: #8e90a8;
            cursor: pointer;
            font-size: 1.1rem;
            transition: 0.2s;
            padding: 8px 0 8px 8px;
        }

        .input-wrapper i.fa-eye:hover,
        .input-wrapper i.fa-eye-slash:hover {
            color: #4f46e5;
        }

        /* دکمه‌ها */
        .form-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-top: 0.8rem;
        }

        .btn {
            padding: 14px 32px;
            border: none;
            border-radius: 60px;
            font-weight: 600;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: 0.2s ease;
            background: white;
            color: #1e1b2e;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.02);
            border: 1.5px solid #e0e4ee;
            flex: 1 1 auto;
        }

        .btn-primary {
            background: #4f46e5;
            border: 1.5px solid #4f46e5;
            color: white;
            box-shadow: 0 10px 20px -8px rgba(79, 70, 229, 0.35);
        }

        .btn-primary:hover {
            background: #4338ca;
            border-color: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 16px 28px -8px rgba(79, 70, 229, 0.45);
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid #e0e4ee;
        }

        .btn-outline:hover {
            background: #f0f2f9;
            border-color: #c8cde0;
        }

        .btn i {
            font-size: 1rem;
        }

        /* پیام موفقیت */
        .toast-message {
            background: #1e1b2e;
            color: white;
            padding: 14px 24px;
            border-radius: 60px;
            font-weight: 500;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-top: 2rem;
            opacity: 0;
            transform: translateY(12px);
            transition: 0.3s ease;
            pointer-events: none;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .toast-message.show {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .toast-message i {
            color: #6ee7b7;
            font-size: 1.3rem;
        }

        /* ریسپانسیو */
        @media (max-width: 550px) {
            .profile-card {
                padding: 1.8rem 1.2rem;
                border-radius: 32px;
            }

            .profile-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.8rem;
            }

            .avatar-wrapper {
                width: 80px;
                height: 80px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        /* استایل آپلود مخفی */
        #avatarUpload {
            display: none;
        }

        /* لینک کمکی */
        .hint-text {
            font-size: 0.8rem;
            color: #888aa8;
            margin-top: 4px;
            padding-right: 8px;
        }
    </style>
</head>

<body>

    @include('layouts.partials.header')
    {{-- @if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->id == $user->id)) --}}
    <div class="profile-card" id="profileCard">
        <!-- هدر -->

        <!-- فرم ویرایش -->
        <form action="{{ Route('profile.update', $user->id) }}" id="editProfileForm" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="profile-header">
                <div class="avatar-wrapper">
                    <!-- تصویر پیش‌فرض (با قابلیت تغییر) -->
                    <img class="img-box" src="{{ asset('images/' . $user->image) }}" alt="">

                    <label for="avatarUpload" class="avatar-edit-btn" title="تغییر عکس">
                        <i class="fas fa-camera"></i>
                    </label>
                    <input type="file" name="image" id="avatarUpload">
                </div>
                @error('image')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror
                <div class="profile-title">
                    <h2>ویرایش پروفایل</h2>
                    <p><i class="fas fa-user-edit" style="margin-left: 6px;"></i> اطلاعات خود را به‌روز کنید</p>
                </div>
            </div>
            <!-- نام و نام‌خانوادگی -->
            <div class="form-group">
                <label for="fullName"><i class="fas fa-user-circle"></i> نام کامل</label>
                <div class="input-wrapper">
                    <input type="text" name="name" id="fullName" value="{{ $user->name }}"
                        placeholder="مثلاً مطیع الله زمردی " value="کاربر نمونه">
                </div>
                @error('name')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ایمیل -->
            <div class="form-group">
                <label for="email"><i class="fas fa-envelope"></i> آدرس ایمیل</label>
                <div class="input-wrapper">
                    <input type="email" name="email" value="{{ $user->email }}" id="email"
                        placeholder="example@domain.com" value="user@sample.com">
                </div>
                @error('email')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- پسورد -->
            <div class="form-group">
                <label for="password"><i class="fas fa-lock"></i> رمز عبور</label>
                <div class="input-wrapper">
                    <input type="password" name="password" id="password" value="{{ $user->password }}"
                        placeholder="رمز جدید (حداقل ۶ کاراکتر)" value="12345678">
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>
                @error('password')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror
                <div class="hint-text">
                    <i class="fas fa-info-circle" style="margin-left: 6px;"></i> برای تغییر، رمز جدید وارد کنید
                </div>
            </div>

            <!-- دکمه‌ها -->
            <div class="form-actions">

                <button type="submit" class="btn btn-primary" id="saveBtn">
                    <i class="fas fa-save">ذخیره تغییرات</i>
                </button>

                <button type="reset" class="btn btn-outline" id="resetBtn">
                    <i class="fas fa-undo-alt"></i> بازنشانی
                </button>
            </div>
        </form>

        <!-- پیام موفقیت -->
        <div class="toast-message" id="successToast">
            <i class="fas fa-check-circle"></i>
            <span>اطلاعات با موفقیت به‌روز شد!</span>
        </div>
        {{-- @else
            <h1>خیرت خو است </h1>
    @endif --}}
    </div>

    {{-- <script>
            (function() {
                // ---------- عناصر DOM ----------
                const avatarImg = document.getElementById('avatarPreview');
                const avatarUpload = document.getElementById('avatarUpload');
                const fullNameInput = document.getElementById('fullName');
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                const togglePassword = document.getElementById('togglePassword');
                const form = document.getElementById('editProfileForm');
                const resetBtn = document.getElementById('resetBtn');
                const toast = document.getElementById('successToast');

                // ---------- آپلود عکس (با FileReader) ----------
                avatarUpload.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (!file) return;

                    // اعتبارسنجی ساده نوع فایل
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
                    if (!validTypes.includes(file.type)) {
                        alert('لطفاً یک تصویر با فرمت JPEG, PNG, WEBP انتخاب کنید.');
                        this.value = ''; // reset
                        return;
                    }

                    // حداکثر حجم ۲ مگابایت
                    if (file.size > 2 * 1024 * 1024) {
                        alert('حجم تصویر نباید بیشتر از ۲ مگابایت باشد.');
                        this.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(ev) {
                        avatarImg.src = ev.target.result;
                        // (اختیاری) نمایش toast کوتاه برای آپلود
                        showTemporaryToast('عکس با موفقیت آپلود شد');
                    };
                    reader.onerror = function() {
                        alert('خطا در بارگذاری تصویر، مجدد تلاش کنید.');
                    };
                    reader.readAsDataURL(file);
                });

                // ---------- نمایش/مخفی کردن پسورد ----------
                let passwordVisible = false;
                togglePassword.addEventListener('click', function() {
                    passwordVisible = !passwordVisible;
                    passwordInput.type = passwordVisible ? 'text' : 'password';
                    this.className = passwordVisible ? 'fas fa-eye-slash' : 'fas fa-eye';
                });

                // ---------- تابع نمایش پیام (با auto-hide) ----------
                let toastTimeout = null;

                function showTemporaryToast(message = 'اطلاعات با موفقیت به‌روز شد!') {
                    const toastSpan = toast.querySelector('span');
                    if (toastSpan) toastSpan.textContent = message;

                    toast.classList.add('show');
                    clearTimeout(toastTimeout);
                    toastTimeout = setTimeout(() => {
                        toast.classList.remove('show');
                    }, 3000);
                }

                // ---------- ذخیره تغییرات (فرم) ----------
                // form.addEventListener('submit', function(e) {
                //     e.preventDefault();

                //     // اعتبارسنجی ساده
                //     const name = fullNameInput.value.trim();
                //     const email = emailInput.value.trim();
                //     const password = passwordInput.value.trim();

                //     if (name === '') {
                //         alert('لطفاً نام کامل را وارد کنید.');
                //         fullNameInput.focus();
                //         return;
                //     }

                //     // اعتبارسنجی ایمیل (ساده)
                //     const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                //     if (email !== '' && !emailRegex.test(email)) {
                //         alert('لطفاً یک ایمیل معتبر وارد کنید (مثال: name@domain.com)');
                //         emailInput.focus();
                //         return;
                //     }

                //     if (password !== '' && password.length < 6) {
                //         alert('رمز عبور باید حداقل ۶ کاراکتر باشد.');
                //         passwordInput.focus();
                //         return;
                //     }

                //     // --- اگر همه چیز درست بود، ذخیره (شبیه‌سازی) ---
                //     console.log('✅ ذخیره اطلاعات:');
                //     console.log('نام:', name);
                //     console.log('ایمیل:', email);
                //     console.log('رمز (تعداد کاراکتر):', password.length > 0 ? '******' : '(خالی)');
                //     console.log('عکس:', avatarImg.src.substring(0, 60) + '...');

                //     // نمایش پیام موفقیت
                //     showTemporaryToast('✅ اطلاعات با موفقیت ذخیره شد!');

                //     // (اختیاری) می‌توانید داده‌ها را به سرور بفرستید ...
                // });

                // ---------- دکمه بازنشانی (reset) ----------
                resetBtn.addEventListener('click', function(e) {
                    e.preventDefault(); // جلوگیری از reset فرم (که عکس رو ریست نمیکنه)
                    // برگرداندن فیلدها به مقدار اولیه (مقادیر پیش‌فرض)
                    fullNameInput.value = 'کاربر نمونه';
                    emailInput.value = 'user@sample.com';
                    passwordInput.value = '12345678';
                    // اگر پسورد مخفی بود، حالت رو به password برگردون
                    if (passwordVisible) {
                        passwordVisible = false;
                        passwordInput.type = 'password';
                        togglePassword.className = 'fas fa-eye';
                    }
                    // عکس رو به آواتار پیش‌فرض برگردون (با استفاده از سرویس ui-avatars)
                    avatarImg.src =
                        'https://ui-avatars.com/api/?name=کاربر+نمونه&background=4f46e5&color=fff&size=100';
                    // ریست کردن input فایل (تا آپلود مجدد بشه)
                    avatarUpload.value = '';

                    // پیام کوتاه
                    showTemporaryToast('↺ اطلاعات به حالت اولیه بازگشت');
                });

                // ---------- (اختیاری) کلیک روی آواتار باز کردن آپلودر ----------
                // اگر کاربر روی خود عکس کلیک کنه، آپلودر باز بشه (راحتی)
                avatarImg.addEventListener('click', function() {
                    avatarUpload.click();
                });

                // ---------- نمایش toast خوش‌آمدگویی (اختیاری) ----------
                // هنگام لود صفحه یک پیام کوتاه نمایش بده
                window.addEventListener('load', function() {
                    setTimeout(() => {
                        showTemporaryToast('👋 به پنل ویرایش خوش آمدید');
                    }, 400);
                });

            })();
        </script> --}}


    @include('layouts.partials.footer')
</body>

</html>
