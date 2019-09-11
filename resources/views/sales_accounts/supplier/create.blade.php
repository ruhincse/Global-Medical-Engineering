@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<li class="breadcrumb-item"><a style="color:#fff" href="javascript:void(0)">Sales & Accounts</a></li>
<li class="breadcrumb-item"><a style="color:#fff" href="javascript:void(0)">Supplier</a></li>
<li class="breadcrumb-item"><a style="color:#fff" href="javascript:void(0)">Create</a></li>
@endpush
@section('page-content')
 <div id="app">
  
    <div class="row">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                  <strong class="font-weight-bold">Create New Supplier </strong>
                  <a href="javascript:void(0)" class="btn btn-info float-right"><i class="fa fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
             
                    <form action="{{route('acc.supplier_store')}}" method="post" enctype="multipart/form-data">
                     @csrf
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group {{$errors->has('supplier_code') ? 'has-error' : ''}}">
                             <label for="" class="float-left">Supplier ID</label>
                             <input type="text" name="code" id="" class="form-control" value="Sup#{{date('Ymd').'-'. uniqid()}}">
                             <span class="text text-danger">{{$errors->first('supplier_code')}}</span>
                        </div>
                        </div>
                        
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group {{$errors->has('supplier_name') ? 'has-error' : ''}}">
                             <label for="" class="float-left">Supplier Name</label>
                             <input type="text" name="supplier_name" id="" class="form-control" value="{{old('supplier_name')}}">
                             <span class="text text-danger float-left">{{$errors->first('supplier_name')}}</span>
                        </div>
                        </div>
                        
                        </div>

                        
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group {{$errors->has('supplier_address') ? 'has-error' : ''}}">
                             <label for="" class="float-left">Address</label>
                             <textarea name="supplier_address" id="" cols="30" rows="5" class="form-control" value="">{{old('supplier_address')}}</textarea>
                             <span class="text text-danger float-left">{{$errors->first('supplier_address')}}</span>
                        </div>
                        </div>
                        
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group {{$errors->has('supplier_phone') ? 'has-error' : ''}}">
                             <label for="" class="float-left">Supplier Phone</label>
                             <input type="text" name="supplier_phone" id="" class="form-control"  value="{{old('supplier_phone')}}">
                             <span class="text text-danger float-left">{{$errors->first('supplier_phone')}}</span>

                        </div>
                        </div>
                        
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                             <label for="" class="float-left">Supplier Image</label>
                             <input type="file" name="supplier_image" id="supplier_image" class="form-control" onchange="preview_image(event)">
                        </div>
                        </div>
                        <div class="col-md-6">
                         <div class="form-group">
                         <img id="output_image" height="200px" width="200px"/>
                         </div>
                         </div>
                        </div>
                        <div class="row">
                             <div class="col-md-6">
                             <div class="form-group">
                            
                            <button type="submit" class="btn btn-success">Create</button>
                            </div>
                             </div>
                        
                        </div>

                    </form>
                
                 </div>
                <div class="card-footer text-muted">
                  
                </div>
             </div>
        </div>
    </div>
</div>    
@endsection
@push('end_js')
<script>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
@endpush
