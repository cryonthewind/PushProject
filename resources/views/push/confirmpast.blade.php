@extends('layouts.master')
@section('css')
    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('css/ConfirmPast.css')}}" rel="stylesheet" media="screen">
@endsection
@section('nav-bar')
    <div class="nav-full-width row">
        <div class="push-max-width">
            <nav class="navbar navbar-inverse user-menu-navbar">
                <div class="container-fluid">
                    <ul class="nav navbar-nav col-md-12">
                        <li class="nav-custom"><a href="/push/pushmanagement">お知らせ管理</a></li>
                        <li class="active nav-custom"><a href="/push/confirmpast">集計確認</a></li>
                        <li class="nav-custom"><a href="/push/confirmlog">操作ログ確認</a></li>
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
                <div class="div-before"></div>
                <div class="text-after">集計期間</div>
            </div>
            <div class="search-input push-search-max-width">
                <div class="clearfix">
                    <form action="{!! route('confirmpast') !!}" method="get">
                        <div class="row form-search-input">
                            @if (count($errors) > 0) <?php $data = 'not found' ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="input-daterange">
                                <div class="input-group date search-input-p">
                                    @if(empty($start))
                                    <input type="text" class="input-md inputsearch" name="daystart"/>
                                        @else
                                        <input type="text" class="input-md inputsearch" name="daystart" value="{!! $start !!}"/>

                                    @endif
                                    <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <div class="text-center tilde">~</div>
                                <div class="input-group date search-input-p">
                                    @if(empty($end))
                                        <input type="text" class="input-md inputsearch" name="dayend"/>
                                    @else
                                        <input type="text" class="input-md inputsearch" name="dayend" value="{!! $end !!}"/>

                                    @endif
                                    <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <button id="" class="btn-success cp-btn-search" name="statistic" value="1">表示</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if(!empty($data))
            @if($data == 'not found') {!! $data !!}
            @else
                <div class="push-max-width">
                    <div class="about-result-push">
                        <div class="row h3 text-center">
                            2016/05/02 ～ 2016/08/03　の集計
                        </div>
                        <div class="row h2 text-center">
                            配信合計 : 00件 &nbsp; 0,000,000 通
                        </div>
                    </div>
                </div>
                <div class="row result-table">
                    <div class="container">
                        <div class="row header-fixed">
                            <table class="table-head">
                                <thead>
                                <tr>
                                    <th class="col-1 table-th">
                                        <div class="table-th-div">ID</div>
                                    </th>
                                    <th class="col-2 table-th">
                                        <div class="table-th-div">タイトル/本文</div>
                                    </th>
                                    <th class="col-3 table-th">
                                        <div class="table-th-div">ユーザー名</div>
                                    </th>
                                    <th class="col-4 table-th">
                                        <div class="table-th-div">配信日時</div>
                                    </th>
                                    <th class="col-5 table-th">
                                        <div class="table-th-div">登録日時</div>
                                    </th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="row tbody-scroll">
                            <table class="table-scroll-body">
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td class="col-1">
                                            <div class="zebra">
                                                <input class='mess-check zebra' id='check1' type="checkbox">
                                                <label class='zebra' for="check1"></label>
                                                <span>&nbsp;</span>
                                                <span>{!! $item->PUSH_ID !!}</span>
                                            </div>
                                        </td>
                                        <td class="col-2">
                                            <div class="result-title">{!! $item->TITLE !!}</div>
                                            <div class="result-content">
                                                {!! $item->BODY !!}
                                            </div>
                                        </td>
                                        <td class="col-3">{!! $item->INSERT_USER_ID !!}</td>
                                        <td class="col-4">{!! $item->PUSH_RESERVATION_DATE !!}</td>
                                        <td class="col-5">{!! $item->PUSH_FLG !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--pagination-->

                <div class="row btn-bottom">
                    <div class="btn-center">
                        <form action="{!! route('exportconfirmpast') !!}" method="get">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" value="{!! $start !!}" name="start">
                            <input type="hidden" value="{!! $end !!}" name="end">
                        <button type="submit" id="new-reg" class="btn-success btn-block">CSV出力
                        </button>
                        </form>
                    </div>
                </div>
                <div class="row bottom-pagination">
                    <div class="pagination-center">
                        {!! $data->links() !!}
                        {{--<ul class="pagination">--}}
                            {{--<li><a href="?page=1">前</a></li>--}}
                            {{--<li class="active"><a href="?page=1">1</a></li>--}}
                            {{--<li><a href="?page=2">2</a></li>--}}
                            {{--<li><a href="?page=3">3</a></li>--}}
                            {{--<li><a href="?page=4">4</a></li>--}}
                            {{--<li><a href="?page=5">5</a></li>--}}
                            {{--<li><a href="?page=2">次</a></li>--}}
                        {{--</ul>--}}
                    </div>
                </div>
    </div>
    @endif
    @endif
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
        $(document).ready(function () {
            if ($('.tbody-scroll').height() < $('table.table-scroll-body').prop('scrollHeight')) {
                var w = $('table.table-scroll-body').width();
                $('table.table-head').width(w);
            }
        });
    </script>
@endsection