<html dir="rtl" lang="fa-IR">

<head>

    <title>جزئیات وبلاگ</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1">
    <link href=" {{ asset('assets/Css/Main.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/Css/Menu-demo1.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/Css/Style.css') }}" rel="stylesheet" />
</head>

<body class="rtl blog_details">
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

        @include('layouts.partials.header')


        <div class="clearfix"></div>
        <section class="container mt-4 mb-2">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb radius15 shadow-sm">
                        <ul>
                            <li><a href="{{ Route('home') }}">خانه / </a></li>
                            <li><a href="#" class="current">جزئیات وبلاگ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <section class="container mb-4">
            <div class="row">


                @include('layouts.partials.sideBar')


                <div class="col-xl-9  order-xl-1 order-0 mb-3">
                    <div class="card">
                        <div class="card-header">
                            <h2>نمایش <span class="text-primary">جزئیات</span></h2>
                        </div>
                        <div class="card-body p-sm-4">
                            <div class="item mb-4">

                                <div class="row">
                                    <div class="col-lg-12 mb-3 text-justify ">
                                        <a href="#" class="mb-3">
                                            <h2> {{ $article->title }} </h2>
                                        </a>
                                        <img src="{{ $article->image ? asset('article/images/' . $article->image) : asset('notFound.svg') }}"
                                            alt="" class="img-fluid my-4 blogimg radius15" />
                                        <p>{{ $article->content }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; flex-direction: row-reverse; justify-content: space-between;">
                            <div style="display: flex; flex-direction: column; " class="mx-3 ">
                                <div>
                                    <span class="text-primary fa12 IRANSans_Medium"><a
                                            href="{{ Route('profile.show', ['profile' => $article->user->id]) }}">
                                            {{ $article->user->name }}
                                        </a></span>
                                    <img style="height: 30px ; width: 30px; border-radius: 9999px"
                                        src="{{ asset('images/' . $article->user->image) }}" alt="">
                                </div>
                                <span><i>
                                        {{ $article && $article->created_at->diffForHumans() ? $article->created_at->diffForHumans() : 'تاریخ یوزیر پیدا نشد' }}
                                        📅</i></span>
                            </div>
                            @if (Auth::user()->id == $article->user->id)
                                @auth
                                    <div style="display: flex ;" class="my-3 mx-3">

                                        <a href="{{ Route('articles.edit', $article->id) }}"><button
                                                class="btn btn-outline-success mx-2"
                                                style="font-weight: bold;">ویرایش</button></a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                            onsubmit="return confirm('آیا مطمئن هستید که میخواهید این مقاله حذف شود؟')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-outline-danger" style="font-weight:bold;">
                                                حذف
                                            </button>

                                        </form>
                                    </div>
                                @endauth
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <footer class="fdemo3 pt-4 pb-2">
            <div class="container footer-wrap">
                <div class="row py-3">
                    <div class="col-lg-4 col-md-6  col-sm-12 mb-4 order-lg-0 order-3">
                        <div class="pl-md-4 mb-2 text-right">

                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                گرافیک است
                            </p>
                            <ul class="standard_social_links mt-2 float-right">

                                <li class="round-btn btn-facebook">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>

                                <li class="round-btn btn-instagram">
                                    <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                </li>
                                <li class="round-btn btn-whatsapp">
                                    <a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>

                                </li>
                                <li class="round-btn btn-telegram">
                                    <a href="#"><i class="fab fa-telegram-plane" aria-hidden="true"></i></a>
                                </li>

                            </ul>

                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6 mb-4 order-lg-1 order-0">
                        <h3>لینک های سریع</h3>
                        <ul class="footer-category">
                            <li>
                                <a href="Index_demo1.html"><i class="fal fa-angle-left ml-2"></i>صفحه اصلی</a>
                            </li>
                            <li>
                                <a href="Service.html"><i class="fal fa-angle-left ml-2"></i>مقالات</a>
                            </li>
                            <li>
                                <a href="aboutus.html"><i class="fal fa-angle-left ml-2"></i>درباره ما</a>
                            </li>
                            <li>
                                <a href="ContactUs.html"><i class="fal fa-angle-left ml-2"></i>تماس با ما</a>
                            </li>
                        </ul>
                    </div>


                    <div class="col-lg-4 col-md-6 col-sm-12 px-md-3 mb-4 order-lg-3  order-4">
                        <h3>عضویت در خبرنامه</h3>
                        <p> ثبت نام کنید و آخرین نکات را از طریق ایمیل دریافت کنید ، جهت ثبت نام فقط کافی ست که آدرس
                            ایمیل را در کادر زیر وارد نمایید</p>
                        <form class="newsletter p_relative mt-3">
                            <input type="text" placeholder="آدرس ایمیل">
                            <button class="newsletter_submit_btn" type="submit"><i
                                    class="fab fa-telegram-plane"></i></button>
                        </form>
                    </div>
                </div>


            </div>

        </footer>
    </div>

    <script src=" {{ asset('assets/Js/jquery.min.js') }}"></script>
    <script src=" {{ asset('assets/Js/bootstrap.min.js') }}"></script>
    <script src=" {{ asset('assets/Js/my-script.js') }}"></script>
    <script src=" {{ asset('assets/Js/custom.js') }}"></script>


</body>

</html>
