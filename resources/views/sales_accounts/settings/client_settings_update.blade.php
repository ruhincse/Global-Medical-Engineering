@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Sales & Accounts</a></li>
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="{{route('acc.client_settings')}}">Client</a></li>
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">SettingsUpdate</a></li>
@endpush

@section('page-content')
<div id="app">
<div class="row">
<div class="col-md-5">
<div class="card">
<div class="card-header"><i class="mdi mdi-account-edit"> <strong>Client Settings <p class="label label-warning">Update</p></strong></i></div>
<div class="card-body">
  <form action="{{route('acc.client_settings_update',$clientsettings->id)}}" method="post">
   @csrf
   @method('PUT')
    <div class="form-group {{$errors->has('title') ? 'has-error' : ''}}">
    <label for="">Title <span class="text text-danger">*</span></label>
    <input type="text" name="title" id="" class="form-control" value="{{$clientsettings->title}}">
    <span class="text text-danger">{{$errors->first('title')}}</span>
    </div>
    <div class="form-group">
    <label for="">Code Prefix <span class="text text-danger">*</span></label>
    <input type="text" name="prefix" id="" class="form-control" value="{{$clientsettings->prefix}}">
    <span class="text text-danger">{{$errors->first('prefix')}}</span>
    </div>
    <div class="form-group">
    <label for="">Increment By <span class="text text-danger">*</span></label>
    <input type="text" name="increment_by" id="" class="form-control" value="{{$clientsettings->increment_by}}">
    <span class="text text-danger">{{$errors->first('increment_by')}}</span>
    </div>
    <div class="form-group">
    <label for="">Last Number <span class="text text-danger">*</span></label>
    <input type="text" name="last_number" id="" class="form-control" value="{{$clientsettings->last_number}}">
    <span class="text text-danger">{{$errors->first('last_number')}}</span>
    </div>
    <div class="form-group">
    <label for="">Status <span class="text text-danger">*</span></label>
    <select name="status" id="" class="form-control">
    <option value="-1" {{$clientsettings->isActive == '' ? 'selected' : '' }}>-Select Status-</option>
    <option value="1"{{$clientsettings->isActive ? 'selected' : '' }}>Active</option>
    <option value="2" {{!$clientsettings->isActive ? 'selected' : '' }}>Deactive</option>
    </select>
    </div>
    <div class="form-group">
     <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
</div>
</div>
</div>
<div class="col-md-7">
<div class="card">
<div class="card-header"><i class="mdi mdi-account-edit"> <strong>Client Info</strong></i></div>
<div class="card-body">
  <div class="table-reponsive">
   <table class="table table-bordered">
     <thead>
        <th>sl</th>
        <th>code</th>
        <th>increment_by</th>
        <th>last_no</th>
        <th>active</th>
        <th>actions</th>
     </thead>
     <tbody>
      @foreach($client_settings as $cs)
       <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$cs->prefix}}</td>
        <td>{{$cs->increment_by}}</td>
        <td>{{$cs->last_number}}</td>
        <td>{{$cs->isActive ? 'Active' : 'De-Active'}}</td>
        <td>
          <a href="{{route('acc.client_settings_edit',$cs->id)}}" class="btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a>
          <form action="{{route('acc.client_settings_deactive',$cs->id)}}" method="post" style="display:inline-block" id="form2">
          @csrf
          @method('PUT')
          <button type="submit" class="btn-sm btn-danger"><i class="fa fa-power-off"></i></button>
          </form>
     
          <form action="{{route('acc.client_settings_active',$cs->id)}}" method="post" style="display:inline-block" id="form2">
          @csrf
          @method('PUT')
          <button type="submit" class="btn-sm btn-info"><i class="fa fa-power-off"></i></button>
          </form>
        </td>
       </tr>
       @endforeach
     </tbody>
   </table>
  </div>
</div>
</div>

</div>
</div>

</div>
@endsection