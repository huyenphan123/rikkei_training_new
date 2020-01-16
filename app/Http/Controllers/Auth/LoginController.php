<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
//use http\Env\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    public function getLogin() {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
//        dd($request);

        if (Auth::attempt($request->only('email','password'), $request->has('remember')))
        {
            if ( Auth::user()->is_first_login == 1)
                {
                    return redirect('/staffs');
                }
            else
                {
                    return redirect() -> route('changepass');
                }

        }
        else{
            return redirect()->back()->with('error','Username or Password incorrect !');
        }


    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
