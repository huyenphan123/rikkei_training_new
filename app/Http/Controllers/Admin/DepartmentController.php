<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersDepartmentExport;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Role;
use App\Http\Controllers\Admin;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDepartRequest;
use App\Http\Requests\UpdateDepartRequest;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
//use Excel;



class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//dd($request);
        if (!empty($request->inputSearch)){
            $departments = DB::table('departments')
                ->select('departments.id','departments.name', 'departments.description')
                ->where('departments.description', 'LIKE', '%'.$request->inputSearch.'%')
                ->orwhere('departments.name', 'LIKE', '%'.$request->inputSearch.'%')
                ->orderBy('departments.id', 'desc')
                ->paginate(5);
//            dd($departments);

            if(count($departments)==0){
                return redirect()->route('departments.index')
                    ->with('error', 'Result not found');
            }
        }
        else {
            $departments = DB::table('departments')
                ->orderBy('departments.id')
                ->paginate(5);
        }


        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartRequest $request)
    {
        $department = Department::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

        return redirect()->route('departments.index')->with('success','Create new department successed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $users = DB::table('roles')
            ->join('users', 'users.id', '=','roles.user_id')
            ->join('departments', 'departments.id', '=', 'roles.department_id' )
            ->select('users.name')
//            ->where('departments.id', '<>', $request->id)
            ->orderBy('name', 'desc')
            ->get();


        $department = Department::findOrFail($id);
//        dd($department);
        $listUsers = DB::table('roles')
            ->join('users', 'users.id', '=', 'roles.user_id')
            ->select('users.id','users.name', 'roles.type')
            ->where('department_id', $id)
            ->orderBy('roles.type', 'asc')
            ->get();
//        dd($listUsers);

        $countUsers = count($listUsers);

        return view('admin.departments.detail', compact(['department', 'countUsers','listUsers','users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);

        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartRequest $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        return redirect()->route('departments.index')->with('success','Update departments successed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
//        dd($id);die;
     DB::table('departments')
         ->where('id', $id) ->delete();

//        Department::findOrFail($id)->delete();
        return redirect('/departments')->with('success', 'Delete Successed!');
    }


    public function insertUser(Request $request)
    {
//        dd($request->department_id);die;

//        $role = $request->inputRole;
//        dd($role);die;

        $id = $request->userId;
        $oldRole = Role::where('user_id', $id)
            ->where('department_id', $request->department_id)
            ->count();

        if ($oldRole > 0) {
            return back()->with('warning', 'User already exists. Please choose another account');
        }
        else {
            //ép kiểu sang int để so sánh với role đã quy ước trong model Role.php
            if ((int)$request->inputRole === 1) {
                return back()->with('warning', 'Head Department already exists. Please choose another role');
            } else {
                $user = User::findOrFail($id);
//        dd($user->name);die;

                $user = Role::create([
                    'user_id' => $request->userId,
                    'department_id' => $request->department_id,
                    'type' => $request->inputRole,
                ]);
                return back()->with('success', 'Add user for department successed!');
            }
        }
    }

    public function exportUser(Request $request, $id)
    {
        $users = DB::table('roles')
            ->join('users', 'users.id', '=','roles.user_id')
            ->join('departments', 'departments.id', '=', 'roles.department_id' )
            ->select('users.id', 'users.name','users.email', 'users.created_at', 'users.updated_at')
            ->where('departments.id', $id)
            ->orderBy('name', 'desc')
            ->get();
//        dd($users);

        Excel::create('UsersDepartment', function($excel) use ($users) {
        $excel->sheet('List users in department', function ($sheet) use ($users){

            $sheet->cell('A1', function ($cell) {
               $cell->setValue('ID');
               $cell->setAlignment('center');
            });

            $sheet->cell('B1', function ($cell) {
                $cell->setValue('Name');
                $cell->setAlignment('center');
            });

            $sheet->cell('C1', function ($cell) {
                $cell->setValue('Email');
                $cell->setAlignment('center');
            });

            $sheet->cell('D1', function ($cell) {
                $cell->setValue('Created');
                $cell->setAlignment('center');
            });

            $sheet->cell('E1', function ($cell) {
                $cell->setValue('Updated');
                $cell->setAlignment('center');
            });

            foreach ($users as $key => $user) {

                $i = $key +2;
//                $sheet ->cell('A'.$i, $key +1);
                $sheet ->cell('A'.$i, $user->id);
                $sheet ->cell('B'.$i, $user->name);
                $sheet ->cell('C'.$i, $user->email);
                $sheet ->cell('D'.$i, $user->created_at);
                $sheet ->cell('E'.$i, $user->updated_at);
            }
        });
//        });
        })->download('xlsx');


//        return Excel::download(new UsersDepartmentExport($data), 'UsersDepartment.xlsx');

    }

//    public function setLeader(Request $request){
//        dd($request->all);
//    }
}
