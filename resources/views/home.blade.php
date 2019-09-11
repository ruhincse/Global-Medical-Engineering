@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<li class="breadcrumb-item"><a style="color:#fff" href="javascript:void(0)">GMEBD</a></li>
@endpush
@section('page-content')
 <div id="app">
    <div class="row">
        <div class="col-md-12">
            <div class=" text-center">
                <div class="">
                  HRM Status
                </div>
                <div class="">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
                    @include('_partials_.dashboard-emp-info-box')
                 <!-- <h4 class="card-title">Welcome Message !</h4> -->
                 <!-- <p class="card-text">  You are logged in!</p> -->
                 <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                 </div>
                <div class="card-footer text-muted">
                  
                </div>
             </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                  Status
                </div>
                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif

                 <h4 class="card-title">Welcome Message !</h4>
                 <p class="card-text">  You are logged in!</p>
                 <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                 </div>
                <div class="card-footer text-muted">
                  
                </div>
             </div>
        </div>
    </div>
</div>    
@endsection
