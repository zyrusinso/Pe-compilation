<!DOCTYPE html>
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <link rel="shortcut icon" href="https://cdn.gogocdn.net/files/gogo/img/favicon.ico" />
    <meta name="google-site-verification" content="shHYF9VOwfpFOdBpleH5jZ2CBuy6nVjX4PrkxMSRqHQ" />

    <title>PE COMPILATION</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" />

    @livewireStyles

    <!-- Script -->
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script>
        var base_url = 'https://' + document.domain + '/';
        var base_url_cdn_api = 'https://ajax.gogo-load.com/';
        var api_anclytic = 'https://ajax.gogo-load.com/anclytic-ajax.html';
    </script>
    <script type="text/javascript" src="{{ asset('frontend/js/main.js') }}"></script>
</head>

<body>
    <div class="clr"></div>
    <div id="wrapper_inside">
        <div id="wrapper">
            <div id="wrapper_bg">
            <header>
                <div class="menu_top_link">
                    <div class="user_auth">
                        <ul class="auth">
                            <li class="user">
                                @if(auth()->user())
                                    <i class="icongec-login"></i>
                                    <a href="{{ route('dashboard') }}" title="dashboard">Dashboard</a>
                                @else
                                    <i class="icongec-login"></i>
                                    <a href="{{ route('login') }}" title="login">Login</a>
                                @endif
                                <a class="fix">|</a>
                            </li>
                        </ul>
                    </div>
                    <div class="submenu_intro">
                        <a href="#" target="_blank">Request</a>
                        <span>|</span>
                        <a href="#">Contact us</a>
                    </div>
                </div>
                <div class="clr"></div>

                <!-- banner -->
                <section class="headnav">
                    <div class="page_menu_items show">
                        <a href="javascript:void(0)" class="menu_mobile">
                            <i class="icongec-menu-show"></i>
                        </a>
                    </div>
                    <div class="headnav_left">
                        <a href="{{ route('/') }}"><img src="{{ asset('frontend/img/icon/logo2.png') }}" class="logo show ads-evt"
                                alt="PE COMPILATION" /></a>
                    </div>
                    <div class="headnav_menu">
                        <!-- menu top -->
                        <nav class="menu_top">
                            <ul>
                                <li class="user">
                                    @if(auth()->user())
                                        <a href="{{ route('dashboard') }}" title="login">Dashboard</a>
                                    @else
                                        <i class="icongec-login"></i>
                                        <a href="{{ route('login') }}" title="login">Login</a>
                                    @endif
                                </li>

                                <li class="home {{ request()->routeIs('/')? 'active': ''}}">
                                    <a href="{{ route('/') }}" title="All" class="home ads-evt">All</a>
                                </li>
                                
                                @foreach(\App\Models\User::where('is_admin', '!=', 1)->get() as $item)
                                    <li class="home {{ Request::url() == route('user', $item->id)? 'active': '' }}">
                                        <a href="{{ route('user', $item->id) }}" title="{{ $item->lname }}" class="home ads-evt">{{ $item->lname }}</a>
                                    </li>
                                @endforeach
                                <!-- <li class="list">
                                    <a href="https://gogoanime.sk/anime-list.html" title="Anime list"
                                        class="list ads-evt">Anime list</a>
                                </li> -->
                            </ul>
                        </nav>
                        <!-- /menu top -->
                    </div>
                </section>
                <!-- /banner -->
            </header>

                {{ $slot }}
                
                <div class="clr"></div>
                <footer>
                    <div class="menu_bottom">
                        <a href="#">
                            <h3>Abouts us</h3>
                        </a>
                        <a href="#">
                            <h3>Contact us</h3>
                        </a>
                        <a href="#">
                            <h3>Privacy</h3>
                        </a>
                    </div>
                    <!-- <div class="croll">
                        <div class="big">
                            <i class="icongec-backtop"></i>
                        </div>
                        <div class="small">
                            <i class="icongec-backtop_mb"></i>
                        </div>
                    </div> -->
                </footer>
            </div>
        </div>
    </div>
    
    <div id="off_light"></div>
    <div class="clr"></div>
    <div class="mask"></div>
    @livewireScripts
    <script type="text/javascript" src="{{ asset('frontend/js/combo.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('frontend/js/tinyscrollbar.min.js') }}"></script>

    <script>
        if (document.getElementById("scrollbar2")) {
            $("#scrollbar2").tinyscrollbar();
        }
    </script>
</body>

</html>