
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Login Gorib er shope</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Effective Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
    />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="{{asset('css/adminLog.css')}}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //web-fonts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <div class="video-w3l" data-vide-bg="video/1">
        <!--header-->
        <div class="header-w3l">
            <h1>
                <span>A</span>dmin
                <span>L</span>ogin
                <span>F</span>orm
            </h1>
        </div>
        <!--//header-->
        <div class="main-content-agile">
            <div class="sub-main-w3">
                @include("admin.pages.message.validate ")
                <h2>Login Here
                    <i class="fa fa-hand-o-down" aria-hidden="true"></i>
                </h2>
                <form method="post" action="{{ route('admin.sabmit.login') }}">
                        @csrf
                    <div class="pom-agile">
                        <span class="fa fa-user-o" aria-hidden="true"></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="pom-agile">
                        <span class="fa fa-key" aria-hidden="true"></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                    <div class="sub-w3l">
                        <div class="sub-agile">
                             <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
                            <label for="brand1">
                                <span></span>Remember me</label>
                        </div>
                       @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        <div class="clear"></div>
                    </div>
                    <div class="right-w3l">
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>
        <!--//main-->
        <!--footer-->
        <div class="footer">
            <p>&copy; 2020 Gorib Login Form. All rights reserved
               
            </p>
        </div>
        <!--//footer-->
    </div>

    <!-- js -->
    <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/jquery.vide.min.js')}}"></script>
    <!-- //js -->

</body>

</html>