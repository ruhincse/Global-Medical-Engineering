@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Sales & Accounts</a></li>
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="{{route('acc.client_info_list')}}">Client</a></li>
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Show</a></li>
@endpush

@section('page-content')
<div id="app">

<div class="row justify-content-around">
<div class="col-md-6">
<div class="card">
<div class="card-header"><i class="mdi mdi-account-edit">Client Name: <strong class="label label-info"> {{$supplier->supplier_name}}</strong></i></div>
<div class="card-body">
  <label for="">Code: </label> <h3>{{$supplier->code}}</h3>
  <label for="">Address: </label> <h3>{{$supplier->supplier_address}}</h3>
  <label for="">Contact Number: </label> <h3>{{$supplier->supplier_phone}}</h3>
</div>
</div>
</div>
</div>
</div>
@endsection
@push('end_js')
<script>
  $(document).ready(function(){

  })
</script>
@endpush



