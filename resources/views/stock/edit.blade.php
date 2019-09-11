@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
@endpush

@section('page-content')
<div class="card">
    <div class="card-header">
        <h4>Stock  Product</h4>
        

     

 
    </div>
    
           
    <div class="card-body">
        <form class="floating-labels m-t-40" action="{{route('stock.product.update',$stock_pro->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
            {{csrf_field()}}
            <div class="row">

                  <div class="col-md-12">
                        <div id="emp-reg" class="emp-reg">
                           
                            <div class="row">
               <div class="col-md-6">
                            <div class="form-group m-b-40 " >
                                <select name="pro_id"  class="form-control ">

                                    <option value="">-Select Product-</option>
                                    @foreach($products as $product)

                                    <option value="{{$product->id}}" {{($product->id==$stock_pro->pro_id)? 'selected':''}}>{{$product->product_name}}</option>
                                    @endforeach

                                 </select>

                                    </div>                            






                             <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input1" name="purchase_price" value="{{$stock_pro->purchase_price}}">
                                        <label for="input2">Purchase  Price</label>
                                        <span class="text-danger">{{ $errors->first('purchase_price') }}</span>
                                    </div>


                                    
                                </div>  


                                <div class="col-md-6">
                                   
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input2" name="sales_price"  value="{{$stock_pro->sales_price}}">

                                        <label for="input2">Sales Price</label>
                                        <span class="text-danger">{{ $errors->first('sales_price') }}</span>
                                    </div>


                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control"  name="qty"  value="{{$stock_pro->qty}}">
                                        <label for="input2">Qty</label>
                                        <span class="text-danger">{{ $errors->first('qty') }}</span>
                                    </div>


                                     




                            


                                    <!-- <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input4" name="dis_rate">
                                        <label for="input4">Discount Rate</label>
                                      <span class="text-danger">{{ $errors->first('dis_rate') }}</span>
                                    </div>

                                    <div class="form-group m-b-40 " >
                                        

                                       <input type="text" class="form-control" id="input4" name="dis_amount">
                                        <label for="input4">Discount Amount</label>
                                       <span class="text-danger">{{ $errors->first('dis_amount') }}</span>
                                    </div>
 -->


                                   

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

