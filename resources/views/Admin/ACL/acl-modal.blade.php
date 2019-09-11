  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">@{{modalTitle}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form class="floating-labels m-t-40" action="#"method="POST" @submit.prevent="updateAccess">
                    @csrf
                    @method('PUT')
                    <div class="form-group m-b-40 ">
                        <label for="input1" style="position: initial;color:black;">Name</label>
                        <input type="hidden" class="form-control" id="mid" name="id">
                        <input type="text" class="form-control" id="username" name="name" v-model="username">
                        <!-- <span class="text-danger"></span> -->
                        <span v-if="errors.username" :class="['text-danger']">@{{ errors.username[0] }}</span>
                    </div>

                    <div class="form-group m-b-40">
                    <label for="input3" style="position: initial;color:black;">E-mail</label>
                        <input type="text" class="form-control" id="useremail" name="code" v-model="email">
                        <span v-if="errors.email" :class="['text-danger']">@{{ errors.email[0] }}</span>
                    </div>

                    <div class="form-group m-b-5">
                    <label for="input7" style="position: initial;color:black;">Roles</label>
                      @{{datauser}}
                       <select name="" id="roles" multiple class="form-control" v-model="selected">
                       <option v-for="option in options" v-bind:value="option.id">
                        @{{ option.name }}
                      </option>
                       </select>
                        <span class="bar">@{{selected}}</span>
                        <span v-if="errors.username" :class="['text-danger']">@{{ errors.username[0] }}</span>
                    </div>
                       <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect waves-light" style="width:50%" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="update" style="width: 50%;">UPDATE</button>
                    </div>
                </form>
        </div>
    
      </div>
    </div>
  </div>
 