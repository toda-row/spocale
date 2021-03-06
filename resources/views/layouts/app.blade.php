<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" crossorigin="anonymous">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <!--<a class="navbar-brand" href="{{ url('/') }}">-->
                    <!--    {{ config('app.name', 'Laravel') }}-->
                    <!--</a>-->
                    <div>
                        <a href="{{ url('/')}}">
                            <img src="/image/tophead.JPG" alt="spocale" width="200" height="60">
                        </a>
                    </div>
                    <div
                      class="fb-like"
                      data-share="true"
                      data-width="450"
                      data-show-faces="true">
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            <li><a href="{{ url('events/new/')}}">イベント作成</a></li>
                        
                                     
                        @else
                        <li><a href="https://phpadmin-todarow.c9users.io/phpmyadmin" target=”_blank”>phpmyadmin</a></li>
                        <li><a href="{{ url('events/mail/')}}">メールテスト</a></li> 
                        <li><a href="{{ url('events/new/')}}">イベント作成</a></li>
                        <li><a href="{{ url('events/')}}">イベント管理</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} さん<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ url('events/profile/'.Auth::user()->id)}}">
                                    プロフィール編集
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>



    <!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript"> 

function check(){

	if(window.confirm('完全に削除してよろしいですか？参加者にも削除の連絡がされます')){ // 確認ダイアログを表示

		return true; // 「OK」時は送信を実行

	}
	else{ // 「キャンセル」時の処理

		window.alert('キャンセルされました'); // 警告ダイアログを表示
		return false; // 送信を中止

	}

}

</script>
</body>
</html>
