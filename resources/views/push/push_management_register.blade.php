@extends('layouts.master')
@section('css')
    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('css/push_management.css')}}" rel="stylesheet" media="screen">
@endsection

@section('content')
    <div class="contents">
        <div class="row search-form">
            <div class="push-max-width container-fluid div-text-top">
                <div class="div-before"></div><div class="text-after">お知らせ新規登録画面</div>
            </div>
            <div class="search-input push-search-max-width">
                <div class="clearfix">
                    <form>
                        <div class="row form-search-input">
                            <div class="text-left large-title">タイトル<span>※必須</span></div>
                            <div class="input-right-fz large-title"><input class="inputsearch" type="text"></div>
                        </div>
                        <div class="row form-search-input">
                            <div class="text-left large-title">本文<span>※必須</span></div>
                            <div class="input-right-fz large-title"><textarea class="inputsearch" type="text"></textarea></div>
                        </div>
                        <div class="row form-search-input">
                            <div class="text-left large-title">表示期間</div>
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
                            <div class="text-left large-title">配信日時<span>※必須</span></div>
                            <div class="input-daterange">
                                <div class="input-group date search-input-p">
                                    <input type="text" class="input-md inputsearch" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="parent-btn">
                        <a href="javascript:history.back()"><button id="" class="btn-success col-md-5">戻る</button></a>
                        <a href="PushManagement_Confirm.html"><button class=" btn-warning col-md-offset-2 col-md-5">確認する</button></a>
                    </div>
                </div>
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
    </script>
@endsection