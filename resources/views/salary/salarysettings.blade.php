@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')

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
        <!-- card -->
            <div class="card" style="height:300px;">
                <!-- card body -->
                <div class="card-body">
                <h3>Set User Salary</h3>
                <!-- Create department -->
                    <form class="floating-labels m-t-40" action="{{route('salary.store')}}"method="POST">
                        @csrf
                        <div class="form-group m-b-40">
                            <!-- <label for="totoals">Select User</label>  -->
                            <select class="form-control" style="padding: 0px 10px 10px 10;" name="user_id">
                            <option value="">Select User</option>
                            @foreach($users as $user)
                                <option value={{$user->id}}>{{$user->name}}</option>
                            @endforeach                   
                            </select>
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group m-b-40">
                        <label for="totoals">Total Salary</label>
                            <input type="text" class="form-control" id="totoals"  name="total_salary">
                            <span class="text-danger"></span>
                        </div>
                        <div style="display:none" class="form-group m-b-40">
                        <label for="basic">Basic (50% of Total)</label>
                            <input type="text" class="form-control" id="basic" name="basic_salary">
                            
                            <span class="text-danger"></span>
                        </div>
                        
                        <div style="display:none" class="form-group m-b-40">
                        <label for="hrent">House Rent (60% of Basic)</label>
                            <input type="text" class="form-control" id="hrent" name="house_rent">
                            <span class="bar"></span>
                        </div>
                        <div style="display:none" class="form-group m-b-40">
                            <label for="pfund">Provident fund (10% of Basic)</label>
                            <input type="text" class="form-control" id="pfund" name="provident_fund">
                            <span class="bar"></span>
                        </div>
                        <div style="display:none" class="form-group m-b-40">
                            <label for="mallowances">Mobile Allowances (05% of Basic)</label>
                            <input type="text" class="form-control" id="mobilea" name="mobile_allowances">
                            <span class="bar"></span>
                        </div>
                        <div style="display:none" class="form-group m-b-40">
                            <label for="dinning">Dinning (10% of Basic)</label>
                            <input type="text" class="form-control" id="dinning" name="dinning_allowances">
                            <span class="bar"></span>
                        </div>
                        <div style="display:none" class="form-group m-b-40">
                            <label for="medicala">Medical Allowances (10% of Basic)</label>
                            <input type="text" class="form-control" id="medicala" name="medical_allowances">
                            <span class="bar"></span>
                        </div>
                        <div style="display:none" class="form-group m-b-40">
                            <label for="transport">Transport Allowances (05% of Basic)</label>
                            <input type="text" class="form-control" id="transport" name="transport_allowances">
                            <span class="bar"></span>
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
                </div><!-- end create department -->
                <!-- end card body -->
            </div><!-- end card -->
        </div> <!-- end col-7 -->

        <div class="col-md-12">
        <div class="card" style="height: 535px;">
            <div class="card-body">
                <h4 class="card-title">User Salary List</h4>
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI. No</th>
                                <th>User Name</th>
                                <th>Basic Salary</th>
                                <th>House Rent</th>
                                <th>Provident Fund</th>
                                <th>Mobile Allowances</th>
                                <th>Dinning Allowances</th>
                                <th>Medical Allowances</th>
                                <th>Transport Allowances</th>
                                <th style="background-color: #4b8eb3;color: #fff;font-weight: bold;">Total Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total=0;?>
                        @foreach($salarydata as $salary)
                            @if($salary->basic_salary != 0 )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$salary->name}}</td>
                                <td>{{$salary->basic_salary}}</td>
                                <td>{{$salary->house_rent}}</td>
                                <td>{{$salary->provident_fund}}</td>
                                <td>{{$salary->mobile_allowances}}</td>
                                <td>{{$salary->dinning_allowances}}</td>
                                <td>{{$salary->medical_allowances}}</td>
                                <td>{{$salary->transport_allowances}}</td>
                                <td style="background-color: #4b8eb3;color: #fff;font-weight: bold;">{{$salary->total_salary}}</td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm" data-myid="" data-mytitle="" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>
                                    <a href="#" class="show-modal  btn btn-warning btn-sm" alt="default" data-myid="" data-mytitle="" data-mycode="" data-mydescription="" scription alt="default" data-toggle="modal" data-target="#edit" ><i class="ti-settings"></i></a>
                                </td>
                            </tr>
                            @endif
                            @php($total += $salary->total_salary)
                        @endforeach
                        </tbody>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total Salary Cost =</td>
                        <td style="background-color: #59b34b;color: #fff;font-weight: bold;" >{{$total}}</td>
                    </table>
                </div>
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
</script>
@endpush