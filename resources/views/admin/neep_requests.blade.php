@include('partials.admin_header')
 

@include('partials.admin_navbar')

<style type="text/css">

.table{
  font-size: 12.5px;  
}
  
</style>



<div id="layoutSidenav_content">
 
   
    <main>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Users</li>
        </ol>
        <div class="container-fluid px-4">
            

        <h4>NRCP Expert Engagement Requests</h4>
            <div id="tbl-div" class="table-responsive " >
                <table  class="tbl-neep-requests table table-bordered table-striped table table-responsive-sm table-hover table-outline mb-0 "  >
                    <thead class="thead-dark">
                        <tr>
                            <th>Name of Institution</th>          
                            <th>Region</th> 
                            <th>Province</th>
                            <th>City</th>                    
                            <th>Expert Needed</th>
                            <th>Purpose</th>   
                            <th>Message/ Details</th>
                            <th>Request Letter</th>  
                            <th>Date of Engagement</th> 
                            <th>Tracking No</th> 
                            <th>Contact Person</th>
                            <th>Contact Email</th>
                            <th>Contact No</th>
                            <th>Date Submitted</th>
                            <th>Action</th>
                        

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                


                </table>
            </div>

        </div>
    </main>


    
<div class="modal" tabindex="-1" role="dialog" aria-hidden="true" id="PdfNeepRequestModal">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Preview NEEP Request</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
    
      <div class="modal-body">
      
        <div id="pdf_neep_request_button">

        </div>
        <div id="preview_neep_request">
        </div>
       
      </div>

    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" aria-hidden="true" id="SearchNeepRequestModal">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> NEEP Request</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
    
      <div class="modal-body">

        <form  id="form-process-nrcp-expert-engagement"  name="form-process-nrcp-expert-engagement" enctype="multipart/form-data" method="POST">

        {{ csrf_field() }}
          <div class="form-group ">
            <label class="form-control-label" for="email_notif_to_expert">Email Notification to Expert</label>

            <textarea id="email_notif_to_expert" name="email_notif_to_expert" placeholder="Compose Email Notification"></textarea>
            
          </div>

          <div class="mb-3">
            <label for="attachment" class="form-label">File upload</label>
            <input class="form-control attachment" type="file" id="attachment" name="attachment[]" multiple>
          </div>

          <div class="form-group">
           

            <div id="expert_list_div">

            </div>

          </div>









        <input type="hidden" id="neep_req_id"   name="neep_req_id" >


        <button  class="btn btn-success" id="btn-send-mail" name="btn-send-mail" > Send</button>





        </form>

      
       
      </div>

    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" aria-hidden="true" id="ExpertProfileModal">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Preview Expert Profile</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
    
      <div class="modal-body">
      
        <div id="pdf_expert_profile_button">

        </div>
        <div id="preview_expert_profile">
        </div>
       
      </div>

    </div>
  </div>
</div>





  

  

@include('partials.admin_footer')
