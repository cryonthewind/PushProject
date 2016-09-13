<html lang="ja">
<head>
    <meta charset="utf-8"/>
    <title>PUSH管理システム - メニュー</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    @yield('css')
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="/img/fav.png"/>

</head>

<body>
<div class="header">
    <div class="row">
        <div class="push-max-width">
            <div class="col-md-7 top-left-title">
                <img class="img-logo" src="/img/logo.png">
                <div class="title-bigsize">PUSH通知サービス</div>
            </div>
            <div class="col-md-5 top-right-text">
                <a class="" href="{{route('getLogout')}}">
                    <div class="logout-button btn-success free-form">ログアウト</div>
                </a>
                <div class="top-right-text-child">
                    <div class="row">
                        <span class="col-md-12"><?php if(Auth::check()) echo Auth::user()->group_id; else echo $user_info;?></span>
                    </div>
                    <div class="row header-date"><?php if(Auth::check()) echo date_format(\Illuminate\Support\Facades\Auth::user()->updated_at,'Y年m月d日 (火) H:i:s 現在'); else echo'2016年08月09日 (火) 15:02:36 現在' ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-full-width row">
        <div class="push-max-width">
            <nav class="navbar navbar-inverse user-menu-navbar">
                <div class="container-fluid">
                    <ul class="nav navbar-nav col-md-12">
                        <li class="active nav-custom"><a href="/push/pushmanagement">お知らせ管理</a></li>
                        <li class="nav-custom"><a href="/push/confirmpast">集計確認</a></li>
                        <li class="nav-custom"><a href="/push/confirmlog">操作ログ確認</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
    @yield('content')
<script type="application/javascript" src="{{asset('js/jquery.min.js')}}" charset="UTF-8"></script>
<script type="application/javascript" src="{{asset('js/bootstrap.min.js')}}" charset="UTF-8"></script>
@yield('script')


</body>
</html>