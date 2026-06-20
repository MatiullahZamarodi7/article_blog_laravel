<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>افزودن مقاله جدید</title>
    <style>
        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* کارت اصلی */
        .card {
            background: white;
            border-radius: 1.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        /* هدر */
        .card-header {
            background: lightgray;
            padding: 2rem;
            color: rgb(0, 0, 0);
        }

        .card-header h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .card-header p {
            opacity: 0.9;
            font-size: 0.9rem;
        }

        /* فرم */
        .form {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #374151;
            font-size: 0.9rem;
        }

        label i {
            color: #4f46e5;
            margin-left: 0.5rem;
        }

        .required {
            color: #ef4444;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        /* ردیف دو ستونه */
        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        /* آپلود تصویر */
        .upload-area {
            border: 2px dashed #e5e7eb;
            border-radius: 0.75rem;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .upload-area:hover {
            border-color: #4f46e5;
            background: #f9fafb;
        }

        .upload-icon {
            font-size: 3rem;
            color: #9ca3af;
            margin-bottom: 0.5rem;
        }

        .upload-text {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .upload-btn {
            display: inline-block;
            background: #f3f4f6;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            margin-top: 0.5rem;
            color: #4f46e5;
            font-size: 0.85rem;
            font-weight: 500;
        }

        #imagePreview {
            margin-top: 1rem;
            display: none;
        }

        #previewImg {
            max-height: 150px;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* دکمه‌ها */
        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            padding-top: 1.5rem;
            border-top: 2px solid #f3f4f6;
            margin-top: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-cancel {
            background: #f3f4f6;
            color: #374151;
        }

        .btn-cancel:hover {
            background: #e5e7eb;
        }

        .btn-submit {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white;
            box-shadow: 0 4px 6px rgba(79, 70, 229, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(79, 70, 229, 0.4);
        }

        /* پیام */
        .message {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            padding: 1rem 1.5rem;
            border-radius: 0.75rem;
            display: none;
            animation: slideIn 0.3s ease;
            z-index: 1000;
        }

        .message.success {
            background: #10b981;
            color: white;
        }

        .message.error {
            background: #ef4444;
            color: white;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* ریسپانسیو */
        @media (max-width: 768px) {
            .row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .form {
                padding: 1.5rem;
            }

            .card-header {
                padding: 1.5rem;
            }

            .card-header h1 {
                font-size: 1.4rem;
            }
        }

        /* استایل اسلگ */
        .slug-helper {
            font-size: 0.75rem;
            color: #9ca3af;
            margin-top: 0.25rem;
        }

        /* رادیو و چک باکس */
        .helper-text {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 0.25rem;
        }
    </style>
</head>

<body>

    @include('layouts.partials.header')
    <br>
    <div class="container">

        <div class="card">
            <div class="card-header">
                <h1>
                    <span>✏️</span>
                    ایجاد مقاله جدید
                </h1>
                <p>اطلاعات مقاله را در فرم زیر وارد کنید</p>
            </div>

            <form action="{{ Route('create.store') }}" method="POST" class="form" id="articleForm"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>
                        <i>📝</i>
                        عنوان مقاله
                        <span class="required">*</span>
                    </label>
                    <input type="text" id="title" name="title" placeholder="مثال: آموزش جامع لاراول">
                </div>
                @error('title')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror

                <div class="row">

                    <div class="form-group">
                        <label>
                            <i>📁</i>
                            دسته‌بندی
                            <span class="required">*</span>
                        </label>
                        <select id="category" name="category_id">
                            <option value="">انتخاب دسته‌بندی</option>
                            <option value="1">برنامه‌نویسی</option>
                            <option value="2">طراحی وب</option>
                            <option value="3">هوش مصنوعی</option>
                            <option value="4">امنیت</option>
                            <option value="5">پایگاه داده</option>
                        </select>
                    </div>
                </div>
                @error('category_id')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    <label>
                        <i>📝</i>
                        عنوان مقاله
                        <span class="required">*</span>
                    </label>
                    <input type="file" id="image" name="image" placeholder="مثال: آموزش جامع لاراول">
                </div>


                @error('image')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-group">
                    <label>
                        <i>📄</i>
                        محتوای مقاله
                        <span class="required">*</span>
                    </label>
                    <textarea id="content" name="content" rows="12" placeholder="متن مقاله خود را بنویسید..."></textarea>
                    <div class="helper-text">از فرمت‌های HTML ساده می‌توانید استفاده کنید</div>
                </div>
                @error('content')
                    <div style="color: #ef4444; font-size: 0.95rem; margin-top: 0.25rem;">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-actions">

                    <button type="submit" class="btn btn-submit">
                        <span>💾</span>
                        انتشار مقاله
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="message" id="message"></div>

</body>

</html>
