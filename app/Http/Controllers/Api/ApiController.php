<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;

use DB;
// use App\KhojTheSearch;
use App\User;
use Auth;

class ApiController extends Controller
{
	//this middleware only allow authenticte user for getting the response
	 public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    // For getting the api result
     public function getApiResult(Request $request)
    {
        $from = $request->start_datetime;
        $to = $request->end_datetime;
        $user_id = $request->user_id;

        // if you want to use query builder here you go.....

        // $data = DB::table('khoj_the_searches')
        //         ->select('created_at','input_values')
        //         ->where('user_id',$user_id)
        //         ->whereBetween('created_at', [$from, $to])
        //         ->get();

        // an user can have many rows. searches() gives result of that user. searches() define in the User Model 


    	$data = User::find($user_id)
    				->searches()
    				->select('created_at','input_values')
	                ->whereBetween('created_at', [$from, $to])
	                ->get();

		if($data){
        	return response()->json([ 'status' => 'success','user_id'   =>  $user_id, 'payload' => $data ],200);

		}else{
       		return response()->json([ 'message' => 'your are not authenticated']);

		}

        
    }
}
