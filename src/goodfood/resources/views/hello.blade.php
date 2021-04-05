@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">GooDFooD概要 </div>
                <div class="card-body">

                       <p>飲食店情報探すグレメサイトです。
                       下記の機能を提供します。</p>
                       <ul> 
                       <li>店舗登録、口コミ、気に入る機能</li> 
                       <li>店舗情報参照、口コミ参照、登録した店舗気に入った店、口コミ確認機能</li> 
                       <li>アカウントのパスワードとメールアドレス変更、登録した店舗情報変更機能</li> 
                       <li>登録した店舗、口コミ取消、お気に入り解除機能</li>
                       <li>店舗検索機能:条件合わらせ店検索機能(AND,OR 条件、名前、評価高い、気に入った順、言葉検索)</li>

                   </ul>
                   ご検討、よろしくお願いいたします。
                </div>
            </div>
        </div>
    </div>
</div>
@endsection