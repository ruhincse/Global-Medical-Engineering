<?php

namespace App\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stockproduct;
use App\Proudct;
use DB;

class StockController extends Controller
{
    public function index(){

        $datas=Stockproduct::latest()->get();

    	
    	return view('stock.index',compact('datas'));



    }

    public function create(){


            $products=Proudct::latest()->get();

       return view('stock.create',compact('products'));
    }

    public function store(Request $request){

         $request->validate([

            'pro_id'=>'required',
            'purchase_price'=>'required',
            'sales_price'=>'required',
            'qty'=>'required',
            'date'=>'required',


         ]);


         $stockproduct= new Stockproduct();
         $stockproduct->pro_id=$request->pro_id;
         $stockproduct->date=$request->date;
         $stockproduct->purchase_price=$request->purchase_price;
         $stockproduct->sales_price=$request->sales_price;
         $stockproduct->qty=$request->qty;
         $stockproduct->total=$request->qty*$request->sales_price;
         $stockproduct->save();

     

     return redirect()->route('index.stock.product')->with('status',"Product Successfully Stocked !");
     
    }

    public function edit($id){

          $products=Proudct::latest()->get();

            $stock_pro=Stockproduct::find($id);


  return view('stock.edit',compact('products','stock_pro'));

    }


    public function update(Request $request, $id){

        $request->validate([            
            'purchase_price'=>'required',
            'sales_price'=>'required',
            'qty'=>'required',


         ]);



       $stock_pro= Stockproduct::find($id)->first();

       $stock_pro->purchase_price=$request->purchase_price;
       $stock_pro->sales_price=$request->sales_price;
       $stock_pro->qty=$request->qty;
       $stockproduct->total=$request->qty*$request->sales_price;
       $stock_pro->save();

  return redirect()->route('index.stock.product')->with('status',"Stock Product Successfully Updated !");


    }


    public function delete($id){

        Stockproduct::find($id)->delete();
 
    return redirect()->route('index.stock.product')->with('status',"Stock Product Successfully Deleted !");
    }



    public function stockreports(){


            $datas= Stockproduct::groupBy('pro_id')
            ->selectRaw('count(*) as total, pro_id')
           
->get();
  return view('stock.reports',compact('datas'));
            

    }

}
