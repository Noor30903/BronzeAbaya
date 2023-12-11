<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
class AuthController extends Controller
{
    	public function login_admin()
		{
			if(!empty(Auth::check()) && Auth::user()->is_admin == 1)
			{
				return redirect('admin/dashboard');
			}
			
			return view('admin.auth.login');
			
		}

		public function auth_login_admin(Request $request)
		{
			$remember = !empty($request->remember)? true : false;
			if(Auth::attempt(['email'=> $request->email,'password'=>$request->password, 'is_admin' =>1, 'status' =>0, 'is_delete' =>0],$remember))
			{
				return redirect ('admin/dashboard');
			}
			else
			{
				return redirect()->back()->with('error', "Please enter currect email and password");
			}

		}
		public function logout_admin()
		{
			Auth::logout();
			return redirect('admin');
		}

		public function login_user(Request $request)
		{
		    $remember = $request->has('remember');
		    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
		        if (Auth::user()->is_admin) {
		            return redirect('admin/dashboard');
		        } else {
		            // Redirect to a specific user page if necessary, for example:
		            // return redirect('account/list');
		            return redirect()->intended('account/list'); // Use the intended method with a fallback
		        }
		    }
		
		    return redirect('/?login=true')->with('error', 'Incorrect email or password.');
		}


		public function register_user(Request $request)
		{
		    // Validate the request...
		
		    $user = User::create([
		        'name' => $request->name,
		        'email' => $request->email,
				'phone' => $request->phone,
		        'password' => Hash::make($request->password),
		        // Add other necessary fields
		    ]);
		
		    Auth::login($user);
		
		    // Redirect to user dashboard or home page
		    return redirect('/');
		}

		public function logout()
		{
		    Auth::logout();
		    return redirect('/'); // Redirect to the homepage or login page
		}


		
}