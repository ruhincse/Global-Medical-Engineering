@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
@endpush

@section('page-content')

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="/storage/userpic/{{$users[0]->image}}" class="" width="100%" />
                                    <h4 class="card-title m-t-10">{{$users[0]->name}}</h4>
                                    <h6 class="card-subtitle">{{$users[0]->desname}}</h6>
                                    
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6>{{$users[0]->email}}</h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>{{$users[0]->phone_number}}</h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6>{{$users[0]->present_address}}</h6>
                                <div class="map-box">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.38703692693!2d90.27923991057244!3d23.780573258035957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1553515137226" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div> 
                                <br/>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Employment History</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                    <form class="form-horizontal form-material">
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-sm-12">Department</label>
                                                <div class="col-sm-12">
                                                    <h6>{{$users[0]->dname}}</h6>
                                                </div>
                                            </div>

                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Date Of Birth</label>
                                                <div class="col-md-12">
                                                <h6>{{$users[0]->dob}}</h6>                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Maritial Status</label>
                                                <div class="col-md-12">
                                                <h6>{{$users[0]->maritial_status}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Gender</label>
                                                <div class="col-md-12">
                                                <h6>{{$users[0]->gender}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">NID</label>
                                                <div class="col-md-12">
                                                <h6>{{$users[0]->nid}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Passport</label>
                                                <div class="col-md-12">
                                                <h6>{{$users[0]->passport}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Tex Code</label>
                                                <div class="col-md-12">
                                                <h6>{{$users[0]->tex_code}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">
                                    <form class="form-horizontal form-material">
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Registration Date</label>
                                                <div class="col-md-12">
                                                    <h6>{{$users[0]->registration_date}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Joining Date</label>
                                                <div class="col-md-12">
                                                    <h6>{{$users[0]->joining_date}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Office Mobile Number</label>
                                                <div class="col-md-12">
                                                    <h6>{{$users[0]->office_mobile_number}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Employment Type</label>
                                                <div class="col-md-12">
                                                    <h6>{{$users[0]->etname}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Working Place</label>
                                                <div class="col-md-12">
                                                    <h6>{{$users[0]->wpname}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Divisions name</label>
                                                <div class="col-md-12">
                                                    <h6>{{$users[0]->divname}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Incriment</label>
                                                <div class="col-md-12">
                                                    <h6>{{$users[0]->increment}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Incriment Date</label>
                                                <div class="col-md-12">
                                                    <h6>{{$users[0]->increment_date}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Incriment Date</label>
                                                <div class="col-md-12">
                                                    <h6>{{$users[0]->increment_date}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Leaves Name</label>
                                                <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?php $total=0;?>
                                                        @foreach($users as $leave)
                                                            <h6>{{$leave->title}} = {{$leave->number_of_days}}</h6>  
                                                            @php($total += $leave->number_of_days)
                                                        @endforeach 
                                                    </div>
                                                    <div class="col-md-6">
                                                    <h4>Total Leave: {{ $total }}</h4>
                                                    </div>
                                                </div>
                                                                                       
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material">
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Name</label>
                                                <div class="col-md-12">
                                                <h6>{{$users[0]->name}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                <h6>{{$users[0]->email}}</h6>                                                    
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-bottom: 3px solid #eef5f9">
                                                <label class="col-md-12">Phone Number</label>
                                                <div class="col-md-12">
                                                <h6>{{$users[0]->phone_number}}</h6>                                                    
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            
        </div>

@endsection

@push('end_js')
@endpush