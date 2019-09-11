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
<div class="card-header"><i class="mdi mdi-account-edit">Product name: <strong class="label label-info"> {{$product->product_name}}</strong></i></div>
<div class="card-body">

	


  <label for=""> Model name</label> <h3>{{$product->model_name}}
 </h3>

  <label for=""> Brand Name: </label> <h3>{{$product->brand_name}}</h3>
  <label for="">Lot No. </label> <h3>{{$product->lot_no}}</h3>
  <label for="">Discount Rate: </label> <h3>{{$product->discount_rate}}</h3>
  <label for="">Discount Price: </label> <h3>{{$product->discount_price}}</h3>
  <label for="">Product Prices: </label> <h3>{{$product->purchase_price}}</h3>
  <label for="">Sales Prices: </label> <h3>{{$product->sales_price}}</h3>
  <label for="">Product Qty: </label> <h3>{{$product->product_qty}}</h3>

  <label for="">Product Description: </label> <h3>{{$product->product_des}}</h3>
  <label for="">Vat: </label> <h3>{{$product->vat}}</h3>
  <label for="">Expire Date: </label> <h3>{{$product->ex_date}}</h3>
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
