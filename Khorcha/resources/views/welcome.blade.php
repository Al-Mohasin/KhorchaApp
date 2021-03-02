<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}

        <style media="screen">
            body{
                background: #1a2035;
            }
            .myPosition {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                border-left: 8px solid green;
                border-right: 8px solid green;
                padding: 20px 20px;
                background: #fff;
                border-radius: 5px;
            }
            .link {
                /* margin-bottom: 50px; */
            }

            .myPosition a {
                text-decoration: none;
                font-size: 20px;
                font-weight: bold;
                display: inline-block;
                margin-bottom: 20px;
                color: darkGreen;
            }
            .myPosition a:hover {
                text-decoration: underline;
            }
        </style>

        <style>
            body {
                /* font-family: 'Nunito'; */
                font-family: "Open Sans" !important;
            }
        </style>
    </head>
    <body class="antialiased">

        <div class="myPosition">
            @if (Route::has('login'))
                <div class="link">
                    @auth
                        <strong>You are logged In now, You can go . . .</strong>
                        <br>
                        <a href="{{ url('/home') }}"> Home</a>
                    @else
                        <a href="{{ route('login') }}"> <u>Click here for Login</u> </a>
                        <p>Login Information email:<b>superadmin@dm.com</b> password:<b>123456Su</b></p>
                        {{-- <br> <hr> --}}
                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endif
                </div>
            @endif
        </div>

    </body>
</html>
