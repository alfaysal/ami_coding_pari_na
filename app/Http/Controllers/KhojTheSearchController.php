<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Response;
use App\KhojTheSearch;
use Auth;
use DB;

class KhojTheSearchController extends Controller
{
	// Index Pages
    public function index()
    {
        return view('back-end.home');
    }

    public function findValues(Request $request)
    {
        // for breaking the input string (which is seperated by comma) to an array 
    	$str_arr = explode (",", $request->input_values);
        // sorted that array with descending order get descending ordered array in return
    	$rsorts = rsort($str_arr);

        // insert into database
    	$khoj_the_search = new KhojTheSearch();
    	$khoj_the_search->user_id = Auth::user()->id;

        // join the desending ordered array element into a string
    	$khoj_the_search->input_values = implode(', ', $str_arr);
    	$khoj_the_search->save();

        // search the input string to that array and give response accross it 
    	if (in_array($request->search_values,$str_arr))
		  {
		  return Response::json(array(
              'success' => true,
            )); 
		  }
		else
		  {
		  return Response::json(array(
              'success' => false,
            )); 
		  }
    }

  


}
