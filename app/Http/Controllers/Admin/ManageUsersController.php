<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hash;
use App\User;
use App\Groups;

class ManageUsersController extends Controller
{
    //
    
    public function index()
    {
        $users = User::all();
		$groups = Groups::get_all_groups();
        return view('admin/manage_users',['users'=>$users,'groups'=>$groups]);
        //return view('admin/manage_users');

    }
    public function get_all_users()
    {
        
        $users = User::all();
		$data = array();
        foreach($users as $row)
		{		

        //	$neep_req_letter = "<a href=".$neep_req_letter_url." target=\"_blank\">". $row->neep_req_letter ."</a>";

        	$action = "<a href=\"#\" onclick=\"edit_usr($row->id)\" class=\"btn btn-success btn-sm edit-usr\"><i class=\"fa fa-edit\"></i></a>";
		//	$action = "edit";

			if($row->updated_at != NULL)
			{
				$updated_at= date('M d, Y h:i A', strtotime($row->updated_at));
			}
			else
			{
				$updated_at = "-";
			}

			$arr[] = array(
				'id' => $row->id, 
				'name' => $row->lname.", ".$row->fname." ".$row->mname.".", 
				'position'  => $row->position,		      
				'email'  => $row->email,
				'created_at'  => date('M d, Y h:i A', strtotime($row->created_at)),
				'updated_at'  => $updated_at,
				/*'grp_name'  => $row->grp_name ,
				'date_created' => $row->date,
				'last_logged_in'  => $row->last_logged_in ,*/
				'action' => $action  



		  );


		}

			$results= ["sEcho"=>1,
	          "iTotalRecords"=>count($data),
	          "iTotalDisplayRecords"=>count($data),
	          "aaData"=>$arr ];

			echo json_encode($results);

			//return response()->json_encode($results);

    }

	public function get_user($id)
	{ 
		//ob_clean();
		
		$data= User::where('id', $id)->first();
		echo json_encode($data);


	}

	public function update_user(Request $request, User $user)
	{
	
		$id = $request->input('id');
		$reset_password = $request->input('reset_password');
		$random_string = Str::random(40);
		
		/*if($reset_password == 1)
		{
			$password 

		}*/
	/*	if (count($request->all()) == 0)
        {
			return redirect('admin/dashboard');
        
        }
		else{*/
			User::whereId($id)->update([
				'lname' 	=> $request->input('lname'),
				'fname' 	=> $request->input('fname'),
				'mname' 	=> $request->input('mname'),
				'ext' 		=> $request->input('ext'),
				'position' 	=> $request->input('position'),
				'email' 	=> $request->input('email'),
				'contact_no' => $request->input('contact_no'),
				'grp_id' => $request->input('grp_id')
			]);
	
	
			echo json_encode(array('status' => 'success'));

	//	}
	
		
		


	
	}

	public function save_user(Request $request, User $user)
	{
		$check_email = User::where('email', $request->input('email'))->get();

		if(sizeof($check_email) > 0)
		{
			echo json_encode(array('status' => 'error'));

		}
		else
		{
			User::create([
				'lname' 	=> $request->input('lname'),
				'fname' 	=> $request->input('fname'),
				'mname' 	=> $request->input('mname'),
				'ext' 		=> $request->input('ext'),
				'position' 	=> $request->input('position'),
				'email' 	=> $request->input('email'),
				'contact_no' => $request->input('contact_no'),
				'grp_id' => $request->input('grp_id'),
				'password' => Hash::make($request->input('password')),
			]);

			echo json_encode(array('status' => 'success'));




		}

    

	


	}



}
