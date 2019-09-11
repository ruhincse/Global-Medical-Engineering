@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')

@endpush

@section('page-content')
<div class="">
<!-- employee partial deshboard -->
<div class="row">
    <div class="col-md-3">
        <div class="menu" >
            <label for="employee">EMPLOYEE</label>
            <div class="list" >
                <ul >
                    <li><a href="/employee"><i class="mdi mdi-account-box"></i> Employee List</a></li>
                </ul>
                <ul>
                    <li><a href="/employeeadd">Add New Employee</a></li>
                </ul>              
            </div>
            <label for="settings">SETTINGS</label>
            <div class="list">
                <ul>
                    <li><a href="/department">Department</a></li>
                </ul>
                <ul>
                    <li><a href="/divisions">Division</a></li>
                </ul>
                <ul>
                    <li><a href="/workingplace">Working Place</a></li>
                </ul>
                <ul>
                    <li><a href="/employmenttype">Employement Type</a></li>
                </ul>
                <ul>
                    <li><a href="/designation">Designation</a></li>
                </ul>
                <ul>
                    <li><a href="/leave">Leave</a></li>
                </ul>
              
            </div>


            <label for="settings" >PayRoll</label>
            <div class="list">
                            
            </div>
            <label for="settings">Attendance</label>
            <div class="list" >
                          
            </div>
        </div>
    </div>
    <div class="col-md-9">
        @include('employee._partials_employee_add.emp-dashboard') 
    </div>
</div>
</div>
</div>
@endsection
@push('end_js')
@endpush