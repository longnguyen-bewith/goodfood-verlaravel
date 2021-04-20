@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            {{ __('気に入った店') }}
                        </div>
                        <div class=" col-md-6 text-right text-muted">
                            {{ __($times[0]->times) }}件
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($times[0]->times==0)
                    <div class="alert alert-dark" role="alert">
                        {{ "気に入った店はないです。" }}
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
                                </button>
                            </a>
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
                        @if($page>0)
                        <li class="page-item"><a class="page-link" href="?page={{ $page-1  }}">prev</a></li>
                        @endif
                        @if($times[0]->times)
                        <li class="page-item"><div class="input-group-prepend"><button class="page-link dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $page+1 }} of {{ CEIL($times[0]->times/5) }}</button>
                            <div class="dropdown-menu">
                                @for($i=0;$i<CEIL($times[0]->times/5);$i++)
                                <a class="page-link" href="?page={{ $i }}">{{ $i+1 }}</a>
                                @endfor
                            </div>
                        </div>
                        @endif
                        
                    </li>
                    @if($times[0]->times/5>$page+1)
                    <li class="page-item"><a class="page-link" href="?page={{ $page+1  }}">next</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
