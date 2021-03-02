<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend') }}/images/favicon.png">
<title>dm Admin</title>

<link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('backend') }}/css/style_admin_press.css" rel="stylesheet">
<link href="{{ asset('backend') }}/css/style.css" rel="stylesheet">
</head>
<body>
{{-- ====================================================================== --}}
{{-- <section id="wrapper"> --}}
    <div class="login-register text-center" style="background: var(--bc2);">
        <div class="login-box card">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="form-horizontal form-material" id="loginform">
                    @csrf
                    <h3 class="box-title m-b-20"><strong>Login</strong> </h3>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email"> --}}
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="superadmin@dm.com" required autocomplete="email" autofocus placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input id="password" type="password" value="123456Su" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div class="form-group row">
                        <div class="col-md-12 font-14">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input class="form-check-input" type="checkbox" name="remember" id="checkbox-signup" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="checkbox-signup"> Remember me </label>
                            </div>
                        </div>
                    </div> --}}
                    <p class="text-center">Login Information <br> email:<b>superadmin@dm.com</b> <br> password:<b>123456Su</b></p>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light myLoginButton">
                                {{ __('Login') }}
                            </button>
                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link forgotPassword" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}
                        </div>
                    </div>
                    {{-- <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <div>Don't have an account? <br> <a href="{{ route('register') }}" class="text-info m-l-5"><b>Register</b></a></div>
                        </div>
                    </div> --}}
                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
{{-- ====================================================================== --}}
<script src="{{ asset('backend') }}/js/jquery.min.js"></script>
<script src="{{ asset('backend') }}/js/popper.min.js"></script>
<script src="{{ asset('backend') }}/js/bootstrap.min.js"></script>
</body>

</html>
