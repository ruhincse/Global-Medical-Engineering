@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Sales & Accounts</a></li>
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="{{route('acc.client_info_list')}}">Client</a></li>
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Update</a></li>
@endpush

@section('page-content')
<div id="app">

<div class="row justify-content-around">
<div class="col-md-6">
<div class="card">
<div class="card-header"><i class="mdi mdi-account-edit"> <strong>Update Client Info</strong></i></div>
<div class="card-body">

  <form action="{{route('acc.client_info_update',$client->id)}}" method="post">
   @csrf
   @method('PUT')
   <div class="form-group ">
    <label for="">Customer Code<span class="text text-danger">*</span></label>
       <input type="text" name="client_code" id="selected_code" class="form-control" value="{{$client->client_code}}" >
    <span class="text text-danger">{{$errors->first('client_code')}}</span>
    </div>
   <div class="form-group {{$errors->has('client_name' ? 'has-error' : '')}}">
     <label for="client_name">Client/Party Name <span class="text text-danger">*</span></label>
     <input type="text" name="client_name" id="" class="form-control" value="{{$client->name}}">
     <span class="text text-danger">{{$errors->first('client_name')}}</span>
    </div>
    <div class="form-group">
    <label for="address">Address <span class="text text-danger">*</span></label>
    <textarea name="address" id="" cols="30" rows="5" class="form-control">{{$client->address}}</textarea>
    <span class="text text-danger">{{$errors->first('address')}}</span>
    </div>
    <div class="form-group">
    <label for="contactPerson">Contact Person <span class="text text-danger">*</span></label>
    <input type="text" name="contact_person" id="" class="form-control" value="{{$client->contact_person}}">
    <span class="text text-danger">{{$errors->first('contact_person')}}</span>

    </div>
    <div class="form-group">
    <label for="contactNumber">Contact Number <span class="text text-danger">*</span></label>
    <input type="text" name="contact_number" id="" class="form-control" value="{{$client->contact_number}}">
    <span class="text text-danger">{{$errors->first('contact_number')}}</span>
    </div>

    <div class="form-group">
     <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
</div>
@endsection
@push('end_js')
<script>
  $(document).ready(function(){

     $('#select_code').change(function(){
        var val = $("#select_code option:selected").text();
        $('#selected_code').val(val)
     });
  })
</script>
@endpush
