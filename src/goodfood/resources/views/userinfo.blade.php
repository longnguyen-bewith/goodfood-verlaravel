@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('会員情報') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-form-label text-md-right">{{ __('ユーザ名')}}
                        </div>
                        <div class="col-md-4 col-form-label text-md-left">{{ __(Auth::user()->username) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-form-label text-md-right">{{ __('名前')}}
                        </div>
                        <div class="col-md-4 col-form-label text-md-left">{{ __(Auth::user()->name) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス')}}
                        </div>
                        <div class="col-md-4 col-form-label text-md-left">{{ __(Auth::user()->email) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-form-label text-md-right">{{ __('アカウント種別')}}
                        </div>
                        <div class="col-md-4 col-form-label text-md-left">{{ __(Auth::user()->type) }}
                        </div>    
                    </div>
                     @if(session('status'))
                            <div class="alert alert-success text-center" role="alert">
                                <strong> {{ session('status') }} 
                                    </strong>
                            </div>
                        @endif     
                   
                    <div class="row">
                        <div class="col-md-6 offset-md-3 mt-4">
                            <a href="{{ route('edituserinfo') }}" ><button class="btn btn-primary">
                                {{ __('メールアドレス、パスワード変更') }}
                                </button>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection