@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Sales & Accounts</a></li>
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Client</a></li>
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Create</a></li>
@endpush

@section('page-content')
<div id="app">

<div class="row justify-content-around">
<div class="col-md-6">
<div class="card">
<div class="card-header"><i class="mdi mdi-account-edit"> <strong>Client Settings</strong></i></div>
<div class="card-body">

  <form action="{{route('acc.client_info_store')}}" method="post">
   @csrf
    <div class="form-group ">
    <label for="">Code <span class="text text-danger">*</span></label>
     <select name="code" id="select_code" class="form-control ">
        <option value="">-Select Code-</option>
        @foreach($clientcode as $code)
        <option value="{{$code->id}}">{{$code->prefix.date('y').date('m').date('d').($code->last_number + $code->increment_by)}}</option>
        @endforeach
     </select>
    <span class="text text-danger">{{$errors->first('code')}}</span>
    </div>
    <div class="form-group ">
    <label for="">Customer Code<span class="text text-danger">*</span></label>
       <input type="text" name="client_code" id="selected_code" class="form-control">
    <span class="text text-danger">{{$errors->first('client_code')}}</span>
    </div>
    <div class="form-group {{$errors->has('client_name' ? 'has-error' : '')}}">
     <label for="client_name">Client/Party Name <span class="text text-danger">*</span></label>
     <input type="text" name="client_name" id="" class="form-control">
     <span class="text text-danger">{{$errors->first('client_name')}}</span>
    </div>
    <div class="form-group">
    <label for="address">Address <span class="text text-danger">*</span></label>
    <textarea name="address" id="" cols="30" rows="5" class="form-control"></textarea>
    <span class="text text-danger">{{$errors->first('address')}}</span>
    </div>
    <div class="form-group">
    <label for="contactPerson">Contact Person <span class="text text-danger">*</span></label>
    <input type="text" name="contact_person" id="" class="form-control">
    <span class="text text-danger">{{$errors->first('contact_person')}}</span>

    </div>
    <div class="form-group">
    <label for="contactNumber">Contact Number <span class="text text-danger">*</span></label>
    <input type="text" name="contact_number" id="" class="form-control">
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
