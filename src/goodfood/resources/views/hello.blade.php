@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">GooDFooD概要 </div>
                <div class="card-body">
                    <p>初めまして、グェンタンロンと申します。</p>
                    <p>Oliveの豊作さんから紹介頂きて、課題でチャレンジする機会させること、誠にありがとうございました。<p>
                      <p>課題の件についてPHP/Laravelで自分のオリジナルWEBサービスを作成させて頂きした。要件通りに、下の機能であるグルメサイトを開発しました。<p>  
                       <ul>
                       <li>アカウント登録、ログイン、ログアウト機能</li> 
                       <li>CREATE処理：店舗登録、口コミ、気に入る、</li> 
                       <li>READ処理：店舗情報参照、口コミ参照、登録した店舗気に入った店、口コミ確認機能</li> 
                       <li>UPDATE処理:アカウントのパスワードとメールアドレス変更、登録した店舗情報変更機能</li> 
                       <li>DELETE処理:登録した店舗、口コミ取消、お気に入り解除機能</li>
                       <li>部分検索機能:条件合わらせ店検索機能(AND,OR 条件、名前、評価高い、気に入った順、言葉検索)</li>
                       <li>BootStrapで扱ってレスポンシブ対応できます</li>
                       <li>dockerを使用しての環境構築した(GitHubにあげました、手順はREADMEファイルに書いてあります。</li>
                   </ul>
                   ご検討、よろしくお願いいたします。
                </div>
            </div>
        </div>
    </div>
</div>
@endsection