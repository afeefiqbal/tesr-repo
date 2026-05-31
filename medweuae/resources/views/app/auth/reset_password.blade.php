<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{asset('web/images/logo.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Reset Password</title>
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
                <label for="chk" aria-hidden="true">Reset-Password</label>
                @if ($errors->any())
                    @error('username')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                @endif
                <input type="text" name="c_password" class="@error('password') is-invalid @enderror" id="c_password" placeholder="Password">
                <input type="hidden" name="token" id="token" value="{{$user->token}}">
                <input type="hidden" name="id" id="id" value="{{$user->id}}">
                <input type="password" name="confirm_password" class="@error('confirm_password') is-invalid @enderror" id="confirm_password" placeholder="Confirm Password">
                <input type="submit" value="Reset Password" class="login-btn" id="password_reset">
            </form>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('app/dist/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('app/dist/js/sweetalert-init.js')}}"></script>
    <script src="{{url('app/dist/js/custom.js?v=1.0')}}"></script>
</body>
</html>