@include('partials.admin_header')
 

@include('partials.admin_navbar')




<div id="layoutSidenav_content">
 
   
    <main>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Users</li>
        </ol>
        <div class="container-fluid px-4">
        
            
          <h4>Manage Users</h4>
          <a href="#"  id="btn-add-admin-usr" class="btn btn-success">Add User</a>
          <div id="tbl-div" class="table-responsive " >
            <table  class="tbl-users table table-bordered table-striped table table-responsive-sm table-hover table-outline mb-0 ">
              <thead class="thead-dark">
                  <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Email</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
       
              </tbody>
            </table>
          </div>

        </div>
    </main>

<div class="modal fade" id="UserAdminModal" tabindex="-1" role="dialog" aria-labelledby="UserAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddUserAdminModalLabel"></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
 
      <form method="post" enctype="multipart/form-data" class="form-horizontal" id="form-admin-user" name="form-admin-user">
      {{ csrf_field() }}
      <div id="pp_div">

        <!-- <div class="form-group row">
                <label class="form-control-label text-right col-lg-3" for="pp_title">Title: <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                  <select id="pp_title" class="form-control required" name="pp_title">
                  <option value="">Select Title</option>
                  
                  </select>
                </div>
            </div> -->

        <div class="form-group row ">
          <label class="form-control-label text-right col-lg-3" for="last_name">Last Name: <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <div class="form-group">

              <input type="text" id="lname" name="lname" class="form-control required"   placeholder="*Last Name"  /> 

              </div>
            </div>
        </div>

        <div class="form-group row ">
          <label class="form-control-label text-right col-lg-3" for="first_name">First Name: <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <div class="form-group">

              <input type="text" id="fname" name="fname" class="form-control required"   placeholder="*First Name" />

            </div>
          </div>
        </div>

        <div class="form-group row ">
          <label class="form-control-label text-right col-lg-3" for="middle_name">Middle Name:</label>
          <div class="col-lg-9">
            <div class="form-group">
        
            <input type="text" id="mname" name="mname" class="form-control"   placeholder="Middle Name" />

            </div>
          </div>
        </div>

        <div class="form-group row ">
          <label class="form-control-label text-right col-lg-3" for="extension">Extension:</label>
          <div class="col-lg-9">
            <div class="form-group">
      
              <input type="text" id="ext" name="ext" class="form-control"   placeholder="Extension Name"  />
            </div>
          </div>  

        </div>


        <!-- <div class="form-group row ">
          <label class="form-control-label text-right col-lg-3" for="sex">Sex: <span class="text-danger">*</span></label>
        <div class="col-lg-9">
         <div class="form-group">
      
          <select id="pp_sex" class="form-control required" name="pp_sex" >
            <option value="">Choose</option>
            
          </select>
        </div>
        </div>
        </div> -->

        <div id="pp_position_div" class="form-group row ">
          <label class="form-control-label text-right col-lg-3" for="position">Position: <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <div class="form-group">
          
              <input type="text" id="position" name="position" class="form-control required"   placeholder="Position"   /> 

            </div>
          </div>
        </div>

        <div class="form-group row ">
            <label class="form-control-label text-right col-lg-3" for="contact">Contact No: <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <div class="form-group">
          
                <input type="text" id="contact_no" name="contact_no" class="form-control required"   placeholder="Contact Number"   /> 

              </div>

            </div>
          </div>
        </div>





        <div class="form-group row ">
          <label class="form-control-label text-right col-lg-3" for="email_address">Email Address: <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <div class="form-group">
      
                <input type="email" id="email" name="email" class="form-control required"   placeholder="Email Address"   /> 

             </div>
            </div>
        </div>


        <div id="reset_password_div">
          <div class="form-group row ">
              <label class="form-control-label text-right col-lg-3" for="reset_password">Reset Password:</label>
            <div class="col-lg-9">
              <div class="form-group form-check form-check-inline">
          
            <input class="form-check-input" type="checkbox" id="reset_password" name="reset_password" value="1">
              </div>
            </div>
          </div>
        </div>

        <div id="password_div">
          <div class="form-group row ">
          <label class="form-control-label text-right col-lg-3" for="password">Password: <span class="text-danger">*</span></label>
          <div class="col-lg-9">
            <div class="form-group">

            <input type="password" id="usr_password" name="usr_password" class="form-control required"   placeholder="Password"   /> 
            <div id="result" tabindex="1"></div>

            </div>
          </div>
        </div>

        <div class="form-group row ">
          <label class="form-control-label text-right col-lg-3" for="confirm_password">Confirm Password: <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <div class="form-group">     
              <input type="password" id="cnf_usr_password" name="cnf_usr_password" class="form-control required"   placeholder="Confirm Password"   /> 

              </div>
            </div>
          </div>

        </div>



        <div class="form-group row ">
          <label class="form-control-label text-right col-lg-3" for="user_role">User Role: <span class="text-danger">*</span></label>
            <div class="col-lg-9">
              <div class="form-group">

                <select class="form-control required" id="grp_id" name="grp_id">
                <option value="" >Select Group</option>
                @foreach ($groups as $group)
                <option value="{{ $group->id }}" >{{ $group->grp_name }}</option>               
                @endforeach

                </select>

              </div>
            </div>
        </div>



         
        <!-- <div id="usr_status_div">
          <div class="form-group row ">
            <label  class="form-control-label text-right col-lg-3"  for="usr_status_id">Status:</label>
          <div class="col-lg-9">
            <select id="usr_status_id" class="form-control" name="usr_status_id" >
            <option value="">Choose</option>
            
          </select>
          </div>

          </div>
        </div> -->
 

   


        <input type="hidden" id="id" name="id" >
         


      </form>



      </div>
      <div class="modal-footer">
       
        <!-- <button type="button" class="btn btn-primary" id="btn-usr-remove">Remove</button> -->
        <button type="button" class="btn btn-danger" id="btn-update-admin-usr">Save Changes</button>
        <button type="button" class="btn btn-primary" id="btn-save-admin-usr">Save</button>
        
      </div>
    </div>
  </div>
</div>






  

  

@include('partials.admin_footer')
