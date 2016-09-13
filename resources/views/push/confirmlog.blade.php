@extends('layouts.master')
@section('css')
    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('css/ConfirmLog.css')}}" rel="stylesheet" media="screen">
@endsection
@section('nav-bar')
    <div class="nav-full-width row">
        <div class="push-max-width">
            <nav class="navbar navbar-inverse user-menu-navbar">
                <div class="container-fluid">
                    <ul class="nav navbar-nav col-md-12">
                        <li class="nav-custom"><a href="/push/pushmanagement">お知らせ管理</a></li>
                        <li class="nav-custom"><a href="/push/confirmpast">集計確認</a></li>
                        <li class="active nav-custom"><a href="/push/confirmlog">操作ログ確認</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
@endsection
@section('content')
    <div class="contents">
        <div class="row search-form">
            <div class="push-max-width container-fluid div-text-top">
                <div class="div-before"></div><div class="text-after">ログ確認期間</div>
            </div>
            <div class="search-input push-search-max-width">
                <div class="clearfix">
                    <form action="/confirmlog" id="confirm-valid">
                        <div class="row form-search-input">
                            <div class="input-daterange">
                                <div class="input-group date search-input-p">
                                    <input type="text" class="input-md inputsearch" require/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <div class="text-center tilde">~</div>
                                <div class="input-group date search-input-p">
                                    <input type="text" class="input-md inputsearch" require/>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <button id="" type="submit" class="btn-success cp-btn-search">表示</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="push-max-width">
            <div class="btn-center">
                <button id="new-reg" class="btn-success btn-block">ダウンロード</button>
            </div>
        </div>
        <div class="row result-table">
            <div class="container">
                <div class="row header-fixed">
                    <table class="table-head">
                        <thead>
                        <tr>
                            <th class="col-1 table-th"><div class="table-th-div">操作日時</div></th>
                            <th class="col-2 table-th"><div class="table-th-div">ユーザーID</div></th>
                            <th class="col-3 table-th"><div class="table-th-div">操作種別</div></th>
                            <th class="col-4 table-th"><div class="table-th-div">操作内容</div></th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="row tbody-scroll">
                    <table class="table-scroll-body">
                        <tbody>
                        {{--@foreach($data as $item)--}}
                            <tr>
                                <td class="col-1">{{--{{ date('Y/m/d H:i:s',strtotime($item->INSERT_DATE)) }}--}}</td>
                                <td class="col-2">user_id1</td>
                                <td class="col-3">ユーザー管理: 登録</td>
                                <td class="col-4">
                                    <div>
                                        INSERT INTO M_USER VALUES('test@email.com', '$2y$10$f1Ua4FvRjYydJoAQ4E314.7n/Vt75ETvWUzjZpsWIfPPHrkUTZTgW', '0', 'くらコーポレーション','青山健太郎', '', '', '0', 'admin@email.com', '2016/08/16 12:20:23', 'admin@email.com', '2016/08/16 12:20:23')
                                    </div>
                                </td>
                            </tr>
                            {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--pagination-->
        <div class="row bottom-pagination">
            <div class="pagination-center">
                {{--{{$data->links()}}--}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="application/javascript" src="{{asset('js/moment-with-locales.js')}}" charset="UTF-8"></script>
    <script type="application/javascript" src="{{asset('js/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
    <script type="text/javascript">
        $("div.input-group.date.search-input-p").datetimepicker({
            locale: 'ja',
            format: 'YYYY/MM/DD HH:mm'
        });
        /* catch scrollable */
        $( document ).ready(function(){
            if($('.tbody-scroll').height() < $('table.table-scroll-body').prop('scrollHeight')){
                var w = $('table.table-scroll-body').width();
                $('table.table-head').width(w);
            }
        });

        $("#confirm-valid").validate();
    </script>
@endsection