<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
             a{
                text-decoration: none;
                /*padding: 5px;
                padding-left: 10px;
                padding-right:  10px;*/
                color: #6382ff;
                font-weight: normal;
               /* font-size: 17px;*/
            }
        </style>
    </head>
    <body class="antialiased">
<!--         <div>
            <div class="top-toolbar">
                <span>
                    <a _ngcontent-serverapp-c93="" href="#" target="blank" class="social-icon mx-2" style="color: white;margin-right:10px;"><img class="logo" src="{{ asset('/images/icons/facebook.png') }}"></a>

                    <a _ngcontent-serverapp-c93="" href="#" target="blank" class="social-icon mx-2" style="color: white; margin-right:10px;"><img class="logo" src="{{ asset('/images/icons/instagram.png') }}"></a>
                    <a _ngcontent-serverapp-c93="" href="#" target="blank" class="social-icon mx-2" style="color: white;margin-right:10px;"><img class="logo" src="{{ asset('/images/icons/linkedin.png') }}"></a>

                    <a _ngcontent-serverapp-c93="" href="#" target="blank" class="social-icon mx-2" style="color: white;margin-right:10px;"><img class="logo" src="{{ asset('/images/icons/twitter.png') }}"></a>
                </span>
                <span style="float:right;color:#fafafa;">
                    
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}">Login | </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </span>
            </div> -->
            <!-- <mainapp></mainapp> -->
        </div>
        
    </body>

</html>
