<div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI. No</th>
                <th>Name</th>
                <th>Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$department->name}}</td>
                <td>{{$department->code}}</td>
                <td>
                <a href="#" class="btn btn-danger btn-sm" data-myid="{{$department->id}}" data-mytitle="{{$department->name}}" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>
                <a href="#" class="show-modal  btn btn-warning btn-sm" alt="default" data-myid="{{$department->id}}" data-mytitle="{{$department->name}}" data-mycode="{{$department->code}}" data-mydescription="{{$department->description}}" scription alt="default" data-toggle="modal" data-target="#edit" ><i class="ti-settings"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
