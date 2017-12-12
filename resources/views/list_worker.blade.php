@extends('layout_parts.layout')

@section('content')
    <script type="text/javascript">
        function search_info(search) {

            var searchStr = search.searchString.value;
            var selectStr = search.select.value;

            $.ajax({
                type: 'get',
                url: '/search_info',
                data:{ string:searchStr,select:selectStr
                },
                success: function(response) {
                   refresh_table(response);
                },
                error: function(){
                    alert('error');
                }
            });
            return false;
        }
        function sort_info(id) {

            var sequence = $('#'+ id).val()

            if(sequence && sequence != "ASC"){
                $('#'+ id).val("ASC")
                $('.glyphicon.sort').remove();
                $('#'+ id).append('<span class=" glyphicon glyphicon-menu-up sort" aria-hidden="true"></span>');
            }else{
                $('#'+ id).val("DESC")
                $('.glyphicon.sort').remove();
                $('#'+ id).append('<span class=" glyphicon glyphicon-menu-down sort" aria-hidden="true"></span>');
            }
            sequence = $('#'+ id).val()

            $.ajax({
                type: 'get',
                url: '/sort_info',
                data: {
                    column: id, sequence: sequence
                },
                success: function(response) {

                    refresh_table(response);

                },
                error: function(){
                    alert('error');
                }
            });
            return false;
        }

        function refresh_table(response) {
            $('#list').empty();
            var table='';

            if (response.length > 0) {
                for (info in response) {

                    table += '<tr> <td ><img src="' + response[info].photo + '" alt="' + response[info].name + '" ' +
                        'style="width: 100px;height: 100px;" class="img-rounded" ></td>' +
                        ' <td >' + response[info].patronymic + '</td><td >' + response[info].surname + '</td>' +
                        '<td >' + response[info].name + '</td><td>' + response[info].position + '</td> <td >'
                        + response[info].salary + '$</td> <td >' + response[info].date_receipt + '</td></tr>'
                }
            }else{
                table += '<tr><td></td><td></td><td><h1>No Result</h1></td><td><td></td><td></td></td><td></td></tr>';
            }
            $('#list').html( table );
        }


    </script>
    <div class="col-lg-12">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <form class="form-inline" id="search" >
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputName2">Text</label>
                <input type="text" class="form-control" id="exampleInputName2"  name="searchString" placeholder="Jane Doe" >
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
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
        </form>
    </div>
    <div class="col-lg-3"></div>
    </div>
    <br>
    <br>

    <table class="table" >
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
            <tr>
                <td ><img src="{{$worker->photo}}" alt="{{$worker->name}}" style="width: 100px;height: 100px;" class="img-rounded" ></td>
                <td >{{$worker->patronymic}}</td>
                <td >{{$worker->surname}}</td>
                <td >{{$worker->name}}</td>
                <td>{{$worker->position}}</td>
                <td >{{$worker->salary}}$</td>
                <td >{{$worker->date_receipt}}</td>
            </tr>
    @endforeach
        </tbody>
     </table>

@endsection