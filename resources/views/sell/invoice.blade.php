@extends('layouts.app-layout')
@section('page-content')
<div class="container">
	<form method="Post" action="">
		<div class="row">
	    	<div class="col-sm-4">
	    		<label class="text-dark"> Ref :</label>
	    		<input type="text" name="ref">
	    	</div>
	    	<div class="col-sm-4 ">      
	      		<h4 style="font-weight: bold" class="text-dark" align="center"><u>INVOICE</u></h4>    
	    	</div>
	    	<div class="col-sm-3 text-dark"> 
	      		<label align="center" >Date :</label> 
	      		<input type="Date"  name="date">
	    	</div>
		</div>
		<br>		      
	  <div class="row portinfo">
	  	@include('sell.invoicepage.portinfo') 
	  </div>
		<div class="row">
			<div class="col-sm-10">				
			</div>			
			<div>
				<button   class="btn btn-success add_form_field pull-right"><span style="font-size:16px; font-weight:bold;">Add new Field</span></button>
			</div>
		</div>
		<br>
		<div class="hr">
		</div>
		<div class="productinfo">
			@include('sell.invoicepage.productinfo')
		</div>		
		
		<div class="hr">
		</div>
		<div class="productresult">
			@include('sell.invoicepage.productresult')
		</div>
		<div class="row">
			<div class="col-sm-7">
				
			</div>
			<div class="col-sm-5">
					<hr>
				<!-- <h3 align="left">Salim Brothers Int’l Limited </h3> -->
			</div>
		</div>
		<div class="hr1">
		</div>
		<p class="footer" align="center" >
		</p>
	</form>
	

	<div id="container"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">

    // Data collect from StockProducts Table for Unti prices

    $("#product").change(function(){
        var pro = $(this).val();

      $.ajax({
        type:"GET",
                     
        url : '{{('/sell/product/price')}}/'+pro,                
       
        success : function(data) {
         
            /*console.log(data)*/

                var obj=$.parseJSON(data);

               $('#unitsprice').val(obj);
        },
       
    });


       
});

	$(document).ready(function() {
		// add dynamic infut field
    var max_fields      = 10;
    var wrapper         = $(".container1");
    var add_button      = $(".add_form_field");      
    var x = 1;
    $(add_button).click(function(e){

        e.preventDefault();
        if(x < max_fields){
            x++;          
            $(wrapper).append('<div class="row ">                                                       <div align="left" class="col-sm-4" style="margin-top: 10px">                           <select class="form-control p-input text-dark" name="name="dog[]" required=""><option value="0">Select Product</option>@foreach($proudcts as $proudct )<option value="{{$proudct->id}}">{{$proudct->product_name}}</option>@endforeach</select></div> <div align="left" class="col-sm-1" style="margin-top: 10px">                           <input type="number" onkeypress="isInputNumber(event)" name="qty[]" class="inputv qty" id="qtyid" style="width: 70px;margin-left: 15px;"></div>                                                                                                                                                   <div align="left" class="col-sm-2" style="margin-top: 10px">                           <input type="number" onkeypress="isInputNumber(event)" name="unitsprice[]" class="inputv unitsprice" id="unitsprice" style="width: 150px;margin-left:18px"></div>                                                           <div align="left" class="col-sm-2" style="margin-top: 10px">                           <input type="text" name="totalvalue[]" disabled class="inputv totalvalueid" id="totalvalueid"  style="width: 150px;background-color: ghostwhite;margin-left:22px">   </div><div class="col-sm-1 delete"><a href="#" style="height:30px;width: 55px;margin-left: 3px;padding-top:4px;margin-top: 10px;padding-left: 2px;" class="btn btn-danger ">Delete</a>  </div> </div>'); 
            //add input box
        }
  else
  {
  alert('You Reached the limits')
  }

    var dom=$('.row').children().children("#qtyid");
    //console.log(dom);
    });
  //delete dynamically create input field
    $(wrapper).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
        total();
    })   


    	//calculate product quantity and unit price
         $('#goods_container').on('input','.qty',function(){

         		// $('.totalvalueid').attr("value", "0");
         	   var parent = $(this).closest('.row');
         	   // var selfvalue= $(this).val();
         	   var qt=parent.find('.qty').val();
         	   var up=$('#unitsprice').val();
               console.log(up);
         	   var totalvalueid=parseFloat(qt)* parseFloat(up);
         	   
         	   parent.find('.totalvalueid').val(parseFloat(qt)* parseFloat(up));

         	   total();

         });



         //calculate total value
         function total(){
         	var total = 0;
         	$(".totalvalueid").each(function(){
         		var totalvalueid = $(this).val()-0;
         		total +=totalvalueid;
         		$('.total').val(total);
         		// console.log(total);
         	})
         	 $('.total').val(total);
         }


}); //end document function

function isInputNumber(evt){
	var cha = String.fromCharCode(evt.which);
	if (!(/[0-9]/.test(cha)))
	{
	$('#numberModal').modal('show');
	}
}









    var iWords = ['zero', ' one', ' two', ' three', ' four', ' five', ' six', ' seven', ' eight', ' nine'];
    var ePlace = ['ten', ' eleven', ' twelve', ' thirteen', ' fourteen', ' fifteen', ' sixteen', ' seventeen', ' eighteen', ' nineteen'];
    var tensPlace = ['', ' ten', ' twenty', ' thirty', ' forty', ' fifty', ' sixty', ' seventy', ' eighty', ' ninety'];
    var inWords = [];

    var numReversed, inWords, actnumber, i, j;

    function tensComplication() {
        if (actnumber[i] == 0) {
            inWords[j] = '';
        } else if (actnumber[i] == 1) {
            inWords[j] = ePlace[actnumber[i - 1]];
        } else {
            inWords[j] = tensPlace[actnumber[i]];
        }
    }

    function convertAmount() {
        var numericValue = document.getElementById('totalvalue[]').value;
        numericValue = parseFloat(numericValue).toFixed(2);

        var amount = numericValue.toString().split('.');
        var taka = amount[0];
        var paisa = amount[1];
        document.getElementById('container').innerHTML = convert(taka) +" taka and "+ convert(paisa)+" paisa only";
    }
    function convert(numericValue) {
        inWords = []
        if(numericValue == "00" || numericValue =="0"){
            return 'zero';
        }
        var obStr = numericValue.toString();
        numReversed = obStr.split('');
        actnumber = numReversed.reverse();


        if (Number(numericValue) == 0) {
            document.getElementById('container').innerHTML = 'BDT Zero';
            return false;
        }

        var iWordsLength = numReversed.length;
        var finalWord = '';
        j = 0;
        for (i = 0; i < iWordsLength; i++) {
            switch (i) {
                case 0:
                    if (actnumber[i] == '0' || actnumber[i + 1] == '1') {
                        inWords[j] = '';
                    } else {
                        inWords[j] = iWords[actnumber[i]];
                    }
                    inWords[j] = inWords[j] + '';
                    break;
                case 1:
                    tensComplication();
                    break;
                case 2:
                    if (actnumber[i] == '0') {
                        inWords[j] = '';
                    } else if (actnumber[i - 1] !== '0' && actnumber[i - 2] !== '0') {
                        inWords[j] = iWords[actnumber[i]] + ' hundred';
                    } else {
                        inWords[j] = iWords[actnumber[i]] + ' hundred';
                    }
                    break;
                case 3:
                    if (actnumber[i] == '0' || actnumber[i + 1] == '1') {
                        inWords[j] = '';
                    } else {
                        inWords[j] = iWords[actnumber[i]];
                    }
                    if (actnumber[i + 1] !== '0' || actnumber[i] > '0') {
                        inWords[j] = inWords[j] + ' thousand';
                    }
                    break;
                case 4:
                    tensComplication();
                    break;
                case 5:
                    if (actnumber[i] == '0' || actnumber[i + 1] == '1') {
                        inWords[j] = '';
                    } else {
                        inWords[j] = iWords[actnumber[i]];
                    }
                    if (actnumber[i + 1] !== '0' || actnumber[i] > '0') {
                        inWords[j] = inWords[j] + ' lakh';
                    }
                    break;
                case 6:
                    tensComplication();
                    break;
                case 7:
                    if (actnumber[i] == '0' || actnumber[i + 1] == '1') {
                        inWords[j] = '';
                    } else {
                        inWords[j] = iWords[actnumber[i]];
                    }
                    inWords[j] = inWords[j] + ' crore';
                    break;
                case 8:
                    tensComplication();
                    break;
                default:
                    break;
            }
            j++;
        }


        inWords.reverse();
        for (i = 0; i < inWords.length; i++) {
            finalWord += inWords[i];
        }
        return finalWord;
    }



  


</script>

@endsection