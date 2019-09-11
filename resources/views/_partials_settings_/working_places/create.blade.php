<form class="floating-labels m-t-40" action="{{route('workingplace.store')}}" method="POST">
@csrf
    <div class="form-group m-b-40">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label>Select Division</label>

            <select class="form-control" style="padding: 0px 10px 10px 10;" name="divison_id">
                <option>Select Division</option>
                @foreach($divisions as $division)
                <option  value="{{ $division->id }}">{{$division->name}}</option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

    <div class="form-group m-b-40 {{ $errors->has('name') ? 'has-error' : '' }}">
        <input type="text" class="form-control" id="input3" name="name">
        <label for="input3">Place Name</label>
        <span class="text-danger">{{ $errors->first('name') }}</span>
    </div>

    <div class="form-group m-b-40">
        <input type="text" class="form-control" id="input3" name="code">
        <span class="bar"></span>
        <label for="input3">Code</label>
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
