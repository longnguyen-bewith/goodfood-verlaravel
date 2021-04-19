@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{ __('評価履歴') }}
                        </div>
                        <div class=" col-md-6 text-right text-muted">
                            {{ __($times[0]->times) }}件
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($times[0]->times==0)
                    <div class="alert alert-dark" role="alert">
                        {{ "評価したことはないです。" }}
                    </div>
                    @else
                    <div class="row">
                        @foreach($store as $data)
                        <div class="col-md-12 col-form-label bg-light mt-4">
                            <a href="/storeinfo/{{ $data->sid }}">
                                <div class="text-right"><i class="fa fa-share"></i>{{ __($data->storename) }}
                                </div>
                                <div class="text-right text-muted">{{ __($data->created_at) }}にリビュー済み
                                </div>
                                <div class="text-right">
                                    @for($i = 1; $i <= round($data->votes); $i ++)
                                    <span class="fa fa-star checked">
                                    </span>
                                    @endfor
                                    @for($i = 5; $i > round($data->votes); $i --)
                                    <span class="fa fa-star ">
                                    </span>
                                    @endfor
                                </div>
                                <button class="btn btn-block btn-outline-info">
                                <p class="text-left">{{ __($data->cmt) }}
                                </p>
                                </button>
                            </a>
                            <div class="text-right">
                                <form method="POST" action="{{ route('delcmt') }}">
                                @csrf
                                <input type="hidden" name="cid" value="{{ $data->cid }}">
                                <button type="submit"  class="fa fa-trash btn  btn-outline-secondary" onclick="return confirm('削除しますか。')">
                                削除
                                </button>
                            </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="card-footer ">
                </div>
            </div>
            <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        @if(1>0)
                        <li class="page-item"><button type="submit" class="page-link" name="page" value="{{ 1-1  }}">prev</button></li>
                        @endif
                        @if(1)
                        <li class="page-item"><div class="input-group-prepend"><button class="page-link dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{1 }} of {{ 1 }}</button>
                            <div class="dropdown-menu">
                                @for($i=0;$i<2;$i++)
                                <button class="page-item dropdown-item" value="{{ $i }}" name="page">{{ $i+1 }}</button>
                                @endfor
                            </div>
                        </div>
                        @endif
                        
                    </li>
                    @if(1)
                    <li class="page-item"><button type="submit" class="page-link" name="page" value="{{ 1 }}">next</button></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection