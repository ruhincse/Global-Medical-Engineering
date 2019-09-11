<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales_Accounts\Supplier;
use App\Proudct;
use App\Productsmodel;
use App\Productbrand;
use App\Stockproduct;
class ProductController extends Controller
{

	public function __construct(){

		$this->middleware('auth');
	}


   public function ProductIndex(){

   		

   	$datas=Proudct::latest()->get();




   return view('product.index',compact('datas'));


   }

   public function ProductCreate(){
      $suppliers =Supplier::latest()->get();
      $models    =Productsmodel::latest()->get();
      $brands    =Productbrand::latest()->get();

   	

   	return view('product.create',compact('suppliers','models','brands'));
   }

   public function ProductStore(Request $request){
   	
   	 $request->validate([
               'pro_name'         =>'required',
               'pro_id'           =>'required',
               'pro_model'        =>'required',
               'pro_brand'        =>'required',
               'pro_lot'          =>'required', 
               'pro_ex_date'      =>'required',
               'description'      =>'required',   	 		
               'vendor'           =>'required',
               'pro_vat'          =>'required',               
               'manufacture_date' =>'required',

   	 ]);


       $product=new Proudct;
       
       $product->product_name     =$request->pro_name;
       
       $product->product_id       =$request->pro_id;
       
       $product->model_name       =$request->pro_model;
       
       $product->brand_name       =$request->pro_brand;
       
       $product->lot_no           =$request->pro_lot;   	
       
       $product->ex_date          =$request->pro_ex_date;
       $product->manufacture_date =$request->manufacture_date;   
       $product->vendor           =$request->vendor;
       $product->product_des      =$request->description;
         $product->vat=$request->vat;
       $product->save();

   	


   	 return redirect()->route('index.products')->with('status',"Product Successfully Created !");

   }


   public function EditProduct($id){
       
        
         
         $product   =Proudct::find($id);
         $models    =Productsmodel::latest()->get();
         $suppliers =Supplier::latest()->get();
          $brands    =Productbrand::latest()->get();
   	return view('product.edit',compact('product','models','suppliers','brands'));
   }

   public function UpdateProduct(Request $request, $id){


   	$request->validate([
             'pro_name'         =>'required',
             'pro_id'           =>'required',
             'pro_model'        =>'required',
             'pro_brand'        =>'required',
             'pro_lot'          =>'required', 
             'pro_ex_date'      =>'required',
             'description'      =>'required',          
             'vendor'           =>'required',
             'manufacture_date' =>'required',
             'pro_vat' =>'required',

   	 ]);

  

   	 $product=Proudct::find($id);
   	 												

   	 $product->product_name=$request->pro_name;
   	 $product->product_id=$request->pro_id;
   	 $product->model_name=$request->pro_model;
   	 $product->brand_name=$request->pro_brand;
   	 $product->lot_no=$request->pro_lot; 	
   	 $product->ex_date=$request->pro_ex_date;   	
   	 $product->manufacture_date=$request->manufacture_date;
       $product->vendor=$request->vendor;
   	 $product->product_des=$request->description;
       $product->vat=$request->pro_vat;
   	 $product->save();
   	 

   

   	 return redirect()->route('index.products')->with('status',"Product Successfully Updated !");




   }


   public function ViewProduct($id){
   		 $product=Proudct::find($id);

   		 return view('product.view',compact('product'));


   }

   public function DeleteProduct($id){

   	$product=Proudct::find($id)->delete();

 return redirect()->route('index.products')->with('status',"Product Successfully Deleted !");
   }


   // Product Setting Start Here

   public function IndexProudctSetting(){

   		

     $models=Productsmodel::latest()->get();


   		 return view('product.setting.index',compact('models'));
   }



   public function CreateProudctSetting(){

   	 return view('product.setting.create');


   }

   public function StoreProudctSetting(Request $request){

                
                $request->validate([
                'model_name'      =>'required'
                ]);
                
                $pro_model        =new Productsmodel;
                
                $pro_model->model =$request->model_name;
 				$pro_model->save();

 				return redirect()->route('product.setting.index')->with('status',"model Successfully Added");
   }


   public function EditProudctSetting($id){
 		


   	$model=Productsmodel::find($id);
  


   	return view('product.setting.edit',compact('model'));



   }

   public function UpdateProudctSetting(Request $request,$id){

   	$request->validate([
 					'model_name'=>'required'
 			]);


   			$model=Productsmodel::find($id);

   			 	$model->model=$request->model_name;
   				$model->save();

   				return redirect()->route('product.setting.index')->with('status',"model Successfully updated");


   }








   public function DeleteProudctSetting($id){

   	Productsmodel::find($id)->delete();

   	return redirect()->route('product.setting.index')->with('status',"model Successfully Deleted");

   }



   //Product setting for Brand



    public function IndexBrand(){

         

     $brands=Productbrand::latest()->get();


          return view('product.brand.index',compact('brands'));
   }

   public function CreateBrand(){

       return view('product.brand.create');

   }

   public function StoreBrand(Request $request){


            $request->validate([
               'brand_name'=>'required'
         ]);

            $brand=new Productbrand;

            $brand->name=$request->brand_name;
            $brand->save();


      return redirect()->route('product.brand.index')->with('status',"Brand Successfully Created!!");

   }

 public function EditBrand($id){

   $brand=Productbrand::find($id);
   return view('product.brand.edit',compact('brand'));

 }


 public function UpdateBrand(Request $request, $id){

              $request->validate([
               'brand_name'=>'required'
         ]);



   $brand=Productbrand::find($id);

    $brand->name=$request->brand_name;
    $brand->save();


      return redirect()->route('product.brand.index')->with('status',"Brand Successfully Updated!!");

 }

 public function DeleteBrand($id){

      Productbrand::find($id)->delete();


      return redirect()->route('product.brand.index')->with('status',"Brand Successfully Deleted!!");

 }


}
