<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{asset('web/images/logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Login</title>
    <link rel="stylesheet" href="{{asset('app/dist/css/sweetalert.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/dist/css/sweetalert-overrides.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app/dist/css/login.css?v=1.0')}}">
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
        var token = "{{ csrf_token() }}";
    </script>
</head>
<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class=" alignText">
            <img class="animation__shake logo" src="{{asset('app/dist/img/logo.png')}}" alt="{{ config('app.name') }}">
        </div>
        <div class="signup login-show">
            <form method="post">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <span class="invalid-feedback" role="alert"><strong>{{ $error }}</strong></span>
                    @endforeach
                @endif
                <input type="text" name="username" class=" @error('username') is-invalid @enderror" id="username" required placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Password" required class="@error('password') is-invalid @enderror">
                <button class="login-btn">Login</button>
            </form>
        </div>

        <div class="login register-show">
            <form method="post">
                @csrf
                <label for="chk" aria-hidden="true">Forgot Password</label>
                <input type="text" placeholder="Email" name="forgot_username" id="forgot_username">
                <input class="login-btn" type="button" value="Submit" id="forgot_password_btn">
            </form>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('app/dist/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('app/dist/js/sweetalert-init.js')}}"></script>
    <script src="{{url('app/dist/js/custom.js?v=1.0')}}"></script>
</body>
</html>