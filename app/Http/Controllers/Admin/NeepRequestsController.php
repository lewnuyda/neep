<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\NeepRequests;
use App\NeepExpertResponse;
use App\NeepAction;

use File;

use Mail;
use App\Mail\SendMailToExpert;


class NeepRequestsController extends Controller
{
    //
    public function index()
    {
      
      $neep_requests =  NeepRequests::get_all_neep_requests();
      return view('admin/neep_requests',['neep_requests'=>$neep_requests]);

    
    }

    public function get_all_neep_requests()
    {
      $neep_requests =  NeepRequests::get_all_neep_requests();
      $data = array();

      foreach($neep_requests as $row)
      {
        //$data[]= $row;
        
       // $neep_req_letter_url = base_url("assets/uploads/neep_req_letter/".$row->neep_req_letter);

        //$neep_req_letter = "<a href=".$neep_req_letter_url." target=\"_blank\">". $row->neep_req_letter ."</a>";

       $action = "<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\"><a href=\"javascript:void(0)\" onclick=\"preview_usr_neep_request('".$row->neep_req_id."')\" class=\"btn btn-warning btn-sm\"><i class=\"fa fa-eye\"></i> View </a><a href=\"javascript:void(0)\"  onclick=\"search_usr_neep_request('".$row->neep_req_id."')\"  class=\"btn btn-success btn-sm\"><i class=\"fa fa-cogs\"></i> Process </a></div>";
       $path = asset('/public/storage/neep_req_letter/'.$row->neep_req_letter);
       //asset('uploads/joew.png')
       // $neep_req_letter_url = file(public_path('storage/neep_req_letter/'.$row->neep_req_letter));
       // $neep_req_letter_url =  storage_path('public/storage/neep_req_letter/' . $row->neep_req_letter);
        $neep_req_letter = "<a href=".$path." target=\"_blank\">". $row->neep_req_letter ."</a>";
        $arr[] = array(
          'neep_req_inst_name' => $row->neep_req_inst_name,   
          'neep_req_inst_region' => $row->region_name , 
          'neep_req_inst_province' => $row->province_name  ,
          'neep_req_inst_city' => $row->city_name ,                    
          'neep_req_needed' => $row->neep_req_needed ,
          'neep_req_purpose' => $row->neep_req_purpose ,   
          'neep_req_msg'  => $row->neep_req_msg ,
          'neep_req_letter'  => $neep_req_letter ,  
          'neep_date_of_engagement'  => date("d M Y", strtotime($row->neep_date_of_engagement)), 
          'neep_req_tracking_no'  => $row->neep_req_tracking_no , 
          'pp_last_name'  => $row->pp_last_name.", ".$row->pp_first_name." ".$row->pp_middle_name." ".$row->pp_extension ,
          'pp_email'  => $row->pp_email ,
          'pp_contact'  => $row->pp_contact ,
          'date_received' => $row->date_received,
          'action' => $action  



        );


          }

        $results= ["sEcho"=>1,
              "iTotalRecords"=>count($data),
              "iTotalDisplayRecords"=>count($data),
              "aaData"=>$arr ];

        echo json_encode($results);

      

    }

    public function get_usr_neep_request_html($id)
    {
      $neep_requests =  NeepRequests::get_usr_neep_request($id);
      //$pdf= url('/admin/neep_requests/pdf/'.$id);
     // $output = "<a href=".$pdf." target=\"_blank\" class=\"btn btn-danger\">Convert into PDF</a>";
      foreach($neep_requests as $row)
      {
        $contact_person= $row->title_name. " ".$row->pp_first_name." ".$row->pp_middle_name." ".$row->pp_last_name;
        $output ="<!DOCTYPE html>
        <html>
        <head>
          <title>NEEP Request PDF</title>
        </head>
        <body>

        <h4  style='text-align:center'>Department of Science and Technology</h4>
        <h3  style='text-align:center'>NATIONAL RESEARCH COUNCIL OF THE PHILIPPINES <br></h3>

        <h3  style='text-align:center'>Engagement Request Form</h3>
        <hr>
        <p >Name of Requesting Institution: $row->neep_req_inst_name </p>
    

        <p >Region: $row->region_name </p>
        <p >Province: $row->province_name </p>
        <p >Town/ City: $row->city_name  </p>
        <p >Barangay: $row->neep_req_inst_brgy  </p>
        <p >Street: $row->neep_req_inst_street  </p>
        <p >Expertise Needed: $row->neep_req_needed  </p>
        <p >Details of the Purpose: $row->neep_req_purpose  </p>
    
        <br>
        

        
        <p>Name of Contact Person: $contact_person  </p>
        <p>Sex: $row->sex  </p>
        <p>Contact No: $row->pp_contact  </p>
        <p>Email: $row->pp_email </p>
        <p>Date Received: $row->date_received </p>
        



        </body>
        </html>";

      }

      return $output;



      
      
    }


    public function create_usr_neep_request_pdf($id)
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->get_usr_neep_request_html($id));
     return $pdf->stream();
    }

    
    public function get_expert_list($id)
    { 
    //ob_clean();
      $neep_requests =  NeepRequests::get_usr_neep_request($id);

      foreach($neep_requests as $neep_request_row)
      {
        $neep_req_needed = explode(',',$neep_request_row->neep_req_needed);
        echo "<div class='form-group'>";
        foreach ($neep_req_needed as $spc) 
        {
           

          $get_expert_list = NeepRequests::get_expert_list($spc);
          echo "<strong>(".count($get_expert_list).")"." Expert'/s found for ".$spc."</strong><br>";

          foreach($get_expert_list as $expert_row )
          {

            
           
            $expert_name = "<a href='#' onclick=\"expert_profile($expert_row->pp_usr_id)\">".$expert_row->title_name." ".$expert_row->pp_first_name." ".$expert_row->pp_middle_name." ".$expert_row->pp_last_name."</a>";
            echo "<div class='form-check'><input class='form-check-input' id='email_expert' name='email_expert[]' type='checkbox' value='".$expert_row->pp_usr_id."'> ".$expert_name."</div>";
            //echo $expert_row->pp_last_name."<br>";

          }
        }
        echo "</div>";

      }

    
      //echo json_encode($data);


    }

    public function get_expert_profile_html($id)
    {
      $expert_profile =  NeepRequests::get_expert_profile($id);
      //$pdf= url('/admin/neep_requests/pdf/'.$id);
     // $output = "<a href=".$pdf." target=\"_blank\" class=\"btn btn-danger\">Convert into PDF</a>";
      foreach($expert_profile as $row)
      {
        $name= $row->title_name. " ".$row->pp_first_name." ".$row->pp_middle_name." ".$row->pp_last_name;
        $output ="<!DOCTYPE html>
        <html>
        <head>
          <title>Expert Profile</title>
        </head>
        <style type='text/css'>

        p{
          font-size: 16px;  
        }
          
        </style>

        <body>

        <h4  style='text-align:center'>Department of Science and Technology</h4>
        <h3  style='text-align:center'>NATIONAL RESEARCH COUNCIL OF THE PHILIPPINES <br></h3>

        <h3  style='text-align:center'>Expert Profile</h3>
        <hr>
       

        <p>Name of Expert: $name </p>
        <p>Sex: $row->sex </p>


        

        <p>Division: $row->div_number - $row->div_name </p>
        <p>Section: $row->ds_name </p>

        <p>General Specialization: $row->mpr_gen_specialization </p>
        <p>Sub Specialization: $row->mpr_sub_specialization </p>
        <p>Specific Specialization: $row->mpr_specific_specialization </p>

        <p>H-index: $row->mpr_h_index </p>

        <p>Google Scholar: $row->mpr_google_scholar_url </p>
  
        



        </body>
        </html>";

      }

      return $output;



      
      
    }


    public function create_expert_profile_pdf($id)
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->get_expert_profile_html($id));
     return $pdf->stream();
    }





    public function sendMailToExpert(Request $request)
    {
      ob_clean();
    

      //save s process table


      //neep_process_expert_id
      $expert_id = $request->email_expert;

      //neep_process_request_id
      $expert_req_id = $request->neep_req_id;

      

     /* $activity = Activity::create($data);

if ($activity->exists) {
 
} else {
  
}*/

        $a= array();
        foreach($expert_id as $id)
        {
          $a[]=$id;
          $insert_data =  NeepExpertResponse::create([
            'neep_expert_response' 	=>  3,
            'neep_request_id' 	=>  $expert_req_id,
            'neep_expert_id' 	=> $id, 
            'updated_at' 	=> NULL,       
          ]);

          if($insert_data->exists)
          {
            $email_expert = NeepRequests::get_expert_profile($id);

            foreach($email_expert as $row)
            {
              $pp_email = $row->pp_email;
              Mail::to($pp_email)->send(new sendMailToExpert($request,$a));

            }

          }
          





            




        }

     // echo $request->attachment;

    //  return redirect('admin/dashboard');

      echo json_encode(array('status' => 'success'));
      //return redirect()->back();




     

      

        /*foreach($email_expert as $row)
        {
          
          foreach($pp_email as $emails)
          {
            Mail::to($emails)
            ->send(new sendMailToExpert($request));

          }

        }*/

      

        

    




     /* Mail::to('lewjason.nuyda@hotmail.com')
     			->send(new sendMailToExpert($request));

           return redirect()->back();*/
        	
      
    }


    
	public function get_neep_action($id)
	{ 
		//ob_clean();
		
		$data= NeepAction::where('id', $id)->first();
		echo json_encode($data);


	}

  

  


    





}
