@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('店舗登録') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('confirmeditstore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="sid" value="{{ $store[0]->sid }}">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="storename">
                                {{ __('店舗名') }}
                            </label>
                            <div class="col-md-6 col-md-4 col-form-label text-md-left">{{ $store[0]->storename }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="address">
                                {{ __('住所') }}
                            </label>
                            <div class="col-md-6">
                                <input autocomplete="address" autofocus="" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required="" type="text" value="{{ $store[0]->address }}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                    {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                                </input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="opentime">
                                {{ __('営業時間') }}
                            </label>
                            <div class="col-md-6">
                                <select class="form-control" name="opentime" id="opentime">
                                    @for($i=0;$i<24;$i++)
                                    <option value="{{ $i  }}:00 "
                                        @if($i.':00'===$store[0]->opentime)
                                        selected
                                        @endif
                                        >
                                        {{ $i }}:00
                                    </option>
                                    ;
                                    <option value="{{ $i  }}:30 "
                                        @if($i.':30'===$store[0]->opentime)
                                        selected
                                        @endif
                                        >
                                        {{ $i }}:30
                                    </option>
                                    ;
                                    @endfor
                                </select>
                            </div>
                            @error('opentime')
                            <strong>
                            {{ $message }}
                            </strong>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="closetime">
                                {{ __('閉店時間') }}
                            </label>
                            <div class="col-md-6">
                                <select class="form-control" name="closetime"id="closetime">
                                    @for($i=0;$i<24;$i++)
                                    <option value="{{ $i }}:00 "
                                        @if($i.':00'===$store[0]->closetime)
                                        selected
                                        @endif
                                        >
                                        {{ $i }}:00
                                    </option>
                                    ;
                                    <option value="{{ $i }}:30"
                                        @if($i.':30'===$store[0]->closetime)
                                        selected
                                        @endif
                                        >
                                        {{ $i }}:30
                                    </option>
                                    ;
                                    @endfor
                                </select>
                            </div>
                            @error('closetime')
                            <strong>
                            {{ $message }}
                            </strong>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 col-form-label text-md-right">
                                種別
                            </div>
                            @php
                            $role=["和食","洋食","中華料理","焼肉","麺料理 ","カフェ","その他 "];
                            @endphp
                            <div class="checkbox col-md-6 mt-2">
                                @for($i=0;$i<count($role);$i++)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name={{ $role[$i] }} value={{ $role[$i] }}
                                    @foreach($data as $check)
                                    @if($check->role===$role[$i])
                                    checked
                                    @endif
                                    @endforeach
                                    >
                                    {{ $role[$i] }}
                                    </input>
                                </label>
                                @endfor
                                @error('和食')
                                <div class="text-danger">
                                    <strong>
                                    {{ "種別うち一つは必須です。" }}
                                    </strong>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-primary" type="submit">
                                {{ __('店舗登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer ">
            </div>
        </div>
    </div>
</div>
@endsection