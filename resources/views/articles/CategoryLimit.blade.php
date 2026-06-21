<html dir="rtl" lang="fa-IR">

<head>

    <title>وبلاگ</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1">
    <link href=" {{ asset('assets/Css/Main.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/Css/Menu-demo1.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/Css/Style.css') }}" rel="stylesheet" />
</head>

<body class="rtl blog">
    <div class="main_wrap">
        <div class="of-site-mask"></div>

        <div class="off-canvas-wrap ">
            <div class="close-off-canvas-wrap">
                <a href="#" id="of-close-off-canvas">
                    <i class="fal fa-times"></i>
                </a>
            </div>
            <div class="off-canvas-inner">
                <div id="of-mobile-nav" class="mobile-menu-wrap">
                    <ul class="mobile-menu">
                        <li class="current-menu-item">
                            <a href="Index_demo1.html">صفحه اصلی</a>
                        </li>
                        <li>
                            <a href="blog.html">مقالات</a>
                        </li>
                        <li><a href="aboutus.html" target="_blank">درباره ما</a></li>
                        <li><a href="ContactUs.html" target="_blank">تماس با ما</a></li>
                    </ul>
                </div>
            </div>
        </div>




        @include('layouts.partials.header');




        <div class="clearfix"></div>
        <section class="container mt-4 mb-2">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb radius15 shadow-sm">
                        <ul>
                            <li><a href="#">خانه / </a></li>
                            <li><a href="#" class="current">لیست مقالات</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        @if (session('success'))
            <div class="alert alert-success text-center  my-5" style="font-size: 30px;">
                {{ session('success') }}
            </div>
        @endif

        <section class="container mb-4">
            <div class="row">




                @include('layouts.partials.sideBar')

                <div class="col-xl-9  order-xl-1 order-0 mb-4">

                    <div class="row">
                        @foreach ($articles as $article)
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="card">
                                    <a href="{{ Route('singlePage', ['id' => $article->id]) }}"><img
                                            class="card-img-top" src=" {{ asset('article/images/' . $article->image) }}"
                                            style=" height: 250px;" alt="Card image"></a>
                                    <div class="card-body">
                                        <h2 class="IRANSans_Bold"
                                            style="display: flex; justify-content: space-between; margin: 5px 0;"><a
                                                href="{{ Route('singlePage', ['id' => $article->id]) }}">
                                                {{ $article->title }}
                                            </a>
                                            <span><i>📅
                                                    {{ $article && $article->created_at->diffForHumans() ? $article->created_at->diffForHumans() : 'تاریخ یوزیر پیدا نشد' }}
                                                </i></span>
                                        </h2>

                                        <p>
                                            {{ Str::limit($article->content, 60) }}
                                        </p>
                                        <div
                                            style="display: flex; flex-direction: row-reverse; justify-content: space-between;">
                                            <div>
                                                <span class="text-primary fa12 IRANSans_Medium"><a
                                                        href="{{ Route('profile.show', ['profile' => $article->user->id]) }}">
                                                        {{ $article->user->name }}
                                                    </a></span>
                                                <img style="height: 30px ; width: 30px; border-radius: 9999px"
                                                    src="{{ asset('images/' . $article->user->image) }}"
                                                    alt="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center mx-auto">
                            <ul class="pagination  justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item "><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item "><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>





            </div>
        </section>


        @include('layouts.partials.footer')

    </div>

    <script src="Js/jquery.min.js"></script>
    <script src="Js/bootstrap.min.js"></script>
    <script src="Js/my-script.js"></script>
    <script src="Js/custom.js "></script>


</body>

</html>
