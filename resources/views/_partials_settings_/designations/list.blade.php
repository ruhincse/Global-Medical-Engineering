<div class="table-responsive">
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI. No</th>
                <th>Name</th>
                <th>Code</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($designations as $designation)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$designation->name}}</td>
                <td>{{$designation->code}}</td>
                <td>{{$designation->description}}</td>
                <td>
                <a href="#" class="btn btn-danger btn-sm" data-myid="{{$designation->id}}" data-mytitle="{{$designation->name}}" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>
                <a href="#" class="show-modal  btn btn-warning btn-sm" alt="default" data-myid="{{$designation->id}}" data-mytitle="{{$designation->name}}" data-mycode="{{$designation->code}}" data-mydescription="{{$designation->description}}" scription alt="default" data-toggle="modal" data-target="#edit" ><i class="ti-settings"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
