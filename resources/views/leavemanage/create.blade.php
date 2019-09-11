@extends('layouts.app-layout')
@section('title','Leave Management')
@push('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0)">Leave-Management</a></li>
@endpush
@section('page-content')
<div id="app">
<div class="row">
  <div class="col-md-12">
  <div class="card">
  <div class="card-header">@{{cardTitle}}
  <a href="{{route('leavem.index')}}" rel="noopener noreferrer" class="btn btn-info fa-pull-right" ><i class="fa fa-plus"> New Leave Entry</i></a>
  </div>
  <div class="card-body">
      <form action="{{route('leavem.store')}}" method="post">
       @csrf
       <div class="row">
        <div class="col-md-6">
        <div class="form-group {{ $errors->has('userSearch') ? 'has-error' : '' }}">
        <label for="userSearch">User <span style="color:red; font-weight:bold">*</span></label>
        <input type="text" name="userSearch" id="name" class="form-control" v-on:keyup.enter="userSearch" v-on:keydown="userSearch" v-model="username">
        <span class="text-danger">{{ $errors->first('userSearch') }}</span>
         <ul id="userlist" class="list-group"></ul>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
       
        <div class="form-group {{ $errors->has('paid') ? 'has-error' : '' }}"> 
        <h5>Select Leave Mode </h5>
        <div class="btn-group" data-toggle="buttons">

        <label class="btn btn-primary">
            <div class="custom-control custom-radio">
                <input type="radio" id="" name="paid" class="custom-control-input" value="paid">
                <label class="custom-control-label" for="customRadio5">Paid</label>
            </div>
        </label>
        <label class="btn btn-primary">
            <div class="custom-control custom-radio">
                <input type="radio" id="" name="paid" class="custom-control-input" value="unpaid">
                <label class="custom-control-label" for="customRadio6">Unpaid</label>
            </div>
        </label>
    </div>
    <span class="text-danger">{{ $errors->first('paid') }}</span>
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="leave">Leave Type</label>
            <select name="leave_type" id="leave_type"  class="form-control leave">
               
            </select>
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="fromdate">From <span style="color:red; font-weight:bold">*</span></label>
            <input type="text" name="fromdate" id="fromdate" class="form-control">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="fromdate">To <span style="color:red; font-weight:bold">*</span></label>
            <input type="text" name="todate" id="todate" class="form-control">
          </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
         <input type="hidden" name="days_no" id="days_no" class="form-control">
        </div>
        </div>
        </div>
        <div class="row">
         <div class="col-md-6">
         <div class="form-group">
         <label for="remarks">Remarks</label>
         <textarea name="remarks" id="" cols="30" rows="5" class="form-control"></textarea>
         </div>
        
         </div>
        </div>
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-4">
          <span class="alert-danger customMessage strong"></span>
          </div>
        </div>
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
        <input type="submit" value="Approve" class="btn btn-info" id="submit">        
        </div>

        </div>
      </form>
     </div>
   </div>
  </div>
</div>
</div>
@endsection
@push('end_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
<script>
 new Vue({
     el:"#app",
     data:{
        cardTitle:'Leave Create Management ',
        userlist:[],
        username:'',
     },
     methods:{
      userSearch: function(){
        if (this.username.length >0) {
        }
        
      }
    }

 })
</script>
<script>
$(document).ready(function(){
  $('#name').keyup(function(){
    var query =$(this).val();
    if(query !=''){
      $.ajax({
        url:"{{route('leavem.usersearch')}}",
        method:"POST",
        data:{query:query,_token: "{{ csrf_token() }}"},
        success:function(data)
        {
          $('#userlist').fadeIn();
          $('#userlist').html(data);

        }
      });

      $(document).on('click', 'li', function(){  
       
        $('#name').val($(this).text());  
        $('#userlist').fadeOut();  
        var user_id= $('#name_id').val();
        $.ajax({
          url:"{{route('leavem.leavesearch')}}",
        method:"POST",
        data:{_token: "{{ csrf_token() }}",userId:user_id},
        success:function(data)
        {
          $('#leave_type').empty();
          if(data.leaves === undefined || data.leaves.length == 0){
            alert("This User Has no Leave");
            window.location.replace("{{route('leavem.index')}}");
          }
          else{
             $.each(data.leaves,function(index,value){

            $('#leave_type').append('<option value="'+value.id+'" >'+value.title+"-"+value.number_of_days+'</option>');
            //console.log(value)
          })
          }
         
        }
        })
    }); 
    }
  })

 
})
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
    var p1 = "success";
  $('#fromdate').daterangepicker({
      locale: {
        format: 'DD-MMM-YYYY',
        startView: "years",
      }, 
    singleDatePicker: true, "showDropdowns": true, });

    $('#todate').daterangepicker({
      locale: {
        format: 'DD-MMM-YYYY',
        startView: "years",
      }, 
    singleDatePicker: true, "showDropdowns": true,
    
     });

     $('#todate').focusout(function(){
        var radio_value=$('input[name=paid]:checked').val();
        if (radio_value == "unpaid") {
        // Disable your roomnumber element here
            $('#leave_type').attr('disabled', 'disabled');
            console.log('This is for unpaid leave')
        } else {
          console.log('This is for paid leave')

            // Re-enable here I guess
            $('#leave_type').removeAttr('disabled');
            var todate =$(this).val();
        var fromdate =$('#fromdate').val();
          var diff=moment(todate).diff(fromdate,'days');
           var leave_type=$('#leave_type').val();
           var user_id = $('#name_id').val();
           $('#days_no').val(diff);
        
            $.ajax({
                url:"{{route('leavem.calculate')}}",
                method:"POST",
                data:{_token: "{{ csrf_token() }}",days:diff,leave_type:leave_type,user_id:user_id},
                success:function(response){
                  let used_days=response.used_total_days;
                  let total_days=response.total_days;
                  let rest_days= parseInt(total_days)-parseInt(used_days);
                  if(rest_days >= diff)
                  {
                    //alert('Go!!!');
                    console.log(rest_days);
                    
                  }
                  else if(rest_days < diff)
                  {
                     var message="This User have "+rest_days+" Days But requested for "+diff+" days";
                    $('.customMessage').html(message);
                    $('#submit').attr('disabled',true);

                  }

                }
            })
        }
        
        
     });


     $('form input:radio').change(function(){
      if ($(this).val() == "unpaid") {
        // Disable your roomnumber element here
        $('#leave_type').attr('disabled', 'disabled');
    } else {
        // Re-enable here I guess
        $('#leave_type').removeAttr('disabled');
    }
     })


     $('#app').click(function(){
        $('#userlist').hide();
     })
    
});

</script>

@endpush