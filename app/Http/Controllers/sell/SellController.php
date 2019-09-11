<?php

namespace App\Http\Controllers\sell;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales_Accounts\Client;
use App\Proudct;
use App\Stockproduct;
use App\Productsell;

class SellController extends Controller
{
    public function __construct(){

    	$this->middleware('auth');
    }


    public function index(){

    	

    	return view('sell.index');
    }

    public function create(){

    	$customers=Client::latest()->get();
    	$proudcts=Proudct::latest()->get();

    	/*return view('sell.invoice',compact('customers','proudcts'));*/

        return view('sell.create',compact('customers','proudcts'));
    }




    public function ProductPrice($id){

        $pro_vat=Proudct::find($id);

    	$proudcts=Stockproduct::where('pro_id',$id)->get();

    	$sells_product=Productsell::where('product_id',$id)->sum('product_qty');

    	$total_sell_amount=Productsell::where('product_id',$id)->sum('total');


    	
    	$total=0 ;
    	$total_pro_qty=0;

    	 foreach ($proudcts as $key => $pro) {
    	 	$total+=$pro->total;  	 
    	 	$total_pro_qty+=$pro->qty;  	 

    	

    	 }

    	  $reminder_balance=$total-($total_sell_amount)?? 0;
    	  $reminder_pro=$total_pro_qty-($sells_product)?? 0;

    	$unit_price= ($reminder_balance/$reminder_pro);

            $data=[];

            $data['unit_price']=$unit_price;
            $data['vat']=$pro_vat->vat;            
    	
    	
return response($data);
    	
    	
    }


    public function CartProducts(Request $request){

       if ($request->ajax()) {

            $product = Proudct::find($request->pro_id);


            $output  = '<tr id="test_row_'.$request->pro_id.'">';



            $output .= '<input type="hidden" name="pro_id[]" value="'.$request->pro_id.'" />';
            $output .= '<td> '.$product->product_name.' </td>';
            $output .= '<td >'.$request->qty.' <input type="number" name="pro_qty[]" value="'.$request->qty.'" />';
            $output .= ' </td> <td >'.$request->unit_price.'</td> <input type="hidden" name="unit_price[]" value="'.$request->unit_price.'" /> ';
            $output .= '<td >'.$request->vat.'</td> <input type="hidden" name="vat[]" value="'.$request->vat.'" /> ';
            $output .= '<td class="test-price" >'.$request->total.'</td> <input type="hidden" name="pro_total[]" value="'.$request->total.'" /> ';
        
            $output .= '<td width="10%">
                        <button type="button" class="btn-remove btn btn-sm btn-danger"  data-testid="'.$request->pro_id.'">
                            Delete
                        </button>
                        </td>';
            $output .= '</tr>';


           


            echo json_encode($output);
        }

    }

public function StoreSellProducts(Request $request){


        foreach ($request->pro_id as $key => $product) {

                echo ' product key '. ' ='  .$request->pro_id[$key] ;

            echo  ' product vat '. $product[$key].  '= '  .$request->vat[$key];

             echo  ' product unit price '. $product[$key].  '= '  . $request->unit_price[$key];

              echo  ' product qty '. $product[$key]. ' ='  .  $request->pro_qty[$key];

          echo  ' product total for'. $product[$key]. ' ='  .  $request->pro_total[$key];

        }

        echo'Total'. $request->total_price .'<br>';
   echo $request->customer_pay;

}
}
