<form class="floating-labels m-t-40" action="{{route('leave.store')}}"method="POST">
@csrf
    <div class="form-group m-b-40 {{ $errors->has('title') ? 'has-error' : '' }}">
        <input type="text" class="form-control" id="input1" name="title">
        <label for="input1">Leave Title</label>
        <span class="text-danger">{{ $errors->first('title') }}</span>
    </div>
    
    <div class="form-group m-b-40">
        <input type="text" class="form-control" id="input3" name="number_of_days">
        <span class="bar"></span>
        <label for="input3">Number Of Days </label>
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