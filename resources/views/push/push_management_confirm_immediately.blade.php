@extends('layouts.master')
@section('css')
    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('css/push_management.css')}}" rel="stylesheet" media="screen">
@endsection

@section('content')
    <div class="contents">
        <div class="row search-form reg-imm">
            <div class="push-max-width container-fluid div-text-top">
                <div class="div-before"></div><div class="text-after">確認画面</div>
            </div>
            <div class="search-input push-search-max-width">
                <div class="clearfix">
                    <div class="row confirm-text">
                        <div class="text-left">タイトル</div>
                        <div class="confirm-text-right">PUSH通知サービス</div>
                    </div>
                    <div class="row confirm-text">
                        <div class="text-left">本文</div>
                        <div class="confirm-text-right">
                            PUSH通知サービスPUSH通知サービスPUSH通知サービスPUSH通知サービ通知サービ通知サービ通知サービ通知サービス通知サービ通知サービ通知サービ通知サービス通知サービ通知サービ通知サービ通知サービス
                            <br>作ログ確認作ログ確認作ログ確認
                        </div>
                    </div>
                    <div class="row confirm-text">
                        <div class="text-left">表示期間</div>
                        <div class="confirm-text-right font-else">
                            2016/08/18 20:00 ~ 2016/08/25 20:00
                        </div>
                    </div>
                    <div class="row confirm-text">
                        <div class="text-left">配信日時</div>
                        <div class="confirm-text-right font-else">
                            2016/08/18 20:00
                        </div>
                    </div>
                    <div class="row confirm-text">
                        <div class="text-left">配信予定数</div>
                        <div class="confirm-text-right">
                            1,200,000
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="parent-btn">
                        <a href="javascript:history.back()"><button id="" class="btn-success col-md-5">戻る</button></a>
                        <a href="PushManagement_Search.html"><button class=" btn-warning col-md-offset-2 col-md-5">登録する</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection