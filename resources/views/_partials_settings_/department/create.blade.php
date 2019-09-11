<form class="floating-labels m-t-40" action="{{route('department.store')}}"method="POST">
@csrf
    <div class="form-group m-b-40 {{ $errors->has('name') ? 'has-error' : '' }}">
        <input type="text" class="form-control" id="input1" name="name">
        <label for="input1">Department name</label>
        <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>
    
    <div class="form-group m-b-40">
        <input type="text" class="form-control" id="input3" name="code">
        <span class="bar"></span>
        <label for="input3">Department Code</label>
    </div>
    
    <div class="form-group m-b-5">
        <textarea class="form-control" rows="4" id="input7" name="description"></textarea>
        <span class="bar"></span>
        <label for="input7">Description</label>
    </div>
    <!-- button row -->
    <div class="class row" style="margin-top:20px;">
        <div class="class col-md-4"></div>
        <div class="class col-md-4">
        <button type="submit" class="btn btn-primary" style="width: 100%;">SAVE</button>
        </div>
        <div class="class col-md-4"></div>
        </div>
</form>