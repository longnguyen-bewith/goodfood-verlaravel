@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <nav class="navbar navbar-light bg-light justify-content-between">
                    <a class="navbar-brand">お店を探す</a>
                    <form class="form-inline" method="GET" action="/home">
                        <input class="form-control mr-sm-2" type="search" name="key" placeholder="検索" aria-label="Search"
                        value="{{ $request->key }}">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i>検索</button>
                        <a href="home/"><button type="button"class="btn btn-sm btn-outline-secondary"><i class="fa fa-refresh"></i>取消</button></a>
                    </nav>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    条件追加
                    </button>
                    <div  class="collapse" id="collapseExample">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <select class="selectpicker" name="sec">
                                        <option value=1  @if($request->sec==1 ) selected @endif >名前順</option>
                                        <option value=2 @if($request->sec==2 ) selected @endif >評価順</option>
                                        <option value=3 @if($request->sec==3 ) selected @endif >気に入った順</option>
                                    </select>
                                </div>
                                @php
                                $role=["和食","洋食","中華料理","焼肉","麺料理 ","カフェ","その他 "];
                                @endphp
                                <div class="col-md-6">
                                    @foreach(  $role as $check)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name={{ $check }} value=1
                                        @if($request->$check)checked="" @endif>
                                        {{ $check }}
                                        </input>
                                    </label>
                                    @endforeach
                                </div>
                                <div class="col-md-6 text-left">
                                    <div class="radio">
                                        <label><input type="radio" name="isor" value=0
                                        @if($request->isor == 0)checked="" @endif >全て一致</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="isor" value=1
                                        @if($request->isor == 1 ) checked @endif>一部一致</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer ">
                    合計：{{ $numberofid }}件
                </div>
            </div>
            @for($i=0;$i<$numberofid;$i++)
            <div class="card mt-4">
                <div class="card-header">
                    <a href="/storeinfo/{{ $store[$i][0]->sid }}"><i class="fa fa-share"></i>-{{ __( $store[$i][0]->storename ) }}</a>
                </div>
                <div class="card-body">
                    <div><i class="fa fa-user-circle-o"></i>{{ $store[$i][0]->name }} </div>
                    <div><span class="text-success">{{ $like[$i][0]->sum }}<i class="fa fa-thumbs-up"> </i></span>
                    <span class="text-dark">{{ $vote[$i][0]->sum }}<i class="fa fa-comment"></i> </span>
                    <span class="text-danger">{{ $vote[$i][0]->vote }}<i class="fa fa-star"></i> </span>
                </div>
                <div><i class="fa fa-map-marker"></i>-{{ $store[$i][0]->address }}  </div>
                <div><i class="fa fa-cutlery"></i>-
                    @foreach($type[$i] as $a)
                    {{ $a->s }}-
                    @endforeach
                </div>
            </div>
            <div class="card-footer ">
            </div>
        </div>
        @endfor
    </div>
</div>

</div>
</div>
@endsection