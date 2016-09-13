<!DOCTYPE html>

<!--[if IE 8]>
<html lang="ja" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="ja" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="ja">
<head>
    <meta charset="utf-8"/>
    <title>PUSH管理システム - ログイン</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <script src="{!! asset('js/jquery.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>

    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('css/styles.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! asset('css/login.css') !!}" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="img/fav.png"/>

</head>
<body>
<div class="login">
    <div class="logo">
        <img src="{!! asset('img/logo.png') !!}">
        <h2>PUSH通知サービス</h2>
    </div>
    <div class="content">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if( Session::has('message') )
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error
                {{ Session::get('status') }} : {{ Session::get('message') }}
            </div>
        @endif

        <form class="form-horizontal" role="form" method="post" action="{!! route('postLogin') !!}">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label class="control-label label-input" for="groupId">ログインID</label>
                <input type="text" class="form-control" value="{{ old('groupId') }}" autocomplete="off" maxlength="256" name="groupId"
                       id="groupId" required>
            </div>
            <div class="form-group">
                <label class="control-label label-input" for="pwd">パスワード</label>
                <input type="password" class="form-control" autocomplete="off" value="{{ old('password') }}" maxlength="256" name="password" id="pwd"
                       required>
            </div>
            <div class="form-group">
                <input class="zebra" type="checkbox" value="1" autocomplete="off" id="check-box" name="remember">
                <label class="zebra" for="check-box"></label>
                <label class="control-label label-input zb" for="check-box">ログイン情報を保持する</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success login-btn">ログイン</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>