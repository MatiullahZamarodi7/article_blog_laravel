<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Bootstrap UI</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: white;
        }

        .custom-card {
            background: rgb(255, 255, 255);
            border-radius: 20px;
            color: #000;
            box-shadow: 0 5px 4px lightgray
        }

        .img-box {
            width: 110px;
            height: 110px;
            background: #fff;
            border-radius: 50%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .article-img {
            height: 140px;
            background: #fff;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-edit {
            background: #0d6efd;
            color: white;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }
    </style>
</head>

<body>
    @include('layouts.partials.header')

    @if (session('success'))
        <div class="alert alert-success text-center  my-5" style="font-size: 30px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- USER CARD -->
    <div class="container py-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-4">
                <div class="p-3 text-center custom-card">

                    <div class=" mb-3">
                        <img class="img-box" src="{{ asset('images/' . $user->image) }}" alt="">
                    </div>

                    <div class="text-start">
                        <p><b>name :</b> {{ $user->name }}</p>
                        <p><b>: about <br></b>
                        <p style="text-align: justify;">{{ $user->about }}</p>
                        </p>
                        <p><b>email :</b>{{ $user->email }}</p>
                        <p><b>role :</b> {{ $user->role }}</p>
                    </div>
                    <style>
                        .ali {
                            justify-content:
                        }
                    </style>

                    @if (Auth::user()->id == $user->id)
                        @auth
                            <div class="d-flex justify-content-start gap-2 mt-3">
                                <form action="{{ Route('profile.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('do you want delete your account!')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">حذف</button>
                                </form>
                                <a href="{{ Route('profile.edit', $user->id) }}"><button
                                        class="btn btn-outline-success">ویرایش</button></a>
                            </div>
                        @endauth
                    @endif

                </div>
            </div>
        </div>

        <!-- ARTICLES -->
        <div class="row g-3">

            <!-- CARD -->
            @foreach ($articles as $article)
                <div class="col-md-3">
                    <div class="p-3 custom-card ">

                        <div class="mb-2">

                            <a href="{{ Route('singlePage', ['id' => $article->id]) }}">
                                <img style="height: 250px; width: 100%;"
                                    src="{{ asset('article/images/' . $article->image) }}" class="article-img">
                            </a>

                        </div>


                        <h2 class="IRANSans_Bold" style="display: flex; justify-content: space-between; margin: 5px 0;">
                            <a href="{{ Route('singlePage', ['id' => $article->id]) }}">
                                <p><b>عنوان :</b>{{ $article->title }}</p>
                            </a>
                            <span><i>📅
                                    {{ $article && $article->created_at->diffForHumans() ? $article->created_at->diffForHumans() : 'تاریخ یوزیر پیدا نشد' }}
                                </i></span>
                        </h2>
                        <p>{{ Str::limit($article->content, 60) }}</p>

                        @if (Auth::user()->id == $article->user->id)
                            @auth
                                <div class="d-flex justify-content-end gap-2 mt-3">
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                        onsubmit="return confirm('آیا مطمئن هستید که میخواهید این مقاله حذف شود؟')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger">
                                            حذف
                                        </button>

                                    </form>
                                    <a href="{{ Route('articles.edit', $article->id) }}"><button
                                            class="btn btn-outline-success">ویرایش</button></a>
                                </div>
                            @endauth
                        @endif

                    </div>
                </div>
            @endforeach

        </div>
    </div>


    </div>
    @include('layouts.partials.footer');
</body>

</html>
