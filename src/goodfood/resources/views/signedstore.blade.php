@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{ __('登録した店') }}
                        </div>
                        <div class=" col-md-6 text-right text-muted">
                            {{ __($times[0]->times) }}件
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($times[0]->times==0)
                    <div class="alert alert-dark" role="alert">
                        {{ "未登録です。" }}
                    </div>
                    @else
                    <div class="row mt-4">
                        @foreach($store as $data)
                        <div class="col-md-3 col-form-label ml-4">
                            <a href="/storeinfo/{{ $data->sid }}">
                                <button class="btn btn-block btn-outline-info">
                                    <p>
                                        {{ __($data->storename) }}
                                    </p>
                                    <p>
                                        {{ __($data->created_at) }}
                                    </p>
                                </button>
                            </a>
                                    <div>
                                        <button class="fa fa-edit btn btn-block btn-primary">
                                            編集
                                        </button>
                                    </div>
                                    <div>
                                        <button class="fa fa-trash btn btn-block btn-outline-secondary">
                                            削除
                                        </button>
                                    </div>
                            
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                  <div class="card-footer ">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
