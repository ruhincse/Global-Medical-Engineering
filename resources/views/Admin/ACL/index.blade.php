@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0)">ACL</a></li>
@endpush
@section('page-content')
<div id="app">
@include('Admin.ACL.acl-modal')
<div class="row">
    <div class="col-md-12">
        <div class="card text-center">
            <div class="card-header">
                User Access List
            </div>
            <div class="card-body">
                <table class="table table-striped" id="app">
                    <thead>
                        <th>sl.no</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Role</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if(!empty($users))
                        @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
    
                            <td>
                                @foreach($user->roles as $role)
                                @if($role->name =="Admin")
                                <label class="label label-danger">{{$role->name}}</label>
                                @elseif($role->name =="Manager")
                                <label class="label label-warning">{{$role->name}}</label>
                                @elseif($role->name =="User")
                                <label class="label label-info">{{$role->name}}</label>
                                @endif
                                @endforeach
                            </td>
                            <td><a href="#" class="edit btn btn-warning" data-toggle="tooltip" data-original-title="Edit" data-toggle="modal" data-target="#myModal" data-id="{{$user->id}}" @click="editAccess('{{$user->id}}')"><i
                                        class="fa fa-pen-square"></i></a>&nbsp;
                                <a href="#" class="btn btn-danger" data-toggle="tooltip" data-original-title="Delete"><i
                                        class="fa fa-box"></i></a></td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="10">
                                <center><span>
                                        <h5>No data found</h5>
                                    </span></center>
                            </td>

                            @endif
                        </tr>
                    </tbody>

                </table>
    
            </div>
        </div>
    </div>
   
   </div>
</div>
@endsection
@push('end_js')
<script>
$(document).ready(function(){
  $(".edit").click(function(){
     $("#myModal").modal();
  });

  $("#update").click(function(){
    setTimeout(function(){
         let getStatus= localStorage.getItem('aclupdatestatus');  
         console.log(getStatus);
         if(getStatus=='true'){
             console.log('TRUE')
                $('#myModal').modal('toggle');
         } 
    }, 1000)
  
   
      
  });
  
});
</script>
<script>
  new Vue({
      el:"#app",
      data:{
          modalTitle:'ACL Modal',
          selected:[],
          options: [],
          username:'',
          email:'',
          roles:[],
          userId:'',
          errors:[],
          success : false,   
      },
      methods: {
      
          read(){
              axios.get('/axios/roles')
              .then(response=>{
                  this.options=response.data.roles
              })
              .catch(err=>{
                  console.log(err)
              })
          },

          editAccess:function(user){
             this.userId=user;
            axios.get('acl/'+user+'/edit')
            .then(response=>{
             this.userRoles(response.data.userData[0].roles);
                this.email=response.data.userData[0].email;
                this.username=response.data.userData[0].name;
            })
            .catch(err=>{
                console.log(err);
                
            })
            
          },
          userRoles:function(roles){
            this.roles=[];
            roles.forEach((role,index)=>{
                this.roles.push(role.id);
            })
            
         },
          updateAccess:function(e){
            axios.post('acl/' + this.userId+'/update', {
            email: this.email,
            username: this.username,
            roles: this.selected,
            _method: 'patch'
            })
            .then(function (response) {
                this.errors = [];
                this.success = true;
                localStorage.setItem('aclupdatestatus',response.data.success);
                location.reload()
                console.log(response.data);
            })
            .catch(error =>{
                this.errors = error.response.data.errors;
                this.success = false;
                localStorage.setItem('aclupdatestatus',this.success = false);
                console.log(error.response);            
            });
          }
      },
      computed: {
        datauser:function(){
          this.selected=this.roles
        },
        
    },
      mounted() {
          this.read();

      },
      
  })
</script>

@endpush