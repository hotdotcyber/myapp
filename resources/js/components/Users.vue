<template>
    <div class="container">
   <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users table</h3>

                <div class="card-tools">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addNewModal">Add New <i class="fas fa-plus ml-1"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>Type</th>
                      <th>Email</th>
                    
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-for="user in users.data" :key="user.id">
                      <td>{{user.id}}</td>
                      <td>{{user.name}}</td>
                      <td>{{user.phoneno}}</td>
                      <td>{{user.type}}</td>
                      <td>{{user.email}}</td>
                      <td><a href=""> <i class="fas fa-edit mr-2 text-green"></i></a> / <a href=""> <i class="fas fa-trash-alt ml-2 text-red"></i></a> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

        <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewModalLongTitle">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="createUser">
            <div class="modal-body">
            <div class="form-group">
                <input  class="form-control" v-model="form.name" type="text" name="name" placeholder="Enter Name">
                 <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
             </div>
              <div class="form-group">
                <input  class="form-control" v-model="form.phoneno" type="text" name="phoneno" placeholder="Enter Phone Number">
                 <div v-if="form.errors.has('phoneno')" v-html="form.errors.get('phoneno')" />
             </div>
              <div class="form-group">
                <input  class="form-control" v-model="form.email" type="email" name="email" placeholder="Enter Email">
                 <div v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
             </div>

             <div class="form-group">
               <select class="form-control" v-model="form.type" id="type" name ="type">
                <option selected>User Category</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <option value="customer">Customer</option>
            </select>
             </div>
                 <div class="form-group">
                <input  class="form-control" v-model="form.password" type="password" name="password" placeholder="Enter Password">
                 <div v-if="form.errors.has('password')" v-html="form.errors.get('password')"/>
             </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
             </form>
            </div>
        </div>
        </div>
    </div>
    
</template>

<script>
    export default {
      data() {
      return {
      users:{},  
      form: new Form({
      name:'',
      email:'',
      phoneno:'',
      password:'',
      type:''
    })
      }  
       },
      methods:{
        loadUser(){
          axios.get("api/user").then((
            {data})=>(this.users=data));
        },
        createUser(){
          this.form.post('api/user');
          this.loadUser();
        }

      },
        created() {
          this.loadUser();
            console.log('Component mounted.')
        }
    }
</script>
