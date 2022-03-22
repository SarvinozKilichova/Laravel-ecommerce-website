<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomLoginController extends Controller
{

	public function loginUser(Request $request){
		if (Auth::guard('member')->attempt(['email'=> $request->email, 'password' => $request->password], $remember_token)) {
	 		$msg = 'logincd';

	 		return response()->json($msg);
	 	}	
	}
 	

}
