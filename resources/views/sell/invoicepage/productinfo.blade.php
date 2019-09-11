<div class="row ">
	<div class="col-sm-4">
	    <p align="left" class="text-dark" style="font-weight: bold; font-size: 16px;margin-bottom: 0px;padding-bottom: 0px;">DESCRIPTION OF GOODS:</p>
	</div>
	<div class="col-sm-1">      
	    <p align="left"  class="text-dark" style="font-weight: bold; font-size: 16px; margin-bottom: 0px;padding-bottom: 0px;">QTY</p>   
	</div>
	<!-- <div class="col-sm-2"> 
	    <p align="left" class="text-dark"  style="font-weight: bold; font-size: 16px; margin-bottom: 0px;padding-bottom: 0px;">FREIGHT</p>
	</div> -->
	<div class="col-sm-2"> 
	     <p align="left" class="text-dark"  style="font-weight: bold; font-size: 16px; margin-bottom: 0px;padding-bottom: 0px;">UNIT PRICE</p>
	</div>
	<div class="col-sm-2"> 
	    <p align="left"  class="text-dark" style="font-weight: bold; font-size: 16px; margin-bottom: 0px;padding-bottom: 0px;margin-left: 8px;">TOTAL VALUE</p>
	</div>
	<div class="col-sm-1">
		
	</div>
</div>
		<div class="hr" style="width: 100%;background-color: black;height: 3px;">
		</div>
<div id="goods_container">	
	<div class="row container1">

	    <div align="left" class="col-sm-4" style="margin-top: 10px">

	    			<select class="form-control p-input text-dark" name="dog[]" required="" id="product">
	  			<option value="0">Select Product</option>

	  			@foreach($proudcts as $proudct )

	  			<option value="{{$proudct->id}}">{{$proudct->product_name}}</option>

	  			@endforeach

	  		</select>
	  			


	    </div>

	    <div align="left" class="col-sm-1" style="margin-top: 10px">  
	    	<input type="number" onkeypress="isInputNumber(event)" name="qty[]" class="inputv qty" id="qtyid" style="width: 70px;"> 
	    </div>
	   <!--  <div align="left" class="col-sm-2" style="margin-top: 10px">
			<input type="text" name="freight[]" class="inputv" id="freightid" style="width: 150px;">
	    </div> -->
	    <div align="left" class="col-sm-2" style="margin-top: 10px"> 
			<input type="number" onkeypress="isInputNumber(event)" name="unitsprice[]"  class="inputv unitsprice" id="unitsprice" style="width: 150px;margin-left: 3px;">
	    </div>
	    <div align="left" class="col-sm-2" style="margin-top: 10px"> 
	    	<input type="text" name="totalvalue[]" disabled class="inputv totalvalueid" id="totalvalueid"  style="width: 150px;margin-left: 8px;background-color: ghostwhite;">
	    </div>
	    <div class="col-sm-1">
		
		</div>	
	</div>
</div>
<div class="modal fade" id="numberModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <p style="color: red; font-weight: bold;">Character dosen't support in here.</p>
          <p style="color: green; font-weight: bold;">Enter Number only Please.</p>
        </div>
        <div class="modal-footer" align="center">
          <button  type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
      </div>
      
    </div>
  </div>