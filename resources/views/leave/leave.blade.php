@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
@endpush

@section('page-content')
    
    <div class="card">
        <div class="card-header">
            <h4>Add Leave</h4>
        </div>
        <div class="card-body">
        <form class="floating-labels m-t-40" action=""method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div id="emp-reg" class="emp-reg">
                            <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">Personal Information</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input1" name="name">
                                        <label for="input1">Employee name</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input2" name="name">
                                        <label for="input2">Position</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="inputp" name="name">
                                        <label for="inputp">Phone No</label>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>               
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input3" name="name">
                                        <label for="input3">E-mail</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input4" name="name">
                                        <label for="input4">Manager</label>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>               
                            </div>
                        </div>   


                        <div id="emp-profile" class="emp-profile" style="display:">
                            <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">Leave Details</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <label>Type Of Leave</label>
                                        <select class="form-control">
                                            <option>Leave Type 1</option>
                                            <option>Leave Type 2</option>
                                            <option>Leave Type 3</option>
                                            <option>Leave Type 4</option>
                                            <option>Leave Type 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input5" name="name">
                                        <label for="input5">Start Date</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input6" name="name">
                                        <label for="input6">End Date</label>
                                        <span class="text-danger"></span>
                                    </div>      
                                    <div class="form-group m-b-5">
                                        <textarea class="form-control" rows="4" id="input7" name="description"></textarea>
                                        <span class="bar"></span>
                                        <label for="input7">Description</label>
                                    </div>                             
                                </div>    

                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="days" name="name">
                                        <label for="days">Days Accrued</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input8" name="name">
                                        <label for="input8">Days Requested</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input9" name="name">
                                        <label for="input9">Request Status</label>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>               
                            </div>
                        </div>
                        
                        
                        <!-- button row -->
                        <div class="class row save" style="margin-top:20px; display:;">
                            <div class="class col-md-4"></div>
                            <div class="class col-md-4">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">SAVE</button>
                            </div>
                            <div class="class col-md-4"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('end_js')

@endpush