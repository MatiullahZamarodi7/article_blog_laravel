<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تماس با ما</title>

    <style>
        /* تنظیمات کلی */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Tahoma', 'Arial', sans-serif;
        }



        /* باکس اصلی */
        .container {
            width: 100%;
            max-width: 700px;
            margin: 40px 0;
        }

        .contact-box {
            background: white;
            border-radius: 20px;
            padding: 40px 35px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .contact-box h1 {
            text-align: center !important;
            font-size: 32px !important;
            color: #333;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #888;
            font-size: 15px;
            margin-bottom: 30px;
        }

        /* پیام موفقیت */
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px 18px;
            border-radius: 10px;
            border-right: 4px solid #28a745;
            margin-bottom: 25px;
            font-size: 15px;
            display: none;
        }

        .success-message.show {
            display: block;
        }

        /* فرم */
        .contact-form .form-group {
            margin-bottom: 20px;
        }

        .contact-form label {
            display: block;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
            font-size: 14px;
            text-align: start;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: 0.3s;
            background: #f9f9f9;
            outline: none;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
        }

        .contact-form input.error,
        .contact-form textarea.error {
            border-color: #dc3545;
            background: #fff5f5;
        }

        .contact-form textarea {
            resize: vertical;
            min-height: 120px;
        }

        .error-message {
            color: #dc3545;
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        /* دکمه ارسال */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 5px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* اطلاعات تماس */
        .contact-info {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 2px solid #f0f0f0;
            gap: 15px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #555;
            font-size: 14px;
        }

        .info-item .icon {
            font-size: 20px;
        }

        /* اسپینر لودینگ */
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .btn-submit.loading .spinner {
            display: inline-block;
        }

        .btn-submit.loading .btn-text {
            display: none;
        }

        /* حالت نمایش موبایل */
        @media (max-width: 600px) {
            .contact-box {
                padding: 25px 20px;
            }

            .contact-box h1 {
                font-size: 26px;
            }

            .contact-info {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .btn-submit {
                font-size: 16px;
                padding: 12px;
            }
        }
    </style>
</head>

<body>
    @include('layouts.partials.header')
    <div class="container">
        <div class="contact-box">
            <h1>📞 تماس با ما</h1>
            <p class="subtitle">خوشحال می‌شویم نظرات و پیشنهادات شما را بشنویم</p>

            <!-- پیام موفقیت -->
            <div id="successMessage" class="success-message">
                ✅ پیام شما با موفقیت ارسال شد!
            </div>

            <!-- فرم تماس -->
            <form action="{{ Route('called.update', $messages->id) }}" method="POST" id="contactForm"
                class="contact-form">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">نام و نام خانوادگی</label>
                    <input type="text" id="name" value="{{ $messages->user->name }}" name="name" disabled
                        placeholder="نام خود را وارد کنید" required>
                    <div id="nameError" class="error-message">لطفاً نام خود را وارد کنید</div>
                </div>
                @error('name')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" id="email" value="{{ $messages->user->email }}" name="email" disabled
                        placeholder="ایمیل خود را وارد کنید" required>
                    <div id="emailError" class="error-message">لطفاً یک ایمیل معتبر وارد کنید</div>
                </div>
                @error('email')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="subject">موضوع</label>
                    <input type="text" id="subject" value="{{ $messages->title }}" name="title"
                        placeholder="موضوع پیام را وارد کنید">
                    <div id="subjectError" class="error-message">لطفاً موضوع را وارد کنید</div>
                </div>
                @error('title')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="message">پیام شما</label>
                    <textarea id="message" name="descriptions" rows="5" placeholder="متن پیام خود را بنویسید..." required>{{ old('content', $messages->descriptions) }}</textarea>
                    <div id="messageError" class="error-message">لطفاً پیام خود را بنویسید (حداقل ۱۰ کاراکتر)</div>
                </div>
                @error('descriptions')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn-submit" id="submitBtn">
                    <span class="btn-text">ارسال پیام</span>
                    <span class="spinner"></span>
                </button>
            </form>

            <!-- اطلاعات تماس -->
            <div class="contact-info">
                <div class="info-item">
                    <span class="icon">📱</span>
                    <span>۰۹۱۲-۱۲۳-۴۵۶۷</span>
                </div>
                <div class="info-item">
                    <span class="icon">✉️</span>
                    <span>info@example.com</span>
                </div>
                <div class="info-item">
                    <span class="icon">📍</span>
                    <span>تهران، خیابان آزادی، پلاک ۱۲۳</span>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.footer')


    <script>
        // انتخاب المان‌ها
        const form = document.getElementById('contactForm');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const subjectInput = document.getElementById('subject');
        const messageInput = document.getElementById('message');
        const submitBtn = document.getElementById('submitBtn');
        const successMsg = document.getElementById('successMessage');

        // تابع اعتبارسنجی
        function validateField(input, errorId, condition) {
            const errorEl = document.getElementById(errorId);
            if (!condition) {
                input.classList.add('error');
                errorEl.classList.add('show');
                return false;
            } else {
                input.classList.remove('error');
                errorEl.classList.remove('show');
                return true;
            }
        }

        // اعتبارسنجی کل فرم
        function validateForm() {
            const name = nameInput.value.trim();
            const email = emailInput.value.trim();
            const subject = subjectInput.value.trim();
            const message = messageInput.value.trim();

            const isNameValid = validateField(nameInput, 'nameError', name.length > 0);
            const isEmailValid = validateField(emailInput, 'emailError', /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email));
            const isSubjectValid = validateField(subjectInput, 'subjectError', subject.length > 0);
            const isMessageValid = validateField(messageInput, 'messageError', message.length >= 10);

            return isNameValid && isEmailValid && isSubjectValid && isMessageValid;
        }

        // رویدادهای اعتبارسنجی لحظه‌ای
        nameInput.addEventListener('blur', () => {
            validateField(nameInput, 'nameError', nameInput.value.trim().length > 0);
        });

        emailInput.addEventListener('blur', () => {
            const email = emailInput.value.trim();
            validateField(emailInput, 'emailError', /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email));
        });

        subjectInput.addEventListener('blur', () => {
            validateField(subjectInput, 'subjectError', subjectInput.value.trim().length > 0);
        });

        messageInput.addEventListener('blur', () => {
            validateField(messageInput, 'messageError', messageInput.value.trim().length >= 10);
        });

        // ارسال فرم
        // form.addEventListener('submit', function(e) {
        //     e.preventDefault();

        //     // مخفی کردن پیام موفقیت قبلی
        //     successMsg.classList.remove('show');

        //     // اعتبارسنجی
        //     if (!validateForm()) {
        //         return;
        //     }

        //     // نمایش لودینگ
        //     submitBtn.classList.add('loading');
        //     submitBtn.disabled = true;

        //     // شبیه‌سازی ارسال به سرور
        //     setTimeout(() => {
        //         // مخفی کردن لودینگ
        //         submitBtn.classList.remove('loading');
        //         submitBtn.disabled = false;

        //         // نمایش پیام موفقیت
        //         successMsg.classList.add('show');

        //         // پاک کردن فرم
        //         form.reset();

        //         // حذف کلاس error از همه فیلدها
        //         document.querySelectorAll('.error').forEach(el => {
        //             el.classList.remove('error');
        //         });

        //         // اسکرول به بالای صفحه
        //         window.scrollTo({
        //             top: 0,
        //             behavior: 'smooth'
        //         });

        //     }, 2000);
        // });
    </script>

</body>

</html>
