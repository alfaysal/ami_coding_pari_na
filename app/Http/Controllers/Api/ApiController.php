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

        // ** Using Relations** an user can have many rows. searches() gives result of that user. searches() define in the User Model 


    	$data = User::find($user_id)
    				->searches()
    				->select('created_at','input_values')
	                ->whereBetween('created_at', [$from, $to])
	                ->get();

	    // if a user has not the token it gives a exception
		try {
		    $user = Auth::userOrFail();
		} catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
		    return response()->json(['error' => $e->getMessage()]);
		}

        // give response 
        return response()->json([ 'status' => 'success','user_id'   =>  $user_id, 'payload' => $data ],200);
    }
}
