<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\KhojTheSearch;
use Auth;

class KhojTheSearchController extends Controller
{
	// Index Pages
    public function index()
    {
        return view('back-end.home');
    }

    public function findValues(Request $request)
    {

    	$str_arr = explode (",", $request->input_values);
    	$rsorts = rsort($str_arr);

    	$khoj_the_search = new KhojTheSearch();
    	$khoj_the_search->user_id = Auth::user()->id;
    	$khoj_the_search->input_values = implode(', ', $str_arr);
    	$khoj_the_search->save();

    	if (in_array($request->search_values,$str_arr))
		  {
		  dd("matched");
		  }
		else
		  {
		  dd("not matched");
		  }
    }
}
