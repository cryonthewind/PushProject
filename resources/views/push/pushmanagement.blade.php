@extends('layouts.master')
@section('css')
    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('css/push_management.css')}}" rel="stylesheet" media="screen">
@endsection

@section('content')
    <div class="contents">
        <div class="row push-btn-area">
            <div class="push-max-width container-fluid div-text-top">
                <div class="div-before"></div><div class="text-after">お知らせ新規登録</div>
            </div>
            <div class="push-search-max-width">
                <a href="/push/push_management_register"><button class="btn-left btn-success">お知らせを登録する</button></a>
                <a href="/push/push_management_register_immediately"><button class="btn-right btn-warning">緊急お知らせを登録する</button></a>
            </div>
        </div>
        <div class="row search-form">
            <div class="push-max-width container-fluid div-text-top">
                <div class="div-before"></div><div class="text-after">お知らせ検索</div>
            </div>
            <div class="search-input push-search-max-width">
                <div class="clearfix">
                    <form>
                        <div class="row form-search-input">
                            <div class="text-left">キーワード</div>
                            <div class="input-right-fz"><input class="inputsearch" type="text"></div>
                        </div>
                        <div class="row form-search-input">
                            <div class="text-left">配信日時</div>
                            <div class="input-daterange">
                                <div class="input-group date search-input-p">
                                    <input type="text" class="input-md inputsearch" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <div class="text-center tilde">~</div>
                                <div class="input-group date search-input-p">
                                    <input type="text" class="input-md inputsearch" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-search-input">
                            <div class="text-left">登録日時</div>
                            <div class="input-daterange">
                                <div class="input-group date search-input-p">
                                    <input type="text" class="input-md inputsearch" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <div class="text-center tilde">~</div>
                                <div class="input-group date search-input-p">
                                    <input type="text" class="input-md inputsearch" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-search-input">
                            <div class="col-md-2 text-left">ステータス</div>
                            <div class="col-md-1 checkbox-left">
                                <input type="checkbox" id="search-check1" class="zebra" name="" value="">
                                <label class="zebra" for="search-check1"></label>
                                <label for="search-check1">承認待ち</label>
                            </div>
                            <div class="col-md-1 checkbox-left">
                                <input type="checkbox" id="search-check2"class="zebra" name="" value="">
                                <label class="zebra" for="search-check2"></label>
                                <label for="search-check2">承認済</label>
                            </div>
                            <div class="col-md-1 checkbox-left">
                                <input type="checkbox" id="search-check3" class="zebra" name="" value="">
                                <label class="zebra" for="search-check3"></label>
                                <label for="search-check3">配信中</label>
                            </div>
                            <div class="col-md-1 checkbox-left">
                                <input type="checkbox" id="search-check4" class="zebra" name="" value="">
                                <label class="zebra" for="search-check4"></label>
                                <label for="search-check4">配信中止</label>
                            </div>
                            <div class="col-md-1 checkbox-left">
                                <input type="checkbox" id="search-check5" class="zebra" name="" value="">
                                <label class="zebra" for="search-check5"></label>
                                <label for="search-check5">配信済</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <a href="PushManagement_Result.html"><button id="" class="submit-search-btn btn-success col-md-3">絞り込み</button></a>
                </div>
            </div>
        </div>
        <div class="row result-table">
            <div class="container">
                <div class="row header-fixed">
                    <table class="table-head">
                        <thead>
                        <tr>
                            <th class="col-1 table-th"><div class="parent-ab"><div class="table-th-div">ID</div><img class="sort-img" src="/img/sorted.png"></div></th>
                            <th class="col-2 table-th"><div class="parent-ab"><div class="table-th-div">タイトル</div><img class="sort-img" src="/img/updown.png"></div></th>
                            <th class="col-3 table-th"><div class="parent-ab"><div class="table-th-div">ユーザー名</div><img class="sort-img" src="/img/updown.png"></div></th>
                            <th class="col-4 table-th"><div class="parent-ab"><div class="table-th-div">配信日時</div><img class="sort-img" src="/img/updown.png"></div></th>
                            <th class="col-5 table-th"><div class="parent-ab"><div class="table-th-div">登録日時</div><img class="sort-img" src="/img/updown.png"></div></th>
                            <th class="col-6 blank-th" colspan="2">&nbsp;</th>
                        </tr>
                        <tr>
                            <th class="col-1 table-th"><div class="parent-ab"><div class="table-th-div">ステータス</div><img class="sort-img" src="/img/updown.png"></div></th>
                            <th class="col-2 table-th"><div class="parent-ab"><div class="table-th-div">本文</div><img class="sort-img" src="/img/updown.png"></div></th>
                            <th class="col-3 table-th"><div class="parent-ab"><div class="table-th-div">配信予定数</div><img class="sort-img" src="/img/updown.png"></div></th>
                            <th class="col-4 table-th"><div class="parent-ab"><div class="table-th-div">表示期間</div><img class="sort-img" src="/img/updown.png"></div></th>
                            <th class="col-5 table-th"><div class="parent-ab"><div class="table-th-div">更新日時</div><img class="sort-img" src="/img/updown.png"></div></th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="row tbody-scroll">
                    <table class="table-scroll-body">
                        <tbody>
                        <tr class="red-alert">
                            <td class="col-1">
                                <div class="text-above-img">
                                    123456789
                                </div>
                                <img class="push-status" src="/img/red.png" />
                                <div class="text-below-img">
                                    承認待ち
                                </div>
                            </td>
                            <td class="col-2">
                                <div class="result-title">PUSHメッセージタイトル</div>
                                <div class="result-content">メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文</div>
                            </td>
                            <td class="col-3">
                                <div class="td-height">
                                    <div class="row-above">山田健太郎</div>
                                    <div class="row-below one-row">2,134,230</div>
                                </div>
                            </td>
                            <td class="col-4">
                                <div class="td-height">
                                    <div class="row-above">2016/08/18 &nbsp; 20:00</div>
                                    <div class="row-below">
                                        <span class="table-begin-date">2016/08/18 &nbsp; 20:00 ~</span>
                                        <span class="table-end-date">2016/08/25 &nbsp; 20:00</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-5">
                                <div class="td-height">
                                    <div class="row-above">2016/08/13 &nbsp; 18:15</div>
                                    <div class="row-below one-row">2016/08/15 &nbsp; 20:00</div>
                                </div>
                            </td>
                            <td class="col-6">
                                <a href="/PushManagement_Update.html"><button class="btn-success btn-table-push">詳細</button></a>
                            </td>
                        </tr>
                        <tr class="checked">
                            <td class="col-1">
                                <div class="text-above-img">
                                    1234567890
                                </div>
                                <img class="push-status" src="/img/checked.png" />
                                <div class="text-below-img">
                                    承認済
                                </div>
                            </td>
                            <td class="col-2">
                                <div class="result-title">PUSHメッセージタイトル</div>
                                <div class="result-content">メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文</div>
                            </td>
                            <td class="col-3">
                                <div class="td-height">
                                    <div class="row-above">山田健太郎</div>
                                    <div class="row-below one-row">2,134,230</div>
                                </div>
                            </td>
                            <td class="col-4">
                                <div class="td-height">
                                    <div class="row-above">2016/08/18 &nbsp; 20:00</div>
                                    <div class="row-below">
                                        <span class="table-begin-date">2016/08/18 &nbsp; 20:00 ~</span>
                                        <span class="table-end-date">2016/08/25 &nbsp; 20:00</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-5">
                                <div class="td-height">
                                    <div class="row-above">2016/08/13 &nbsp; 18:15</div>
                                    <div class="row-below one-row">2016/08/15 &nbsp; 20:00</div>
                                </div>
                            </td>
                            <td class="col-6">
                                <a href="/PushManagement_Update.html"><button class="btn-success btn-table-push">詳細</button></a>
                            </td>
                        </tr>
                        <tr class="check">
                            <td class="col-1">
                                <div class="text-above-img">
                                    123456789
                                </div>
                                <img class="push-status" src="/img/check.png" />
                                <div class="text-below-img">
                                    配信中
                                </div>
                            </td>
                            <td class="col-2">
                                <div class="result-title">PUSHメッセージタイトル</div>
                                <div class="result-content">メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文</div>
                            </td>
                            <td class="col-3">
                                <div class="td-height">
                                    <div class="row-above">山田健太郎</div>
                                    <div class="row-below one-row">2,134,230</div>
                                </div>
                            </td>
                            <td class="col-4">
                                <div class="td-height">
                                    <div class="row-above">2016/08/18 &nbsp; 20:00</div>
                                    <div class="row-below">
                                        <span class="table-begin-date">2016/08/18 &nbsp; 20:00 ~</span>
                                        <span class="table-end-date">2016/08/25 &nbsp; 20:00</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-5">
                                <div class="td-height">
                                    <div class="row-above">2016/08/13 &nbsp; 18:15</div>
                                    <div class="row-below one-row">2016/08/15 &nbsp; 20:00</div>
                                </div>
                            </td>
                            <td class="col-6">
                                <a href="/PushManagement_Update.html"><button class="btn-success btn-table-push">詳細</button></a>
                            </td>
                        </tr>
                        <tr class="cross">
                            <td class="col-1">
                                <div class="text-above-img">
                                    123456789
                                </div>
                                <img class="push-status" src="/img/cross.png" />
                                <div class="text-below-img">
                                    配信中止
                                </div>
                            </td>
                            <td class="col-2">
                                <div class="result-title">PUSHメッセージタイトル</div>
                                <div class="result-content">メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文</div>
                            </td>
                            <td class="col-3">
                                <div class="td-height">
                                    <div class="row-above">山田健太郎</div>
                                    <div class="row-below one-row">2,134,230</div>
                                </div>
                            </td>
                            <td class="col-4">
                                <div class="td-height">
                                    <div class="row-above">2016/08/18 &nbsp; 20:00</div>
                                    <div class="row-below">
                                        <span class="table-begin-date">2016/08/18 &nbsp; 20:00 ~</span>
                                        <span class="table-end-date">2016/08/25 &nbsp; 20:00</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-5">
                                <div class="td-height">
                                    <div class="row-above">2016/08/13 &nbsp; 18:15</div>
                                    <div class="row-below one-row">2016/08/15 &nbsp; 20:00</div>
                                </div>
                            </td>
                            <td class="col-6">
                                <a href="/PushManagement_Update.html"><button class="btn-success btn-table-push">詳細</button></a>
                            </td>
                        </tr>
                        <tr class="decline">
                            <td class="col-1">
                                <div class="text-above-img">
                                    123456789
                                </div>
                                <img class="push-status" src="/img/decline.png" />
                                <div class="text-below-img">
                                    配信済
                                </div>
                            </td>
                            <td class="col-2">
                                <div class="result-title">PUSHメッセージタイトル</div>
                                <div class="result-content">メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文</div>
                            </td>
                            <td class="col-3">
                                <div class="td-height">
                                    <div class="row-above">山田健太郎</div>
                                    <div class="row-below one-row">2,134,230</div>
                                </div>
                            </td>
                            <td class="col-4">
                                <div class="td-height">
                                    <div class="row-above">2016/08/18 &nbsp; 20:00</div>
                                    <div class="row-below">
                                        <span class="table-begin-date">2016/08/18 &nbsp; 20:00 ~</span>
                                        <span class="table-end-date">2016/08/25 &nbsp; 20:00</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-5">
                                <div class="td-height">
                                    <div class="row-above">2016/08/13 &nbsp; 18:15</div>
                                    <div class="row-below one-row">2016/08/15 &nbsp; 20:00</div>
                                </div>
                            </td>
                            <td class="col-6">
                                <a href="/PushManagement_Update.html"><button class="btn-success btn-table-push">詳細</button></a>
                            </td>
                        </tr>
                        <tr class="red-alert">
                            <td class="col-1">
                                <div class="text-above-img">
                                    123456789
                                </div>
                                <img class="push-status" src="/img/red.png" />
                                <div class="text-below-img">
                                    承認待ち
                                </div>
                            </td>
                            <td class="col-2">
                                <div class="result-title">PUSHメッセージタイトル</div>
                                <div class="result-content">メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文メッセージ本文</div>
                            </td>
                            <td class="col-3">
                                <div class="td-height">
                                    <div class="row-above">山田健太郎</div>
                                    <div class="row-below one-row">2,134,230</div>
                                </div>
                            </td>
                            <td class="col-4">
                                <div class="td-height">
                                    <div class="row-above">2016/08/18 &nbsp; 20:00</div>
                                    <div class="row-below">
                                        <span class="table-begin-date">2016/08/18 &nbsp; 20:00 ~</span>
                                        <span class="table-end-date">2016/08/25 &nbsp; 20:00</span>
                                    </div>
                                </div>
                            </td>
                            <td class="col-5">
                                <div class="td-height">
                                    <div class="row-above">2016/08/13 &nbsp; 18:15</div>
                                    <div class="row-below one-row">2016/08/15 &nbsp; 20:00</div>
                                </div>
                            </td>
                            <td class="col-6">
                                <a href="/PushManagementUpdate"><button class="btn-success btn-table-push">詳細</button></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--pagination-->

        <div class="row bottom-pagination">
            <div class="pagination-center">
                <ul class="pagination">
                    <li><a href="?page=1">前</a></li>
                    <li class="active"><a href="?page=1">1</a></li>
                    <li><a href="?page=2">2</a></li>
                    <li><a href="?page=3">3</a></li>
                    <li><a href="?page=4">4</a></li>
                    <li><a href="?page=5">5</a></li>
                    <li><a href="?page=2">次</a></li>
                </ul>
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
    </script>
@endsection