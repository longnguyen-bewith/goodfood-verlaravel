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
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
                        <a href="home/"><button type="button"class="btn btn-sm btn-outline-secondary">取消</button></a>
                    </nav>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                            <select class="form-select mb-3 btn-block btn-outline-secondary btn" name="sec">
                                <option value=1  @if($request->sec==1 ) selected @endif >名前順</option>
                                <option value=2 @if($request->sec==2 ) selected @endif >評価順</option>
                                <option value=3 @if($request->sec==3 ) selected @endif >気に入った順</option>
                            </select>
                        </div>
                            @php
                            $role=["和食","洋食","中華料理","焼肉","麺料理 ","カフェ","その他 "];
                            @endphp
                            <div class="col-md-4">
                                @foreach(  $role as $check)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name={{ $check }} value=1
                                    @if($request->$check)checked="" @endif>
                                    {{ $check }}
                                    </input>
                                </label>
                                @endforeach
                            </div>
                            <div class="col-md-8 text-right">
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
                {{ $numberofid }}件
                </div>
                <div class="card-footer ">
                </div>
                @for($i=0;$i<$numberofid;$i++)
                <div class="card mt-4">
                <div class="card-header">
                    <a href="/storeinfo/{{ $store[$i][0]->sid }}">{{ __( $store[$i][0]->storename ) }}</a>
                </div>
                <div class="card-body">
                   <div>{{ $store[$i][0]->name }} </div>
                   <div>{{ $like[$i][0]->sum }}like </div>
                   <div>{{ $vote[$i][0]->vote }}point in {{ $vote[$i][0]->sum }}vote  </div>
                   <div>
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
    @endsection