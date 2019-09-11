@extends('layouts.app-layout')
@section('title','Leave Management')

@push('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0)">Leave-Management</a></li>
@endpush
@section('page-content')
<div id="app">
<div class="row">
  <div class="col-md-12">
  <div class="card">
  <div class="card-header">@{{cardTitle}}
  <a href="{{route('leavem.createview')}}" rel="noopener noreferrer" class="btn btn-info fa-pull-right" ><i class="fa fa-plus"> New Leave Entry</i></a>
  </div>
  <div class="card-body">
        <table class="table table-hover">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th>Leave Type</th>
        <th>From </th>
        <th>To</th>
        <th>No. of Days</th>
        <th>Remarks</th>
        </thead>
        <tbody>
          @foreach($leaveList as $leave)
          <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$leave->name}}</td>
          <td>{{$leave->title}}</td>
          <td>{{$leave->from_date}}</td>
          <td>{{$leave->to_date}}</td>
          <td>{{$leave->days_no}}</td>
          <td>{{$leave->remarks}}</td>

          </tr>
          @endforeach
        </tbody>
        </table>
        <h4>{{$leaveList->links()}}</h4>
     </div>
   </div>
  </div>
</div>
</div>
@endsection
@push('end_js')

<script>
 new Vue({
     el:"#app",
     data:{
        cardTitle:'Leave Management',
     }
 })
</script>
@endpush