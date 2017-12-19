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
        <tr id="{{$worker->id}}">
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
{{$workers->links()}}