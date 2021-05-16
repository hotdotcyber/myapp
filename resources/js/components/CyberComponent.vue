<template>
    <div class="container">
   <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Customers</h3>
                <form  enctype="multipart/form-data">
                  <div class="form-group">
                  <table class="table">
                    <tr>
                    <td width="40%" align="right"><label>Select File for Upload</label></td>
                    <td width="30">
                      <input type="file"  @change="getExcelData" name="select_file" id="select_file" ref="select_file"/>
                    </td>
                  
                    </tr>
                  </table>
                  </div>
                </form>
                <div class="card-tools">
                    <button class="btn btn-warning" @click="sendsms">Send Sms <i class="fa fa-upload" aria-hidden="true"></i></button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addNewModal">Upload data <i class="fa fa-upload" aria-hidden="true"></i></button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addNewModal">Add New <i class="fas fa-plus ml-1"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Select</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>Type</th>
                      <th>Email</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-for="user in users.data" :key="user.id">
                      <td><input type="checkbox" :value="user.phoneno" v-model="phonenumber" class="checkbox"></td>        
                      <td>{{user.name}}</td>
                      <td>{{user.phoneno}}</td>
                      <td>{{user.type}}</td>
                      <td>{{user.email}}</td>
                      <td><a href=""> <i class="fas fa-edit mr-2 text-green"></i></a> / <a href=""> <i class="fas fa-trash-alt ml-2 text-red"></i></a> </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
              <!-- /.card-body -->
        
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
        
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewModalLongTitle">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
          
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
      phonenumber:[],
       file:'',
       select_file:'',
      form: new Form({
      name:'',
      email:'',
      phoneno:'',
      type:''
    })
      }
        
       },
      methods:{
        loadUser(){
          axios.get("api/cybercustomer").then((
            {data})=>(this.users=data));
        },
        createUser(){
          this.form.post('api/cybercustomer');
          this.loadUser();
        },
         sendsms(){
        
           axios.post('/message',{
             phonenumber:this.phonenumber,
            
            }) .then(response => { 
         
          })

          //  });
        // console.log("you clicked me");
         
        },

         getExcelData(e){
    this.select_file = e.target.files[0];
    const formData = new FormData();
    formData.append('select_file',  this.select_file);
    console.log(formData);
   axios.post("/import",formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }}).then(function(response){
          }.catch(error => {
             console.log("Wrong Data Entry"+error.response)
           })
          
          .bind(this))
    }
    },
        created() {
          this.loadUser();
            console.log('Component mounted.')
        }
    }
</script>
