<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Update Leave</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                
            </div>
            <div class="modal-body">
                <form class="floating-labels m-t-40" action="{{route('leave.update','test')}}"method="POST">
                    {{method_field('patch')}}
                    @csrf
                    <div class="form-group m-b-40 {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="input1" style="position: initial;">Leave Title</label>
                        <input type="hidden" class="form-control" id="mid" name="id">
                        <input type="text" class="form-control" id="mtitle" name="title">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>

                    <div class="form-group m-b-40">
                    <label for="input3" style="position: initial;">Number Of Days</label>
                        <input type="text" class="form-control" id="mnod" name="number_of_days">
                        <span class="bar"></span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect waves-light" style="width:50%" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="width: 50%;">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>