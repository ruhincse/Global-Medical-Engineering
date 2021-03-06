@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
@endpush

@section('page-content')
<div class="card">
    <div class="card-header">
        <h4>Add  Product Model</h4>
        

     

 
    </div>
    
           
    <div class="card-body">
        <form class="floating-labels m-t-40" action="{{route('product.setting.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
            {{csrf_field()}}
            <div class="row">

                  <div class="col-md-12">
                        <div id="emp-reg" class="emp-reg">
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="input1" name="model_name">
                                        <label for="input1">Product Model Name</label>
                                        <span class="text-danger">{{ $errors->first('model_name') }}</span>
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