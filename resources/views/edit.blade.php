@extends('layout_parts.layout')

@section('content')

    <form class="form-horizontal" method="post" name="worker_info" action="/worker/{{$worker_info->id}}" enctype='multipart/form-data'>
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden" class="form-control" id="inputEmail3" name="id" placeholder="{{$worker_info->id}}" value="{{$worker_info->id}}">
        <div class="col-sm-6">
            <div class="form-group">
                <img alt="" id="image_preview" class="img-thumbnail thumb "  src="{{ url($worker_info->photo)}}"/>
                <input class="hide" type="file" id="files" name="file" multiple />
                <p class="help-block">Click on the image to select a new photo</p>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="name" placeholder="{{$worker_info->name}}" value="{{$worker_info->name}}" >
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">surname</label>
                <div class=" col-sm-12">
                    <input type="text" class="form-control" id="inputPassword3"
                           placeholder="{{$worker_info->surname}}" name="surname" value="{{$worker_info->surname}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">patronymic</label>
                <div class=" col-sm-12">
                    <input type="text" class="form-control" id="inputPassword3"
                           placeholder="{{$worker_info->patronymic}}" name="patronymic" value="{{$worker_info->patronymic}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">@if(!empty($boss_info))boss:{{$boss_info->surname}}@else Don`t boss @endif </label>
                <div class=" col-sm-12">
                    <select class=" col-sm-12 form-control js-example-basic-single" name="boss" >
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">position</label>
                <div class=" col-sm-12">
                    <input type="text" class="form-control" id="inputPassword3"
                           placeholder="{{$worker_info->position}}" name="position" value="{{$worker_info->position}}">
                </div>
            </div>

            <div class="form-group">
                <label for="date_receipt" class="col-sm-3 control-label">date receipt</label>
            <div class="col-sm-12" >
                <div class='input-group date' id='datetimepicker10'>
                    <input type='text' name="date_receipt" class="form-control" placeholder="{{$worker_info->date_receipt}}" value="{{$worker_info->date_receipt}}" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>

                </div>
            </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">salary</label>
                <div class=" col-sm-12">
                    <input type="text" class="form-control" id="inputPassword3" name="salary" placeholder="{{$worker_info->salary}}"
                           value="{{$worker_info->salary}}" >
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <div class=" col-sm-6">
            <div class="form-group">
                <div class=" col-sm-12">
                    <button type="submit" class="col-sm-offset-5  col-sm-2 btn btn-success">save</button>
                </div>
            </div>
        </div>
    </form>
    <div class=" col-sm-6">
        <div class="form-group">
            <div class=" col-sm-12">
            <form action="/worker/{{$worker_info->id}}" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="col-sm-offset-5 col-sm-2 btn btn-danger">Delete</button>
            </form>
            </div>
        </div>
    </div>
@endsection