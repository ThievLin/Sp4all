<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

class LoginController extends Controller
{
    public function get_login()
    {
      $title = "Backend Login";
      $name_companey = "Welcome";
    	return view('admin.user.login',compact('title','name_companey'));
    }
    public function post_login(Request $request)
    {
    	$rules = $this->validate($request ,[
    		'email' => 'required',
    		'password' => 'required'
    	]);

    	if(Auth::attempt(['email'=>$request->email ,'password'=>$request->password , 'status' => 1 ]))
    	{
    		return redirect('admin')->with('success','Welcome');
    	}
    	else
    	{
            
    		return redirect::back()->withErrors('The user and password information is invalid');

    	}

    }
    public function dologout()
    {
       Auth::logout();
    	return redirect('login');
    }
}
