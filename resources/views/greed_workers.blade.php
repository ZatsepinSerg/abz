@extends('layout_parts.layout')


@section('content')
    <table class="tree">
        <tr class="treegrid-1">
            <td>Root node</td><td>Additional info</td><td>Additional info</td><td>Additional info</td><td>Additional info</td>
        </tr>
        <tr class="treegrid-2 treegrid-parent-1">
            <td>Node 1-1</td><td>Additional info</td><td>Additional info</td><td>Additional info</td><td>Additional info</td>
        </tr>
        <tr class="treegrid-3 treegrid-parent-1">
            <td>Node 1-2</td><td>Additional info</td><td>Additional info</td><td>Additional info</td><td>Additional info</td>
        </tr>
        <tr class="treegrid-4 treegrid-parent-3">
            <td>Node 1-2-1</td><td>Additional info</td><td>Additional info</td><td>Additional info</td><td>Additional info</td>
        </tr>
    </table>
@endsection
