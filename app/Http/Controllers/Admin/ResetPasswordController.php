<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;
use app\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use Mail;
use App\Mail\ChangePass;

class ResetPasswordController extends Controller
{
    public function multipleReset(Request $request)
    {
        $id_array = explode(',', $request->ids);

        if ($request->ids != null) {
            foreach ($id_array as $id) {
                $user = User::where('id', $id)->first();
                $passnew = Str::random(8);
                $hashPass = bcrypt($passnew);
                User::where('id', $id)->update(['password' => $hashPass, 'is_first_login' => 0]);
                if ($user->email) {
                    Mail::to($user->email)->send(new ChangePass($passnew, $user->name));
                }
            }
            return redirect()->back()->with('success','Update password successed!');
        } else {
            return redirect()->back()->with('error','You need select account to reset password');
        }
    }
}

