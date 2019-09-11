<div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI. No</th>
                <th>Employment Name</th>
                <th>Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($emplomenttypes as $emplomenttype)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$emplomenttype->name}}</td>
                <td>{{$emplomenttype->code}}</td>
                <td>
                <a href="#" class="btn btn-danger btn-sm" data-myid="{{$emplomenttype->id}}" data-mytitle="{{$emplomenttype->name}}" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>
                <a href="#" class="show-modal  btn btn-warning btn-sm" alt="default" data-myid="{{$emplomenttype->id}}" data-mytitle="{{$emplomenttype->name}}" data-mycode="{{$emplomenttype->code}}" data-mydescription="{{$emplomenttype->description}}" scription alt="default" data-toggle="modal" data-target="#edit" ><i class="ti-settings"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
