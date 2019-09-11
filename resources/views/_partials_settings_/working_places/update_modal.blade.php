<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Update Working place</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <form class="floating-labels m-t-40" action="{{route('workingplace.update','test')}}"method="POST">
                {{method_field('patch')}}
                @csrf
                <div class="form-group m-b-40">
                  <label for="input1" style="position: initial;">Division name</label>
                    <select class="form-control" style="padding: 0px 10px 10px 10;" name="divison_id" id="mySelect">
                        <option id="demo" value=""></option>
                        @foreach($divisions as $division)
                        <option  value="{{ $division->id }}">{{$division->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group m-b-40 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="input1" style="position: initial;">Place name</label>
                        <input type="hidden" class="form-control" id="mid" name="id">
                        <input type="text" class="form-control" id="mtitle" name="name">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>

                    <div class="form-group m-b-40">
                    <label for="input3" style="position: initial;">Place Code</label>
                        <input type="text" class="form-control" id="mcode" name="code">
                        <span class="bar"></span>
                    </div>

                    <div class="form-group m-b-5">
                    <label for="input7" style="position: initial;">Description</label>
                        <input type="textarea" class="form-control" rows="4" id="mdescription" name="description">
                        <span class="bar"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect waves-light"style="width: 50%;" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="width: 50%;">UPDATE</button>
                        <!-- <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button> -->
                    </div>
            </form>
            </div>

        </div>
    </div>
</div>
