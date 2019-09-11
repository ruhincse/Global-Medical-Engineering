
	<div class="row">
	  	<div >
	  		<label style="margin-top: 5px; margin-left: 20px" class="text-dark">Select Client</label>
	  	</div>
	  	<div class="col-sm-6">
	  		<select class="form-control p-input text-dark" name="customer" required="">
	  			<option value="0">Select Client</option>

	  			@foreach($customers as $customer )

	  			<option value="{{$customer->id}}">{{$customer->name}}</option>

	  			@endforeach
	  			
		    </select>
	  	</div>
	</div>

	 