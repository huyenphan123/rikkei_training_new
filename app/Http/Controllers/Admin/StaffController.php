<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use App\Mail\CreateUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($request->inputSearch)) {
                $users = DB::table('roles')
                    ->join('users', 'users.id', '=','roles.user_id')
                    ->join('departments', 'departments.id', '=','roles.department_id')
                    ->select('users.id', 'users.name AS user_name', 'users.email' , 'departments.name AS department_name', 'roles.type')
                    ->where('users.id', '>', 1)
                    ->where(function($q) use ($request) {
                        $q->where('users.name','LIKE', '%'.$request->inputSearch.'%')
                            ->orwhere('departments.name','LIKE', '%'.$request->inputSearch.'%')
                            ->orwhere('users.email','LIKE','%'.$request->inputSearch.'%')
                            ->orWhere('roles.type','LIKE', '%'.$request->inputSearch.'%');
                    })

                    ->orderBy('users.id', 'asc')->paginate(7);
              if(count($users)==0){
//                  dd(empty($users)); die;
                  return redirect()->route('staffs.index')
                      ->with('error', 'Result not found');
              }
        }
        else {
            $users = DB::table('roles')
                ->join('users', 'users.id', '=', 'roles.user_id')
                ->join('departments', 'departments.id', '=', 'roles.department_id')
                ->select('roles.id as role_id','users.id as user_id' , 'users.name AS user_name', 'users.email', 'departments.id AS department_id', 'departments.name AS department_name', 'roles.type')
                ->where('users.id', '>', 1)
                ->orderBy('users.id', 'asc')->paginate(7);
        }

        return view('admin.staffs.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all()->sortBy('name');
        $roles = Role::all();

        return view('admin.staffs.create', compact(['departments', 'roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {

        $user = User::create ([
           'name' => $request->name,
           'email' => $request->email,
            'password'=> bcrypt($request->password)
        ]);
//        dd($user);die;

        $role = Role::create ([
           'user_id' => $user->id,
           'department_id' =>$request->department_id [0] ,
            'type' =>$request->type
        ]);
//        dd($role);die;

        $users = DB::table('roles')
            ->join('users', 'users.id', '=', 'roles.user_id')
            ->join('departments', 'departments.id', '=', 'roles.department_id')
            ->select('roles.id as role_id','users.id as user_id' , 'users.name AS user_name', 'users.email', 'departments.id AS department_id', 'departments.name AS department_name', 'roles.type')
            ->where('users.id', '>', 1)
            ->orderBy('users.id', 'asc')->paginate(7);
        if ($user['email']) {
            Mail::to($user['email'])->send(new CreateUser($request->password, $user['name']));
        }

        return redirect()->route('staffs.index')
            ->with('success', 'Create user successed!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
//        dd($user);die;
        $departments = DB::table('roles')
            ->leftJoin('users', 'users.id','=', 'roles.user_id')
            ->leftJoin('departments', 'departments.id', '=', 'roles.department_id')
            ->select('users.name as user_name', 'departments.name as department_name', 'roles.type', 'users.email')
            ->where('users.id', '=', $id)
            ->get();
//        $departments = $departments->toArray();
//        dd($departments);
        $data =[
            'user'=> $user,
            'department' => $departments,
        ];
//        dd($data);

        return view('admin.staffs.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('admin.staffs.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
//        dd($request->all());
        $user->save();

        $users = DB::table('roles')
            ->join('users', 'users.id', '=', 'roles.user_id')
            ->join('departments', 'departments.id', '=', 'roles.department_id')
            ->select('roles.id as role_id','users.id as user_id' , 'users.name AS user_name', 'users.email', 'departments.id AS department_id', 'departments.name AS department_name', 'roles.type')
            ->where('users.id', '>', 1)
            ->orderBy('users.id', 'asc')->paginate(7);

         return redirect()->route('staffs.index')->with('success','Update account successed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {

        $id = $request->id;

        DB::table('roles')->where('id', $id)->delete();

//        $user = User::findOrFail($id);
//        $roles = Role::findOrFail($id);

        $users = DB::table('roles')
            ->join('users', 'users.id', '=', 'roles.user_id')
            ->join('departments', 'departments.id', '=', 'roles.department_id')
            ->select('roles.id as role_id','users.id as user_id' , 'users.name AS user_name', 'users.email', 'departments.id AS department_id', 'departments.name AS department_name', 'roles.type')
            ->where('users.id', '>', 1)
            ->orderBy('users.id', 'asc')->paginate(7);


        return redirect('staffs')->with('success', 'Delete user successed!');
    }

    }

