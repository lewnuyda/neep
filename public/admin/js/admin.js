$(document).ready(function()
{
  tinymce.init({
    selector: 'textarea#email_notif_to_expert',
    forced_root_block : false,

    height : "400"
 	});

  $('.tbl-users').dataTable({
  //dom: 'Blfrtip',
  "bProcessing": true,
  "sAjaxSource": 'manage_users/get_all_users/',
  "aoColumns": [
  { mData: 'id'} ,          
  { mData: 'name'} , 
  { mData: 'position'} ,
  { mData: 'email' },
  { mData: 'created_at' },
  { mData: 'updated_at' },
  /* { mData: 'date_created'} , 
  { mData: 'last_logged_in'} , */                   

  { mData: 'action' } 

  ],

  /* buttons: [
  {
  extend: 'pdfHtml5',
  orientation: 'landscape',
  pageSize: 'LEGAL',
  // text: ,
  title: 'NATIONAL RESEARCH COUNCIL OF THE PHILIPPINES' + '\n'+'NRCP Expert Engagement Program',
  filename: 'neep_requests',
  exportOptions:{
  columns: ':visible'
  //  columns:[0,1,2,3,4,5,6,9]
  }
  },
  {
  extend: 'excel',
  orientation: 'landscape',
  pageSize: 'LEGAL',
  exportOptions:{
  columns: ':visible'
  // columns:[0,1,2,3,4,5,10]
  }
  },
  'colvis'
  ],*/


  // "bInfo" : false,
  "searching": true,
  //"order": [[ 13, "desc" ]],
  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]


  }); 

  $('.tbl-neep-requests').dataTable({
    dom: 'Blfrtip',
    "bProcessing": true,
    "sAjaxSource": 'neep_requests/get_all_neep_requests/',
    "aoColumns": [
      { mData: 'neep_req_inst_name'} ,          
      { mData: 'neep_req_inst_region'} , 
      { mData: 'neep_req_inst_province' } ,
      { mData: 'neep_req_inst_city'} ,                    
      { mData: 'neep_req_needed'} ,
      { mData: 'neep_req_purpose'} ,   
      { mData: 'neep_req_msg'} ,
      { mData: 'neep_req_letter'} ,  
      { mData: 'neep_date_of_engagement'} , 
      { mData: 'neep_req_tracking_no'} , 
      { mData: 'pp_last_name'} ,
      { mData: 'pp_email'} ,
      { mData: 'pp_contact'} ,
      { mData: 'date_received' }, 
      { mData: 'action' } 
                  
                ],

     /* buttons: [
           {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
               // text: ,
                title: 'NATIONAL RESEARCH COUNCIL OF THE PHILIPPINES' + '\n'+'NRCP Expert Engagement Program',
                filename: 'neep_requests',
                exportOptions:{
                    columns: ':visible'
               
                }
            },
            {
                extend: 'excel',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions:{
                   columns: ':visible'
                
                }
            },
             'colvis'
        ],*/

 
   // "bInfo" : false,
    "searching": true,
    "order": [[ 13, "desc" ]],
    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]


  }); 



  $(document).on('click','#btn-update-admin-usr', function (e)
  {
    var $this = $(this);
    var loadingText = '<i class="fas fa-spinner fa-spin"></i> processing...';
    if ($(this).html() !== loadingText) {
      $this.data('original-text', $(this).html());
      $this.html(loadingText);
      $(this).prop("disabled", true);
    }

    

    //if($('#form-admin-user').valid())
    // {
    
      $.ajax({
          type:"POST",
          url: 'manage_users/update_user', // point to server-side PHP script 
          dataType: 'json',
          data:$('#form-admin-user').serializeArray(),
          cache:false,
          crossDomain: true,
          success: function(data)
          {
            
            if(data.status == 'success')
            {

              swal({
                title: "User updated successfully!",
                icon: "success",
                });
                  
                setTimeout(function() {
                location.reload();
          
                $("#UserAdminModal").modal('hide');      
                }, 1000);

              
        

            }


                      
          }
      }); 

      /* }

      else
      {
          setTimeout(function() {
                
          $this.html($this.data('original-text'));
          }, 3000);
          $this.removeAttr("disabled");

          $('label.error').css('color','red');
          $('label.error').addClass('float-right');
          e.preventDefault();
      }*/
  }); 


  $(document).on('click','#btn-add-admin-usr', function (e)
  {
    
    $('#UserAdminModal').modal('toggle');
    
    $('#btn-update-admin-usr').hide();
    $('#btn-save-admin-usr').show();
  //  $('#AddUserAdminModalLabel').html('Add User');
    $("#form-admin-user input[type='text'],select,input[type='email'],input[type='password']").val('');



    $('#password_div').show();
    // $('#usr_status_div').hide();
    $('#reset_password_div').hide();
    // $('#pp_div').show();


    //$('#pp_position_div').show();
    

  }); 


  $(document).on('click','#btn-save-admin-usr',function(e)
	{
		var $this = $(this);
		var loadingText = '<i class="fas fa-spinner fa-spin"></i> processing...';
		if ($(this).html() !== loadingText) {
		  $this.data('original-text', $(this).html());
		  $this.html(loadingText);
		  $(this).prop("disabled", true);
		}
	 

	/*	$('#form-admin-user').validate({
		      rules : {
		        usr_password : {
		            minlength : 6
		        },
		        cnf_usr_password : {
		            minlength : 6,
		            equalTo : '[name="usr_password"]'
		        }, 
		        usr_email : {
		            required: true, 
		            email: true
		        }

		    }

		});
		$('#form-admin-user input.required, #form-admin-user select.required').each(function()
		{
		  $(this).rules('add',{required:true});


		});

		if($('#form-admin-user').valid())
		{*/


		 // console.log(this_url);


		   $.ajax({ 
		    type:"POST",
        url: 'manage_users/save_user', 
		    dataType: 'json',
		    data:$('#form-admin-user').serializeArray(),
		    cache:false,
		    crossDomain: true,
		    success:function(data){
		        console.log(data);
		        if(data.status == 'success')
		        { 

		                  
              swal({
              title: "User successfully registered!",
          
              icon: "success",
              });


              

              setTimeout(function() {
                  location.reload();
              $this.html($this.data('original-text'));
              }, 2000);
              $this.removeAttr("disabled");

		           
		          
		         
		        }
		        else if(data.status == 'error')
		        {
              swal({
              title: "Email address already used, please used another one!",
              // text: "You clicked the button!",
              icon: "error",
              });

              setTimeout(function() {
            //     location.reload();
              $this.html($this.data('original-text'));
              }, 3000);
              $this.removeAttr("disabled");

		        }

		      
		   
		        
		    }, error: 
		      function (xhr, ajaxOptions, thrownError) {
		        console.log(xhr.status);
		        console.log(xhr.responseText);
		        console.log(thrownError);
		     
		        
		     }
		  }); 

		  /*  }
		    else
		    {
		      setTimeout(function() {
		            
		            $this.html($this.data('original-text'));
		            }, 3000);
		            $this.removeAttr("disabled");


			    $('label.error').css('color','red');
			    $('label.error').addClass('float-right');
			    e.preventDefault();



		    }*/
	   


	});


  $("#form-process-nrcp-expert-engagement").submit(function (e) {
	
		/*var $this = $(this);
    var $btn = $('#btn-send-mail');
		var loadingText = '<i class="fas fa-spinner fa-spin"></i> processing...';
		if ($('#btn-send-mail').html() !== loadingText) {
		  $btn.data('original-text', $('#btn-send-mail').html());
		  $btn.html(loadingText);
		  $('#btn-send-mail').prop("disabled", true);
		}*/
   /* var form_data = new FormData(); 

    attachment_data = $('#attachment').prop('files')[0];  
   
              
    var other_data = $('#form-process-nrcp-expert-engagement').serializeArray();
    form_data.append('attachment',  attachment_data );

    $.each(other_data,function(key,input){
        
      form_data.append(input.name,input.value);
        
        
    });*/

    var form_data = new FormData(this);

    e.preventDefault();

    /*$.each($(".attachment").prop('files')[0], function (key, file){
        data.append(key, file);
        console.log(key);
    });  
    

    $.each($('#form-process-nrcp-expert-engagement').serializeArray(), function (i, obj) {
        data.append(obj.name, obj.value)
    });*/

    

	/*	if($('#form-admin-user').valid())
		{*/


		 // console.log(this_url);


		   $.ajax({ 
		    method: 'POST',
   
        url: 'neep_requests/sendMailToExpert', 
		    dataType: 'json',
		    data: form_data,
		    cache: false,
        contentType: false,
        processData: false,
        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		    success:function(data){
          console.log(data);
		      //  console.log(data.status);
         /* if(data.status == 'success')
          { 	                  
            swal({
            title: "Email sent successfully!",

            icon: "success",
            });        

            setTimeout(function() {
            location.reload();
            $btn.html($btn.data('original-text'));
            }, 2000);
            $btn.removeAttr("disabled");

            


          }
          else 
          {
            swal({
            title: "Email not sent. Error!",
            // text: "You clicked the button!",
            icon: "error",
            });

            setTimeout(function() {
            //     location.reload();
            $btn.html($btn.data('original-text'));
            }, 3000);
            $btn.removeAttr("disabled");

          }*/

		      
		   
		        
		    }/*, error: 
		      function (xhr, ajaxOptions, thrownError) {
		        console.log(xhr.status);
		        console.log(xhr.responseText);
		        console.log(thrownError);
		     
		        
		     }*/
		  }); 

		  /*  }
		    else
		    {
		      setTimeout(function() {
		            
		            $this.html($this.data('original-text'));
		            }, 3000);
		            $this.removeAttr("disabled");


			    $('label.error').css('color','red');
			    $('label.error').addClass('float-right');
			    e.preventDefault();



		    }*/
	   


	});
 

  $(document).on('click','#btn-save-neep-expert-response', function (e)
  {
   // console.log(window.location.origin);

   // console.log(data);
    //alert('dsad');
    $.ajax({ 
      type:"POST",
      url: '/neep_v3/neep_expert/save_neep_expert_response', 
      dataType: 'json',
      data:$('#form-neep-expert-response').serializeArray(),
      cache:false,
      crossDomain: true,
      success:function(data){
          console.log(data);
          if(data.status == 'success')
          { 
                  
            swal({
            title: "Response saved successfully!",
        
            icon: "success",
            });
      

            setTimeout(function() {
                location.reload();
            $this.html($this.data('original-text'));
            }, 2000);
            $this.removeAttr("disabled");     
           
          }
          else
          {
            swal({
              title: "Response already accepted or your response is already lapsed!",
          
              icon: "error",
              });
        
  
              setTimeout(function() {
                  location.reload();
              $this.html($this.data('original-text'));
              }, 2000);
              $this.removeAttr("disabled");     

            

          }
         
      
          
      }, error: 
        function (xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(xhr.responseText);
          console.log(thrownError);
       
          
       }
    }); 

    e.preventDefault();
  
    

  }); 




  


});


function edit_usr(id)
{

  $('#UserAdminModal').modal('toggle');

  $('#btn-save-admin-usr').hide();
  $('#btn-update-admin-usr').show();
  //$('#AddUserAdminModalLabel').html('Edit User');



  // $('#pp_usr_id').val(id);
  $('#reset_password_div').show();
  $('#password_div').hide();

    
      


  $.ajax({
    type:"GET",
    dataType:"json",
    url: 'manage_users/get_user/'+id,
    crossDomain: true,
    success: function(data)
          {
            $.each(data, function(k, v) 
            {
              $('#'+k).val(v);
            });
                    
          }
      });



}




function preview_usr_neep_request(id)
{
  
    $('#PdfNeepRequestModal').modal('toggle');
 

    var file ='neep_requests/get_usr_neep_request_html/'+id;

    var pdf_path ='neep_requests/create_usr_neep_request_pdf/'+id;

    $('#pdf_neep_request_button').html('<a href="'+pdf_path+'" target="_blank" class="btn btn-primary"><i class="fas fa-file-pdf"></i></a>');   

    $('#preview_neep_request').html('<embed src="' + file + '" type="application/pdf"   width="100%" height="800px">');   

    
   

} 



function search_usr_neep_request(id)
{
  $('#SearchNeepRequestModal').modal('toggle');

  $('#neep_req_id').val(id);

  //var response_link = "@accept_link or @decline_link";
  //var link = "<a href="+APP_URL+'/admin/neep_requests/neep_expert_process_response/'+id+">Accept</a>"

 // tinyMCE.activeEditor.setContent(response_link);
  var action = 3;
  $.ajax({
    type:"GET",
    dataType:"json",
    url: 'neep_requests/get_neep_action/'+action,
  
    success: function(data)
    {
     // console.log(data1.neep_action_email_to_admin);
      //tinyMCE.activeEditor.setContent(data.neep_action_email_to_admin);
      //console.log(data);
    //  $('#expert_list_div').html(data);
       $.each(data, function(k, v) 
        {
          //console.log(k);
          if(k == 'neep_action_email_to_admin')
          {       
            tinyMCE.activeEditor.setContent(v);
          }
   
        });
              
    }
  });
	           
  $.ajax({
    type:"GET",
    dataType:"text",
    url: 'neep_requests/get_expert_list/'+id,
    crossDomain: true,
    success: function(data)
    {
      //console.log(data);
      $('#expert_list_div').html(data);
        /* $.each(data, function(k, v) 
        {
          $('#'+k).val(v);
        });*/
              
    }
  });

} 

function expert_profile(id)
{
    $('#ExpertProfileModal').modal('toggle');

    var file ='neep_requests/get_expert_profile_html/'+id;

    var pdf_path ='neep_requests/create_expert_profile_pdf/'+id;

    $('#pdf_expert_profile_button').html('<a href="'+pdf_path+'" target="_blank" class="btn btn-primary"><i class="fas fa-file-pdf"></i></a>');   

    $('#preview_expert_profile').html('<embed src="' + file + '" type="application/pdf"   width="100%" height="800px">');   

  
} 

