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
        @foreach ($divisions as $division)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$division->name }} </td>
                <td>{{$division->code}}</td>
                <td>
                <a href="#" class="btn btn-danger btn-sm" data-myid="{{$division->id}}" data-mytitle="{{$division->name}}" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>
                <a href="#" class="show-modal  btn btn-warning btn-sm" alt="default" data-myid="{{$division->id}}" data-mytitle="{{$division->name}}" data-mycode="{{$division->code}}" data-mydescription="{{$division->description}}" scription alt="default" data-toggle="modal" data-target="#edit" ><i class="ti-settings"></i></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
