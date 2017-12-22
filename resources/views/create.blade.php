@extends('layout_parts.layout')

@section('content')

    <form class="form-horizontal" method="post" name="worker_info" action="{{url('/worker')}}" enctype='multipart/form-data'>
        {{csrf_field()}}
        <div class="col-sm-6">
            <div class="form-group">
                <img alt="" id="image_preview" class="img-thumbnail thumb "  src=""/>
                <input class="hide" type="file" id="files" name="file" multiple />
                <p class="help-block">Click on the image to select a new photo</p>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" name="name" placeholder="name" value="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">surname</label>
                <div class=" col-sm-12">
                    <input type="text" class="form-control"
                           placeholder="surname" name="surname" value="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">patronymic</label>
                <div class=" col-sm-12">
                    <input type="text" class="form-control"
                           placeholder="patronymic" name="patronymic" value="" required>
                </div>
            </div>

                <div class="col-sm-12" >
                    <div class='input-group date' id='datetimepicker10'>
                            <input type='text' name="date_receipt" class="form-control" />
                            <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>

                    </div>
                </div>

                <label  class="col-sm-3 control-label">select boss</label>
                    <select class=" col-sm-12 form-control js-example-basic-single" name="boss">
                    </select>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">position</label>
                <div class=" col-sm-12">
                    <input type="text" class="form-control"
                           placeholder="position" name="position" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">salary</label>
                <div class=" col-sm-12">
                    <input type="text" class="form-control" id="inputPassword3" name="salary" placeholder="salary"
                           value="" required>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <div class=" col-sm-12">
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
            </div>
        </div>
    </div>

    <script type="text/javascript">

    </script>
@endsection