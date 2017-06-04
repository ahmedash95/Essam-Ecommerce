<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\SigninRequest;
use App\User;


class UsersController extends Controller
{
    /**
     * I'm just want to indicate that I didn't follow the name convention for methods 
     * below because I don't consider this controller as a resource controller.
     */

    public function getSignup()
    {
    	return view('user.signup');
    }

    public function postSignup(SignupRequest $request)
    {
    	if(User::create(['email' => $request->email,'password' => bcrypt($request->password)
		]))
    	{
    		session()->flash('success', 'Your membership has been registered successfully');
    		return redirect()->route('products.index');
    	} else {
    		session()->flash('failed', 'An error occuring while register !');
    		return back();
    	}

    }

    public function getSignin()
    {
    	return view('user.signin');
    }


    public function postSignin(SigninRequest $request)
    {
    	$credentials = ['email'=>$request->email, 'password'=>$request->password];
    	if(auth()->attempt($credentials)) {
    		session()->flash('success', 'Welcome back '.auth()->user()->email);
    		return redirect()->route('products.index');
    	}
    	return back();
    }
}
