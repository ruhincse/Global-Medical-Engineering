@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
@endpush

@section('page-content')
<div class="card">
    <div class="card-header">
        <h4>Add  Product Brand</h4>
        

     

 
    </div>
    
           
    <div class="card-body">
        <form class="floating-labels m-t-40" action="{{route('product.brand.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
            {{csrf_field()}}
            <div class="row">

                  <div class="col-md-12">
                        <div id="emp-reg" class="emp-reg">
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input1" name="brand_name">
                                        <label for="input1">Product Brand Name</label>
                                        <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                                    </div>
                                  

                                    
                                </div>               
                                           
                            </div>
                        </div>   


                      
                        
                        
                        <!-- button row -->
                        <div class="class row save" style="margin-top:20px; display:;">
                            <div class="class col-md-4"></div>
                            <div class="class col-md-4">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">SAVE</button>
                            </div>
                            <div class="class col-md-4"></div>
                        </div>
                    </div>
               
            </div>
        </form>
    </div>
</div>
@endsection

@push('end_js')
<!-- jQuery file upload -->

@endpush