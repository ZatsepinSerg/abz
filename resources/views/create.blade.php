@extends('layout_parts.layout')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

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

        <div class="hide">
            <div class="container">
                <div class="col-sm-6" style="height:130px;">
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker10'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker10').datetimepicker({
                            viewMode: 'years',
                            format: 'MM/YYYY'
                        });
                    });
                </script>
            </div></div>


                <label  class="col-sm-3 control-label">select boss</label>

                    <select class=" col-sm-12 form-control js-example-basic-single" name="boss">
                    </select>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.js-example-basic-single').select2({
                        ajax :{
                            url : '/ajax/short',
                            dataType : 'json',
                            delay : 200 ,
                            data : function (params) {
                                return {
                                    q : params.term,
                                    page :params.page
                                };
                            },
                            processResults : function (data , params) {
                              params.page = params.page || 1;
                              return {
                                  results : data.data,
                                  pagination : {
                                      more : (params.page *10) < data.total
                                  }
                              };
                            }
                        },
                        minimumInputLength : 1,
                        templateResult : function (repo) {
                            if(repo.loading){
                                return repo.name;
                            }

                            var markup = repo.name;

                            return markup;
                        },
                        templateSelection : function(repo){
                            return repo.name;
                        },
                        escapeMarkup : function (markup) {
                            return markup;
                        }
                    });
                });
            </script>


            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">position</label>
                <div class=" col-sm-12">
                    <input type="text" class="form-control"
                           placeholder="position" name="position" value="" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">date receipt</label>
                <div class=" col-sm-12">
                    <input type="text" class="form-control"
                           placeholder="date_receipt" name="date_receipt" value="" required>
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
        $('#files').change(function() {
            var input = $(this)[0];
            if ( input.files && input.files[0] ) {
                if ( input.files[0].type.match('image.*') ) {
                    var reader = new FileReader();
                    reader.onload = function(e) { $('#image_preview').attr('src', e.target.result); }
                    reader.readAsDataURL(input.files[0]);
                }// else console.log('is not image mime type');
            }// else console.log('not isset files data or files API not supordet');
        });

        $('#image_preview').click(function(){
            $('#files').click();
        });
    </script>
@endsection