<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    // From here the login page will be open
    // 
    public function login()
    {
        return view('front.account.login');
    }

    
    public function authenticate(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'

        ];

        $Validator = Validator::make($request->all(), $rules);

        if ($Validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { // To check the email and password from the database 
                return redirect()->route('account.profile');  // Returning to the profile page once the login is successfull


            } else {
                return redirect()->route('account.login')->with('error', 'Either Email/Password is Incorrect !!');
                
            }
        } else {
            return redirect()->route('account.login')->withInput()->withErrors($Validator);
        }
    }


    public function profile()
    {
        $id = Auth::user()->id; //To get the user id 
        $user = User::findOrFail($id); //To get the user information from  id

        
        return view('front.layout.dashapp',[
            'user'=> $user
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('account.login');
    }
}
