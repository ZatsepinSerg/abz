@extends('layout_parts.layout')
@section('content')
    @if($bossInfo)

        <div class="col-lg-12 " style="margin: 5px 0 5px 0;
    border: 1px solid;" >
            <span class="col-lg-2"><strong>{{$bossInfo->position}}</strong></span>
            <span class="col-lg-2"><strong>{{$bossInfo->name}}</strong></span>
            <span class="col-lg-2"><strong>{{$bossInfo->surname}}</strong></span>
            <span class="col-lg-2"><strong>{{$bossInfo->patronymic}}</strong></span>
            <span class="col-lg-2"><strong>{{$bossInfo->salary}}$</strong></span>
            <span class="col-lg-2"><strong>{{$bossInfo->date_receipt}}</strong></span>
        </div>
        @foreach($workers AS $worker)
            <div  id="phazer{{$worker->id}}" class="show_greed">
                <div class="col-lg-12 parent" id="{{$worker->id}}">
                    <span class="col-lg-2 glyphicon glyphicon-forward">   {{$worker->position}}</span>
                    <span class="col-lg-2">{{$worker->name}}</span>
                    <span class="col-lg-2">{{$worker->surname}}</span>
                    <span class="col-lg-2">{{$worker->patronymic}}</span>
                    <span class="col-lg-2">{{$worker->salary}}$</span>
                    <span class="col-lg-2">{{$worker->date_receipt}}</span>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-lg-12 " style="border: 1px solid ;">
            <span class="col-lg-2"></span>
            <span class="col-lg-2"></span>
            <span class="col-lg-2"><h1>Not result</h1></span>
            <span class="col-lg-2"></span>
            <span class="col-lg-2"></span>
            <span class="col-lg-2"></span>
        </div>
    @endif


@endsection
