@if(count($workers))
    @foreach($workers AS $worker)
        <div class="child">
            <div  id="phazer{{$worker->id}}" class="show_greed">
                <div class="col-lg-12 parent" id="{{$worker->id}}" >
                    <span class="col-lg-2 glyphicon glyphicon-forward">   {{$worker->position}}</span>
                    <span class="col-lg-2">{{$worker->name}}</span>
                    <span class="col-lg-2">{{$worker->surname}}</span>
                    <span class="col-lg-2">{{$worker->patronymic}}</span>
                    <span class="col-lg-2">{{$worker->salary}}$</span>
                    <span class="col-lg-2">{{$worker->date_receipt}}</span>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="child">
    <div class="col-lg-12 " style="border: 1px solid ;" >
        <span class="col-lg-3"></span>
        <span class="col-lg-5"><h1>Not subordinate Workers</h1></span>
        <span class="col-lg-2"></span>
        <span class="col-lg-2"></span>
    </div>
    </div>
@endif