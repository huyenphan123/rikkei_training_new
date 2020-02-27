<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function autocomplete(Request $request)
    {
//        $data = User::select('name', 'id AS user_id')
//            ->where('name','LIKE','%'.$request->input('query').'%')
//            ->get();

        $data = User::selec( 'id AS user_id')
            ->where('id','LIKE','%'.$request->input('query').'%')
            ->get();
        return response()->json($data);
    }
}
