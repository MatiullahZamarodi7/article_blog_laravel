<html dir="rtl" lang="fa-IR">

<head>
    <title>عضویت</title>
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
                    <div class="card-body p-4 text-center">
                        <a href="#"><img src="{{ asset('logo.png ') }}" alt="logo" class="pt-2 pb-4"></a>
                        @error('error')
                            {
                            div class="alert alert-danger">
                            {{ $message }}
                        </div>
                        }
                    @enderror
                    <form action="{{ Route('createAcount') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" id="username" class="form-control"
                                placeholder="نام کاربری">
                        </div>
                        <div>
                            @error('name')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="about" id="username" class="form-control"
                                placeholder=" در مورد خود">
                        </div>
                        <div>
                            @error('about')
                                <div class="alert text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="mail" class="form-control"
                                placeholder="آدرس ایمیل">
                        </div>
                        @error('email')
                            <div class="alert text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="کلمه عبور">
                        </div>
                        @error('password')
                            <div class="alert text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group mb-4">
                            <input type="password" name="password_confirmation" id="password" class="form-control"
                                placeholder="تکرار کلمه عبور">
                        </div>
                        @error('password_confirmation')
                            <div class="alert text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-group mb-4">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        @error('image')
                            <div class="alert text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <button type="submit" name="register" id="register"
                            class="btn btn-block btn-success py-2 radius10 mb-4">عضویت</button>
                        </p>
                        <p>ایا اکانت دارین؟<a href="{{ Route('login') }}" class="text-drkprimary">ورود با اکانت</a>

                    </form>
                </div>
            </div>
            <div class="col-lg-6 m-auto">
                <img src="{{ asset('assets/Img/login.jpg ') }}" class="img-fluid d-lg-block d-none" />
            </div>
        </div>
        </div>
    </section>
</body>

</html>
