<?php

namespace App\Http\Controllers;

//use Request;
use App\User;
use App\Models\Role;
use App\Http\Requests\StoreChangePassRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePass()
    {
        return view('auth.changepass');
    }

    public function store(StoreChangePassRequest $request)
    {
        $user = User::find(Auth::id());


        if(!Auth::attempt(['email' => $user->email,'password' => \request('old_password')] )) {
            return redirect()->back()-> with('error','The old password is not correct' );
        } else if (Auth::attempt(['email' => $user->email,'password' => \request('new_password')] )) {
//            print 'false mk mới trùng với mk cũ';
            $request->session()->flash('error','The new password must be different from the current password');
            return redirect()->back();
        } else {
            $user->password = bcrypt($request->new_password);
            $user->is_first_login = 1;
            $user->save();
            return redirect('staffs')->with('success', 'You update password succeed');

        }

    }
}

