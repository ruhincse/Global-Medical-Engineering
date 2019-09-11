@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<style>
.vrt-header th {
  writing-mode: vertical-lr;
  min-width: 30px; /* for firefox */
  padding-bottom: 20px;
}
</style>
@endpush

@section('page-content')

<div class="col-lg-12">
<!-- row start -->
    <div class="row" >
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success"id="success-alert">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
        <div class="col-md-12">
        <div class="card" style="height: 535px;">
            <div class="card-body">
                <h4 class="card-title">User Attendance</h4>
                <!-- Create department -->
                <form class="floating-labels m-t-40" action=""method="POST">
                        @csrf
                    <div class="row">
                        <div class="form-group col-md-4 m-t-20">
                            <label style="position: initial;" for="totoals">User Name</label> 
                            <select class="form-control" style="padding: 0px 10px 10px 10;" name="user_id">
                            <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value={{$user->id}}>{{$user->name}}</option>
                                @endforeach                   
                            </select>
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group col-md-4 m-b-20 " >
                            <label style="position: initial;" for="dob">Date</label>
                            <input type="date" class="form-control" style="margin-top: 20px;" id="dob" name="dob">
                            <span class="text-danger"></span>
                        </div>
                        <div class="form-group col-md-4 m-t-20">
                        <label style="position: initial;" for="dob">Time</label>
                            <input class="form-control" type="time" value="13:45:00" id="time">
                        </div>
                        <div class="form-group col-md-10 m-t-20">
                            <label for="input7">Remark</label>
                            <textarea class="form-control" rows="4" id="input7" name="description"></textarea>
                            <span class="bar"></span>
                        </div>
                        <div class="form-group col-md-4 m-t-20">
                        <label style="position: initial;" for="dob">status</label>
                            <input class="form-control" type="input" value="" id="status">
                        </div>
                    </div>
                        <!-- button row -->
                        <div class="class row" style="margin-top:20px;">
                            <div class="class col-md-4"></div>
                            <div class="class col-md-4">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">SAVE</button>
                            </div>
                            <div class="class col-md-4"></div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row           -->
</div>
<!-- sample modal content -->


@endsection
@push('end_js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
// list pagination by datatable
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    } );
    console.log($('#uspid').val());
    
} );
</script>
<script>
$("#totoals").on("input", function(){
    var basic = Number($("#totoals").val())/2;
    $("#basic").val(basic);

    var hr = basic*.6;
    $("#hrent").val(hr);

    var pfund = basic*.10;
    $("#pfund").val(pfund);

    var mobilea = basic*.05;
    $("#mobilea").val(mobilea);

    $("#dinning").val(pfund);
    $("#medicala").val(pfund);
    $("#transport").val(mobilea);
});
$("#time").on("input",function(){
    var settime = document.getElementById("time").value;
    console.log(settime);
    var latetime="12:00:00";
    if(settime>latetime)
    {
    console.log('late');
    }
    else
    {
        console.log('ontime');
    }
});
</script>
@endpush