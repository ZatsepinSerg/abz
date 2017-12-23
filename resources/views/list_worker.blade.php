@extends('layout_parts.layout')

@section('content')

    <div class="col-lg-12">
        <div class="col-lg-3">Для сортировки нажмите на название поля по которому необходимо сортировать </div>
        <div class="col-lg-6">
            <form class="form-inline" id="search">
                {{csrf_field()}}
                <div class="form-group search">
                    <label for="exampleInputName2">Text</label>
                    <input type="text" class="form-control" id="exampleInputName2" name="searchString"
                           placeholder="Pleace input text">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Column select</label>
                    <select class="form-control" id="type_lesect" name="select">
                        <option value="patronymic">patronymic</option>
                        <option value="surname">surname</option>
                        <option value="name">name</option>
                        <option value="position">position</option>
                        <option value="salary">salary</option>
                        <option value="date_receipt">date_receipt</option>
                    </select>
                </div>
                <button type="button" class="btn btn-default" onclick="search_info(document.getElementById('search'))">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search
                </button>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <br>
    <br>
    <div class="content">
        <table class="table">
            <thead>
            <tr>
                <th>photo worker</th>
                <th name="patronymic" id="patronymic" onclick="sort_info(this.id)">patronymic</th>
                <th name="surname" id="surname" onclick="sort_info(this.id)">surname</th>
                <th name="name" id="name" onclick="sort_info(this.id)">name</th>
                <th name="position" id="position" onclick="sort_info(this.id)">position</th>
                <th name="salary" id="salary" onclick="sort_info(this.id)">salary</th>
                <th name="date_receipt" id="date_receipt" onclick="sort_info(this.id)">date receipt</th>
            </tr>
            </thead>
            <tbody id="list">
            @foreach( $workers AS $worker )
                <tr id="{{$worker->id}}">
                    <td><img src="{{$worker->photo}}" alt="{{$worker->name}}" style="width: 100px;height: 100px;"
                             class="img-rounded"></td>
                    <td>{{$worker->patronymic}}</td>
                    <td>{{$worker->surname}}</td>
                    <td>{{$worker->name}}</td>
                    <td>{{$worker->position}}</td>
                    <td>{{$worker->salary}}$</td>
                    <td>{{$worker->date_receipt}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div id="type_pagination" title="main">
            <div class="col-lg-6 col-md-3 col-sm-4 col-xs-6 col-lg-offset-4">
                @if(count($workers))
                    {{$workers->links()}}
                @endif
            </div>
        </div>
    </div>


@endsection