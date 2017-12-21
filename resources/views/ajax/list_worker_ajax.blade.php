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
            @if(count($workers))
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
            @else
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h1>No Result</h1></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="col-lg-6 col-md-3 col-sm-6 col-xs-12 col-lg-offset-4">
            @if(count($workers))
                {{$workers->links()}}
            @endif
        </div>

        <script>

            $('#list').on("click", 'tr', function () {
                alert(this.id)
                var id = this.id;

                location.href = "/worker/" + id + "/edit";
            })
        </script>