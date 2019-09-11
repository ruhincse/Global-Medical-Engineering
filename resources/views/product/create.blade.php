@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
@endpush

@section('page-content')
<div class="card">
    <div class="card-header">
        <h4>Add New Product</h4>
        

     

 
    </div>
    
           
    <div class="card-body">
        <form class="floating-labels m-t-40" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
            {{csrf_field()}}
            <div class="row">

                  <div class="col-md-12">
                        <div id="emp-reg" class="emp-reg">
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input1" name="pro_name">
                                        <label for="input1">Product name</label>
                                        <span class="text-danger">{{ $errors->first('pro_name') }}</span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input1" name="pro_id">
                                        <label for="input1">Product Id</label>
                                        <span class="text-danger">{{ $errors->first('pro_id') }}</span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                       
                                             <!-- <label for="">Model <span class="text text-danger">*</span></label> -->
                                 <select name="pro_model"  class="form-control ">
                                    <option value="">-Select Model-</option>
                                    @foreach($models as $model)
                                    <option value="{{$model->id}}">{{$model->model}}</option>
                                    @endforeach
                                 </select>
                                <span class="text text-danger">{{$errors->first('pro_model')}}</span>
                                    </div>

                                  


                                    
                                </div>               
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input3" name="pro_lot">
                                        <label for="input3">Lot No.</label>
                                          <span class="text text-danger">{{$errors->first('pro_lot')}}</span>
                                    </div>

                                    
                                     <div class="form-group m-b-40 " >
                                           
                                            <!--  <label for="">Vendor <span class="text text-danger">*</span></label> -->
                                 <select name="pro_brand"  class="form-control ">
                                    <option value="">-Select Brand-</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                 </select>
                                <span class="text text-danger">{{$errors->first('vendor')}}</span>


                                    </div>


                                      <div class="form-group m-b-40 " >
                                           
                                            <!--  <label for="">Vendor <span class="text text-danger">*</span></label> -->
                                 <select name="vendor"  class="form-control ">
                                    <option value="">-Select Vendor-</option>
                                    @foreach($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                    @endforeach
                                 </select>
                                <span class="text text-danger">{{$errors->first('vendor')}}</span>


                                    </div>



<!-- 
                                     <div class="form-group m-b-40 " >

                                        

                                       <input type="text" class="form-control" id="input4" name="pro_price">
                                        <label for="input4">Product price</label>
                                       <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                                    </div> -->




                                    <!-- <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input4" name="dis_rate">
                                        <label for="input4">Discount Rate</label>
                                      <span class="text-danger">{{ $errors->first('dis_rate') }}</span>
                                    </div>

                                    <div class="form-group m-b-40 " >
                                        

                                       <input type="text" class="form-control" id="input4" name="dis_amount">
                                        <label for="input4">Discount Amount</label>
                                       <span class="text-danger">{{ $errors->first('dis_amount') }}</span>
                                    </div>
 -->


                                   

                                </div>               
                            </div>
                        </div>   


                        <div id="emp-profile" class="emp-profile" style="display:">
                         
                            <div class="row">
                                <div class="col-md-6">


                                   

                                     <!-- <div class="form-group m-b-40 " >

                                        

                                       <input type="text" class="form-control" id="input4" name="pro_qty">
                                        <label for="input4">Product Quantity</label>
                                       <span class="text-danger">{{ $errors->first('pro_qty') }}</span>
                                    </div> -->

                                     






                                   <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input2" name="pro_vat" placeholder=" vat in  % ">
                                        <label for="input2">Vat</label>
                                        <span class="text-danger">{{ $errors->first('pro_vat') }}</span>
                                    </div>



                                    
                                    <div class="form-group m-b-5">
                                        <textarea class="form-control" rows="4" id="input7" name="description"></textarea>
                                        <span class="bar"></span>
                                        <label for="input7">Description</label>
                                           <span class="text-danger">{{ $errors->first('description') }}</span>
                                    </div>

                                   


                                   

                                    


                                    

                                   
                                                                
                                </div>    

                                <div class="col-md-6">

                                     


                                    <!-- <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input2" name="sales_price">
                                        <label for="input2">Sales Price</label>
                                        <span class="text-danger">{{ $errors->first('sales_price') }}</span>
                                    </div> -->

                                    <div class="form-group m-b-40 " >
                                        <input type="date" class="form-control" id="input6" name="manufacture_date">
                                        <label for="input6">Manufacture date</label>
                                        
                                         <span class="text-danger">{{ $errors->first('manufacture_date') }}</span>
                                    </div>
                                   


                                    <div class="form-group m-b-40 " >
                                        <input type="date" class="form-control" id="input6" name="pro_ex_date">
                                        <label for="input6">Expire date</label>
                                        
                                         <span class="text-danger">{{ $errors->first('pro_ex_date') }}</span>
                                    </div>
                                   

                                     
                                     

                                   
                                </div>               
                            </div>
                        </div>
                        
                        
                        <!-- button row -->
                        <div class="class row save" style="margin-top:20px; display:;">
                            <div class="class col-md-4"></div>
                            <div class="class col-md-4">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">SAVE</button>
                            </div>
                            <div class="class col-md-4"></div>
                        </div>
                    </div>
               
            </div>
        </form>
    </div>
</div>
@endsection

@push('end_js')
<!-- jQuery file upload -->
<script src="{{asset('js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
<script type="text/javascript">  
    $(document).ready(function(){
        $(".test").click(function()
            {
                $(".emp-reg").css("display","none");
                $(".emp-profile").css("display","");
                $(".next2").css("display","");
                $(".test").css("display","none");
            })

        $(".test1").click(function()
        {
            $(".emp-reg").css("display","none");
            $(".emp-profile").css("display","none");
            $(".emp-history").css("display","");
            $(".next3").css("display","");
            $(".save").css("display","");
            $(".next2").css("display","none");
            $(".test").css("display","none");
        })

        $(".ptest1").click(function()
        {
            $(".emp-reg").css("display","");
            $(".emp-profile").css("display","none");
            $(".emp-history").css("display","none");
            $(".save").css("display","none");
            $(".next2").css("display","none");
            $(".test").css("display","");
        })
        $(".ptest2").click(function()
        {
            $(".emp-reg").css("display","none");
            $(".emp-profile").css("display","");
            $(".emp-history").css("display","none");
            $(".save").css("display","none");
            $(".next2").css("display","");
            $(".test").css("display","none");
        })

        $(".savebbtn").click(function()
        {
            $(".emp-reg").css("display","");
            $(".emp-profile").css("display","");
            $(".emp-history").css("display","");
            $(".save").css("display","");
            $(".next2").css("display","none");
            $(".test").css("display","none");
        })
        $('#leave').click(function(){
            console.log($(this).val())
        })
    })
</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endpush