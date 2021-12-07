<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\NeepRequests;
use App\NeepExpertResponse;
use App\NeepProcess;

class NeepExpertController extends Controller
{
    //

    public function response($id,$expert_id)
	{ 
        //	echo $id."<br>";
        //echo $expert_id;

    //  $neep_requests =  NeepRequests::get_all_neep_requests();
        //return view('admin/neep_requests',['neep_requests'=>$neep_requests]);
        $neep_requests =  NeepRequests::get_usr_neep_request($id);
        $neep_expert_response_id =  	NeepExpertResponse::where('neep_request_id','=',$id)
        ->where('neep_expert_id','=',$expert_id)
        ->get();

        foreach($neep_requests as $row)
        {
        $neep_req_inst_name = $row->neep_req_inst_name;
        $contact_person= $row->title_name. " ".$row->pp_first_name." ".$row->pp_middle_name." ".$row->pp_last_name;

        }

        foreach($neep_expert_response_id as $row1)
        {
            $neep_expert_response_id = $row1->id;
        
        }

        
    

        return view('neep_expert_response',['neep_req_inst_name'=>$neep_req_inst_name,'neep_expert_response_id'=>$neep_expert_response_id]);
        
    }


    public function save_neep_expert_response(Request $request)
    {

       // echo json_encode(array('status' => 'success'));

        $id = $request->input('neep_expert_response_id');

        $update_data = NeepExpertResponse::whereId($id)->update([
            'neep_expert_response' 	=> $request->input('neep_expert_response'),
            'neep_expert_remarks' 	=> $request->input('neep_expert_remarks'),
            'updated_at' 	=> date('Y-m-d H:i:s'),
        ]);

        if($update_data)
        {

            NeepProcess::create([
				'neep_process_action' 	=> $request->input('neep_expert_response'),
				'neep_process_remarks' 	=> $request->input('neep_expert_remarks'),
				'neep_process_response_id' 	=> $id,
			
			]);

            echo json_encode(array('status' => 'success'));


        }

    

       


    }







}
