    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="{{mix('/css/app.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{mix('/css/all.css')}}"/>
        <script type="application/javascript" src="{{mix('/js/app.js')}}"></script>
        <script type="application/javascript" src="{{mix('/js/all.js')}}"></script>

        <title>Document</title>
    </head>
    <body>

    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-default navbar-static-top navbar-inverse" role="navigation">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                                class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Brand</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        @if (Route::has('login'))

                            @if (Auth::check())
                                <li>
                                    <a href="{{ url('/') }}">Greed workers</a>
                                </li>
                                <li>
                                    <a href="{{ url('/workers') }}">Workers</a>
                                </li>
                                <li>
                                    <a href="{{ url('/worker/create') }}">Add worker</a>
                                </li>

                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            @endif

                        @endif

                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        @if(!Auth::check())
                            <li class="active">
                                <a href="{{ url('/login') }}">Login</a>
                            </li>
                            <li>
                                <a href="{{ url('/register') }}">Register</a>
                            </li>
                        @else
                            <li><a rel="nofollow">{{Auth::User()->name}}
                                </a></li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong
                                        class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>

                                <li>
                                    <a href="#">Another action</a>
                                </li>
                                <li>
                                    <a href="#">Something else here</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">Separated link</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>


            @include('layout_parts.errors')
            @if($flash = session('message'))
                <div class="alert alert-success col-lg-12 ">
                    {{$flash}}
                </div>
            @elseif($flash = session('messages'))
                <div class="alert alert-danger col-lg-12 ">
                    {{$flash}}
                </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.tree').treegrid();
    </script>


    </body>
    </html>


