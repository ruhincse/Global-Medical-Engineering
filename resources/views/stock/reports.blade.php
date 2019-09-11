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
                 Stock Product  List
                  <a href="{{route('stock.product.create')}}" class="btn btn-info float-right"><i class="fa fa-plus-circle"></i> <span>Add Product</span> </a>
                </div>
                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" id="success-alert" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
                <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
     
        <tr>
          <th>Sl</th>        
          <th>Product Name</th>
          <th>Total Stock</th>        
          <th>Total sells</th>       
          <th>Available Stock</th>       
            
               
         
        </tr>
       
      </thead>
      <tbody>

          @foreach($datas as $key=>$data)

          <tr>

              <td> {{ $key+1}}  </td>           
              <td> {{ $data->product->product_name}}  </td>           
              <td>    
                  @php

                  $total=DB::table('stockproducts')
                      ->where('pro_id',$data->pro_id)
                      ->sum('qty');

                  @endphp
                  {{ $total}}

              </td>           
              <td> #sells  </td>          
              <td class="text-danger"> #Available  </td>          
                       
                        

          </tr>

      

          @endforeach

            
      </tbody>
      <tfoot>

          <tr>
          <th>Sl</th>        
          <th>Product Name</th>
          <th>Total Stock</th>        
          <th>Total sells</th>       
          <th>Available Stock</th>       
            
               
         
        </tr>
        

      </tfoot>
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

@push('end_js')


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js"></script>
<script>
  
$(document).ready (function(){
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>

@endpush