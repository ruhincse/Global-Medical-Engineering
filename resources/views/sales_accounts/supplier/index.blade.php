@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<li class="breadcrumb-item"><a style="color:#fff" href="javascript:void(0)">Sales & Accounts</a></li>
<li class="breadcrumb-item"><a style="color:#fff" href="javascript:void(0)">Supplier</a></li>
<li class="breadcrumb-item"><a style="color:#fff" href="javascript:void(0)">List</a></li>
@endpush
@section('page-content')
 <div id="app">
  
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                  Supplier List
                  <a href="{{route('acc.supplier_create')}}" class="btn btn-info float-right"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
                <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
     
        <tr>
          <th>#</th>
          <th>Code</th>
          <th>Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Image</th>
          <th>Example</th>
         
        </tr>
       
      </thead>
      <tbody>
      @foreach($suppliers as $supplier)
        <tr>
           <td>{{$loop->iteration}}</td>
           <td>{{$supplier->code}}</td>
           <td>{{$supplier->supplier_name}}</td>
           <td>{{$supplier->supplier_address}}</td>
           <td>{{$supplier->supplier_phone}}</td>
           <td><img src="/upload/{{ $supplier->supplier_image }}" alt="" height="40px" width="50px" /></td>
           <td>
           <a href="{{route('acc.supplier_edit',$supplier->id)}}" class="btn-xs btn-warning"><i class="fa fa-pencil-alt"></i></a>
           <a href="{{route('acc.supplier_view',$supplier->id)}}" class="btn-xs btn-primary"><i class="fa fa-eye"></i></a>
           <a href="{{route('acc.supplier_delete',$supplier->id)}}"  onclick="return confirm('Are you sure  to delete this')"  class="btn-xs btn-danger"><i class="fa fa-trash"></i></a>

           </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
                 
                 </div>
                <div class="card-footer text-muted">
                  
                </div>
             </div>
        </div>
    </div>
</div>    
@endsection
