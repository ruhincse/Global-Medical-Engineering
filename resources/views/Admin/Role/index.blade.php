@extends('layouts.app-layout')
@section('title','Home|Settings')
@section('content-title','GMEBD')
@push('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0)">Settings</a></li>
<li class="breadcrumb-item"><a href="javascript:void(0)">Role</a></li>
@endpush
@section('page-content')
<div id="app">
@include('Admin.Role.role-modal')
<div class="row">
    <div class="col-md-12">
        <div class="card text-center">
            <div class="card-header">
                Role List
            </div>
            <div class="card-body">
            <table class="tablesaw table-striped table-hover table-bordered table no-wrap tablesaw-columntoggle" data-tablesaw-mode="columntoggle">
            <thead>
            <th>sl.no</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Description</th>
            <th>Permissions</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($roles as $role)
              <tr>
               <td>{{$loop->iteration}}</td>
               <td>{{$role->name}}</td>
               <td>{{$role->slug}}</td>
               <td>{{$role->description}}</td>
               <td>{{$role->permissions->implode('slug',', ')}}</td>
               <td>
               <a href="#" class="btn btn-warning edit" @click="roleEdit('{{$role->id}}')" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil-alt"></i></a>
               <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>

               </td>
              </tr>
            @endforeach
            </tbody>
            </table>
            {{$roles->links()}}
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

  // $("#update").click(function(){
  //   setTimeout(function(){
  //        let getStatus= localStorage.getItem('aclupdatestatus');  
  //        console.log(getStatus);
  //        if(getStatus=='true'){
  //            console.log('TRUE')
  //               $('#myModal').modal('toggle');
  //        } 
  //   }, 1000)
  
   
      
  // });
  
});
</script>
<script>
  new Vue({
      el:"#app",

      data:{
        modalTitle:'Role Modal',
        rolename:'',
        slug:'',
      },

      methods:{
          roleEdit(roleid){
            console.log(roleid);
            
            axios.get("role/"+roleid+"/edit")
            .then(response=>{
              console.log(response)
            })
            .catch(error=>{
              console.log(error);
              
            })
              
          }
      }

  })
</script>
@endpush