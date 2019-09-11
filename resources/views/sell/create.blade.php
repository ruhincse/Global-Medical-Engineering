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
        <form action="{{route('sells.product.store')}}" method="post" class="">
            @csrf

            <div class="card-box">
                <h3 class="card-title">Patient Informations</h3>
                <div class="row">
                    <div class="col-md-4">


                        <div class="form-group">
                            <label>Customer Name*</label>

                             <select class="form-control p-input text-dark" name="customer" required="">
                                <option value="0">Select Client</option>

                                @foreach($customers as $customer )

                                <option value="{{$customer->id}}">{{$customer->name}}</option>

                                @endforeach
                                
                               </select>

                        </div>

                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label>Invoice No *</label>
                            <input class="form-control"  name="invoice" value="#inv-{{rand()}}" type="text" />
                        
                            @if($errors->has('invoice'))
                                <span style="color:red">{{$errors->first('invoice')}}</span>
                            @endif

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <span>Date *</span><br>
                            
                                  <input class="form-control"  name="date"  type="date" />
                            

                            @if($errors->has('date'))
                                <span style="color:red">{{$errors->first('date')}}</span>
                            @endif

                        </div>

                    </div>


                    

                    


                </div>


                <h3 class="card-title">Products Information</h3>
                <div class="row"> 

                    <div class="col-md-2">
                        <label>Select Product *</label> 
                        <select class="form-control"  name="product"  id="productss">

                          <option value="0">Select Product</option>

                            @foreach($proudcts as $proudct )

                            <option value="{{$proudct->id}}">{{$proudct->product_name}}</option>

                            @endforeach
                                                  
                        </select>

                        @if ($errors->has('product'))
                            <p style="color:red"> {{$errors->first('product')}} </p>
                        @endif

                    </div>


                    <div class="col-md-2">

                        <label>Product Qty*</label> 


                            <input class="form-control"  name="qty"   type="number" id="qtty" />
                       

                        @if ($errors->has('qty'))
                            <p style="color:red"> The test selection is required. </p>
                        @endif

                    </div>

                     <div class="col-md-2">

                        <label>unti price*</label> 


                            <input class="form-control"  name="price" value="" type="text"  id='u_price'/>
                       

                        @if ($errors->has('price'))
                            <p style="color:red"> The test selection is required. </p>
                        @endif

                    </div>


                        <div class="col-md-2">

                        <label>Vat (in % )*</label> 


                            <input class="form-control"  name="vat" value=""  id="pro_vat" />                      


                    </div>




                    <div class="col-md-2">

                        <label>Total Amount*</label> 


                            <input class="form-control"  name="total" value=""  id="pro_total" />                      


                    </div>





                    

                    <div class="col-md-2 pt-4">

                        <button type="button" id="btn-product_added" class="btn btn-primary mt-2">
                            <i class="fa fa-plus-circle"></i> Add
                        </button>
                        
                    </div>

                </div>

                <div class="table-responsive mt-2">
                    <table class="table" id="show-tests">
                        <thead>
                            <tr id="table-head" style="display: none">
                                <th>Select Product</th>
                                <th>Quantity</th>
                                <th>unit Price</th>
                                <th>Vat</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>


                    <div class="float-right text-right p-3 border">
                        <p>
                            Total Price : <span id="total_price">0.00</span>

                            <input type="hidden" name="total_price" id="total_price_input" class="text-right" readonly>
                        </p>
                        <p>
                            Customer Pay : 
                            <input type="text" name="customer_pay" id="customer_pay" value="" class="text-right border">
                            <br><small>*</small>
                        </p>
                        <p>
                            Due : 
                            <span id="due">0.00</span>
                        </p>
                    </div>
                </div>

            </div> 

            <div class="text-center m-t-20">
                <button class="btn btn-primary submit-btn" type="submit">Sell Product</button>
            </div>
        </form>
    </div>
</div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">

    // Data collect from StockProducts Table for Unti prices




$( document ).ready(function() {



      $(document).on('change', '#productss',  function() {
           var pro_id = $(this).val();
               
               
                   

             $.ajax({
        type:"GET",
                     
        url : '{{('/sell/product/price')}}/'+pro_id,                
       
        success : function(data) {
         
            /*console.log(data)*/


                var price=data.unit_price;
                var vat=data.vat;                
                $('#u_price').val(price.toFixed(2));   
                $('#pro_vat').val(vat);   

                
                

                     

              
        }, });  });

           $("#qtty").keyup(function(){


            var  qty =$(this).val();

               var unit_price=$('#u_price').val();

             var total_amount=parseFloat(qty)*parseFloat(unit_price);

             var pro_vats= (parseFloat($('#pro_vat').val() *parseFloat(total_amount))/100);          

                $('#pro_total').val(parseFloat(total_amount)+parseFloat(pro_vats));  


        });


// New Product Entry Here





 $(document).on('click', '#btn-product_added', function() {

            

           var pro_id = $('#productss').val();
           
           var _token = '{{ csrf_token() }}';
           $.ajax({
               url: "{{ route('sells.product.cart') }}",
               method: "POST",
               data: {_token:_token, pro_id:pro_id, qty:$('#qtty').val(), unit_price:$('#u_price').val(), vat:$('#pro_vat').val(), total:$('#pro_total').val() },
               dataType: "json",
               success: function (response) {
                   $('#table-head').show();
                   console.log(response);
                    $('#show-tests').append(response);

                    $('#qtty').val('');
                    $('#pro_total').val(0);
                    $('#u_price').val(0);
                    $('#pro_vat').val(0);

                     getTotalPrice();

               }
           });
       });


 $(document).on('click', '.btn-remove', function() {
          $('#test_row_' + $(this).data('testid')).remove();
            getTotalPrice();
           $('#due').html(total_test_price() - $('#customer_pay').val());

           
       });




 $("#customer_pay").keyup(function(){


               $('#due').html(total_test_price() - $('#customer_pay').val());


        });



function getTotalPrice() {
           $('#total_price').html(total_test_price());
           $('#total_price_input').val(total_test_price());
           $('#due').html(total_test_price() - $('#customer_pay').val());

       }

       function total_test_price() {
           var total = 0;
           $('.test-price').each(function(index, element) {
               total += parseInt(element.textContent);
           });
           return total;
       }




});


</script>




@push('end_js')



@endpush




        
       







