<?php

namespace App\Http\Controllers\Sales_Accounts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales_Accounts\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(5);
        return view('sales_accounts.supplier.index',compact('suppliers'));
    }

    public function create()
    {
        return view('sales_accounts.supplier.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'code' => 'required|unique:suppliers',
            'supplier_name' => 'required',
            'supplier_address' => 'required',
            'supplier_phone' => 'required| regex:/^[0-9]+$/'
        ]);

        $supplier = new Supplier;
        $supplier->code = $request->code;
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->supplier_phone = $request->supplier_phone;
        
        if($request->has('supplier_image')){
            $image = $request->file('supplier_image');
            $imageName = time().'.'.$request->file('supplier_image')->getClientOriginalExtension();
            $request->file('supplier_image')->move(public_path('upload'), $imageName);
            $supplier->supplier_image = $imageName;
        }
         
        $supplier->save();

        return redirect()->route('acc.supplier_list')->with('status',"Successfully Created");
    }


    public function EditSupplier($id){

         $supplier= Supplier::find($id);

        return view('sales_accounts.supplier.edit',compact('supplier'));
    }


    public function UpdateSupplier(Request $request , $id){

        $this->validate($request,[
            'code' => 'required|unique:suppliers',
            'supplier_name' => 'required',
            'supplier_address' => 'required',
            'supplier_phone' => 'required| regex:/^[0-9]+$/'
        ]);


                 $supplier= Supplier::find($id);
                 $supplier->code = $request->code;
                $supplier->supplier_name = $request->supplier_name;
                $supplier->supplier_address = $request->supplier_address;
                $supplier->supplier_phone = $request->supplier_phone;


         if($request->has('supplier_image')){
            unlink('upload/'.$supplier->supplier_image);

            $image = $request->file('supplier_image');
            $imageName = time().'.'.$request->file('supplier_image')->getClientOriginalExtension();
            $request->file('supplier_image')->move(public_path('upload'), $imageName);
            $supplier->supplier_image = $imageName;
        }

        else{

             $supplier->supplier_image = $supplier->supplier_image;
        }
          $supplier->save();

           return redirect()->route('acc.supplier_list')->with('status',"Successfully updated");



    }


    public function ViewSupplier($id){
          $supplier= Supplier::find($id);

          return view('sales_accounts.supplier.show',compact('supplier'));
    }

    public function DeleteSupplier($id){

        $supplier= Supplier::find($id);

        unlink('upload/'.$supplier->supplier_image);

         $supplier->delete();

         return redirect()->route('acc.supplier_list')->with('status',"Supplier Successfully Deleted!");

    }
}
