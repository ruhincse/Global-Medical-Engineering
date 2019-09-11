<div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI. No</th>
                <th>Title</th>
                <th>Numer Of days</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($leaves as $leave)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$leave->title}}</td>
                <td>{{$leave->number_of_days}}</td>
                <td>
                <a href="#" class="btn btn-danger btn-sm" data-myid="{{$leave->id}}" data-mytitle="{{$leave->title}}" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>
                <a href="#" class="show-modal  btn btn-warning btn-sm" alt="default" data-myid="{{$leave->id}}" data-mytitle="{{$leave->title}}" data-mynod="{{$leave->number_of_days}}" scription alt="default" data-toggle="modal" data-target="#edit" ><i class="ti-settings"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
