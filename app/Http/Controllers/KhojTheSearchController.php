<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

    	dd($str_arr);
    }
}
