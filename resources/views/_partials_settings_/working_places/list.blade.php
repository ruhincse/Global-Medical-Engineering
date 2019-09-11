<div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI. No</th>
                <th>Place Name</th>
                <th>Code</th>
                <th>Divison Name</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
        @if(!empty($workingplaces))
        @foreach($workingplaces as $workingplace)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$workingplace->name}}</td>
                <td>{{$workingplace->code}}</td>
                <td>{{$workingplace->dname}}</td>
                <td>
                <a href="#" class="btn btn-danger btn-sm" data-myid="{{$workingplace->id}}" data-mytitle="{{$workingplace->name}}" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>

                <a href="#" class="show-modal  btn btn-warning btn-sm" alt="default" data-myid="{{$workingplace->id}}" data-mydvid="{{$workingplace->divison_id}}" data-mydname="{{$workingplace->dname}}" data-mytitle="{{$workingplace->name}}" data-mycode="{{$workingplace->code}}" data-mydescription="{{$workingplace->description}}" scription alt="default" data-toggle="modal" data-target="#edit" ><i class="ti-settings"></i></a>
                </td>
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>

</div>
