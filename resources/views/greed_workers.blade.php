@extends('layout_parts.layout')


@section('content')
    <table class="tree">

        @foreach($workers AS $worker)
            @if($worker->parent_id == 0)
                <tr class="treegrid-{{$worker->id}}">
                    <td>Big Boss Mafia</td>
                    <td>{{$worker->name}}</td>
                    <td>{{$worker->surname}}</td>
                    <td>{{$worker->salary}}$</td>
                    <td>{{$worker->date_receipt}}</td>
                </tr>
            @endif
            @foreach($workers AS $bossId)
                @if($bossId->parent_id == $worker->id)
                    <tr class="treegrid-{{$bossId->id}} treegrid-parent-{{$worker->id}}">
                        <td>{{$bossId->position}}</td>
                        <td>{{$bossId->name}} </td>
                        <td>{{$bossId->surname}}</td>
                        <td>{{$bossId->salary}}$</td>
                        <td>{{$bossId->date_receipt}}</td>
                    </tr>
                @endif
            @endforeach
        @endforeach
        
    </table>
@endsection
