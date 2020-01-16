<?php
//
//namespace App\Http\Controllers\Admin;
//
//use App\Http\Controllers\Controller;
//use App\Models\Department;
//use App\Models\User;
//use Request;
////use Illuminate\Http\Request;
//use App\Http\Requests\StaffRequest;
//use Illuminate\Support\Facades\Auth;
//
//class AdminController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function postLogin(Request $request){
//        if (Auth::attempt($request->only('username','password'), $request->has('remember')))
//        {
//            if(Auth::user()->is_first_login == 1)
//            {
//                return redirect()-> route('home');
//            }
//            else
//            {
//                return redirect()->route('changepass');
////                echo "change pass";
//            }
//        }
//        else
//        {
//            return redirect()-> back()
//                ->with('error', 'Username or Password incorrect');
//        }
//    }
//}
