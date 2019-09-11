@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Sales & Accounts</a></li>
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Client</a></li>
<li class="breadcrumb-item" style="color:#fff;"><a style="color:#fff;" href="javascript:void(0)">Client Info</a></li>
@endpush

@section('page-content')
<div id="app">
<div class="card">
<div class="card-header"><i class="mdi mdi-account-edit"> <strong>Client Info</strong></i>
<a href="{{route('acc.client_info_create')}}" class="btn btn-info float-right"><i class="fa fa-user-plus"> New</i></a>
</div>
<div class="card-body">
<div class="table-responsive">
  <table class="table table-bordered m-t-30 table-hover contact-list footable footable-5 footable-paging footable-paging-center breakpoint-sm">
  <thead>
    <tr class="footable-header">
     <th class="footable-first-visible" style="display: table-cell;">Sl no.</th>
     <th style="display: table-cell;">Customer Code</th>
     <th style="display: table-cell;">Company Name</th>
     <th style="display: table-cell;">Address</th>
     <th style="display: table-cell;">Contact Person</th>
     <th style="display: table-cell;">Contact Number</th>
     <th class="footable-last-visible" style="display: table-cell;">Action</th>
     </tr>
</thead>

    <tbody>
    @foreach($clients as $client)
      <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$client->client_code}}</td>
      <td>{{$client->name}}</td>
      <td>{{$client->address}}</td>
      <td>{{$client->contact_person}}</td>
      <td>{{$client->contact_number}}</td>
      <td>
        <a href="{{route('acc.client_info_edit',$client->id)}}" class="btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
        <a href="{{route('acc.client_info_show',$client->id)}}" class="btn-sm btn-warning"><i class="fa fa-eye"></i></a>
        <a href="{{ route('acc.client_info_destroy',$client->id) }}"  onclick="event.preventDefault();
                                 document.getElementById('delete-form').submit();" class="btn-sm btn-danger delete"><i class="fa fa-trash-alt"></i></a>

    <form id="delete-form" action="{{ route('acc.client_info_destroy',$client->id) }}" method="POST" style="display: none;">
           @csrf
           @method('delete')
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
@endsection
@push('end_js')
<script>
  $(document).ready(function(){

     $('.delete').click(function(){
        alert('Are you Sure to Delete this Client ???');
     });
  })
</script>
@endpush