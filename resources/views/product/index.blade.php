@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<style>
div.dataTables_wrapper div.dataTables_filter input
{
    width: 700px;
    background-color: #b1d5f5;
    height: 30px;
    padding-left: 10px;
}

}
</style>
@endpush

@section('page-content')
<div class="col-md-12">
<div class="row">
<div class="col-md-12">
        @if (session('status'))
                        <div class="alert alert-success" id="success-alert" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
    </div>
</div>
</div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h4>product Info</h3>
                </div>
                <div class="col-md-2">
                    <a href="{{route('create.products')}}" class="btn btn-primary btn-sm">Add New Product</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div style="overflow-x:auto;">
        <table id="example" class="table display nowrap" style="width:100%" >
        <thead>
            <tr>
                <th>Sl No</th>
                <th>Product Id</th>
                <th>Name</th>
                <th>Model </th>
                <th>Brand</th>
                <th>Lot No</th>
                             
               <!--  <th>Purchase Price</th>
                <th>Sales Price</th> -->
                <th>vat</th>
              <!--   <th>Product Qty</th> -->
                <th>Product Des</th>
                <th>Vendor Name</th>
                
                <th style="text-align: center">Action</th>
            </tr>
        </thead>
        <tbody>
                @foreach($datas as $key=>$data)

                <tr>

                <td>{{$key+1}}</td>
                <td>{{$data->product_id}}</td>
                <td>{{$data->product_name}}</td>
                <td>{{$data->model_name}}</td>

                <td>{{$data->brand_name}}</td>
                
                <td>{{$data->lot_no}}</td>

              
                <!-- <td>{{$data->purchase_price}}</td>
                <td>{{$data->sales_price}}</td> -->
                <td>{{$data->vat}}</td><!-- 
                <td>{{$data->product_qty}}</td> -->
                <td>{{str_limit($data->product_des,10)}}</td>
                 <td>{{$data->supplier->supplier_name}}</td>

                <td>
                    <a href="{{route('product.edit',$data->id)}}" class="btn-xs btn-warning"><i class="fa fa-pencil-alt"></i></a>

           <a href="{{route('product.view',$data->id)}}" class="btn-xs btn-primary"><i class="fa fa-eye"></i></a>

           <a href="{{route('product.delete',$data->id)}}"  onclick="return confirm('Are you sure  to delete this')"  class="btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
             
</tr>

                @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Sl No</th>
                <th>Product Id</th>
                <th>Name</th>
                <th>Model </th>
                <th>Brand</th>
                <th>Lot No</th>               
                <th>Purchase Price</th>
                <th>Sales Price</th>
                <th>vat</th>
                <th>Product Qty</th>
                <th>Product Des</th>
                <th>Vendor Name</th>
                <th style="text-align: center">Action</th>
            </tr>
        </tfoot>
    </table>
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
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );



// Delete
$('#delete').on('show.bs.modal',function(event){
        console.log('hello test');
        var button = $(event.relatedTarget)
        var title = button.data('mytitle')
        var id = button.data('myid')

        var modal =$(this)
        modal.find('.modal-body #mtitle').val(title);
        modal.find('.modal-body #mid').val(id);
    })

$(document).ready (function(){
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>

@endpush