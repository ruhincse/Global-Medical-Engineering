@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')

@endpush

@section('page-content')
<div class="col-lg-12">
<!-- row start -->
    <div class="row" >
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success"id="success-alert">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
        <div class="col-md-6">
        <!-- card -->
            <div class="card" style="height: 535px;">
                <!-- card body -->
                <div class="card-body">
                <h3>Create Leave</h3>
                <!-- Create department -->
                    @include('_partials_settings_.leave.create')
                </div><!-- end create department -->
                <!-- end card body -->
            </div><!-- end card -->
        </div> <!-- end col-7 -->

        <div class="col-md-6">
        <div class="card" style="height: 535px; color:black">
            <div class="card-body">
                <h4 class="card-title">Leave List</h4>
                @include('_partials_settings_.leave.list')
            </div>
        </div>
    </div>
    <!-- end row           -->
</div>
<!-- sample modal content -->
@include('_partials_settings_.leave.update_modal')
<!-- /.modal -->

@include('_partials_settings_.leave.delete_modal')
<!-- This is data table -->



@endsection
@push('end_js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
// list pagination by datatable
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    } );
} );
</script>
<script>
    // Edit
    $('#edit').on('show.bs.modal',function(event){
        console.log('hello test');
        var button = $(event.relatedTarget)
        var title = button.data('mytitle')
        var nod = button.data('mynod')
        var description = button.data('mydescription')
        var id = button.data('myid')

        var modal =$(this)
        modal.find('.modal-body #mtitle').val(title);
        modal.find('.modal-body #mnod').val(nod);
        modal.find('.modal-body #mdescription').val(description);
        modal.find('.modal-body #mid').val(id);
    })

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
