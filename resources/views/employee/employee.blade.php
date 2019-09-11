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
        @if ($message = Session::get('success'))
            <div class="alert alert-success "id="success-alert">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
</div>
</div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h4>Employee Information</h3>
                </div>
                <div class="col-md-2">
                    <a href="/employeeadd" class="btn btn-primary btn-sm">Add New Employee</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Si.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Designation</th>
                <th style="text-align: center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($testuser as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->dname}}</td>
                <td>{{$user->desname}}</td>
                <td style="text-align: center;">
                    <a href="{{route('profile',$user->id)}}" class="btn btn-primary btn-sm"title="View Profile"><i class="ti-eye"></i></a> 
                    
                    <a href="{{route('employee.edit',$user->id)}}" class="btn btn-warning btn-sm" title="Edit Info"><i class="ti-settings"></i></a> 


                    <a href="#" class="btn btn-danger btn-sm" data-myid="{{$user->id}}" data-mytitle="{{$user->name}}" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>
                    
                </td>
            </tr>
            @include('employee._partials_employee_add.deletemodal')
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Si.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Designation</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </tfoot>
    </table>
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