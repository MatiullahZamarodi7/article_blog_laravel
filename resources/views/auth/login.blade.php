<html dir="rtl" lang="fa-IR">

<head>
    <title>ورود</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1">
    <link href=" {{ asset('assets/Css/Main.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/Css/Style.css') }}" rel="stylesheet" />
</head>

<body class="rtl bg-greengrad min-h">
    <section class="container maxw">
        <div class="card login  mx-md-5 mt-5 justify-content-center shadow-none">
            <div class="row">

                <div class="col-lg-6">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body p-4 text-center">
                        <a href="#"><img src="  {{ asset('logo.png') }}" alt="logo"
                                class="pt-2 pb-4"></a>

                        <form action="{{ Route('loginAcount') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" required
                                    placeholder="ایمیل">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password" id="password" class="form-control" required
                                    placeholder="کلمه عبور">
                            </div>
                            <button type="submit" name="login" id="login"
                                class="btn btn-block py-2 btn-success radius10 my-3">ورود</button>

                            <p>هنوز ثبت نام نکرده اید ؟ <a href="{{ Route('register') }}" class="text-drkprimary">عضویت
                                    در سایت</a></p>
                        </form>

                    </div>
                </div>
                <div class="col-lg-6 m-auto">
                    <img src="  {{ asset('assets/Img/login.jpg') }}" class="img-fluid d-lg-block d-none" />
                </div>
            </div>
        </div>
    </section>
</body>

</html>
