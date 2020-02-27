@extends('admin.layouts.app')
@section('title', 'Staffs')
@section('header-content')
    <h1>

        <small>  </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
@endsection

@section('main-content')
    <div class="row">

        @can('add-user')
            <div class="col-md-2">
                <a href="{{ route('staffs.create')}}" class="btn bg-yellow-active" style="width: 100%">Add new
                    staff</a>
            </div>
        @endcan

        <div class="col-md-2">
            <a href="{{ route('staffs.exportAll')}}" class="btn bg-green-active" style="width: 100%">Export</a>
        </div>

            @can('reset-password')
                <div class="col-md-2">
                    <form method="POST" name="frmReset" style="width: 100%" action={{route('staffs.reset')}} >
                        @csrf
                        <input hidden name="list_id" id="ids">
                    </form>
                        <div class="resetAll">
                            <button id="btnResetAll" name="btnReset"  style="width:100%" class="btn bg-blue-active"
                                    onclick="multipleReset()">
                                Reset Password
                            </button>
                        </div>
                </div>
            @endcan


        {{--        <div class="col-md-2">--}}
{{--            <form method="POST" style="width: 100%" action={{route('staffs.deleteAll')}} >--}}
{{--                @csrf--}}
{{--                <div class="deleteAll">--}}
{{--                    <button id="btnDeleteAll" name="btnDelete" class="btn bg-red-active"--}}
{{--                            onclick="multipleDelete()">--}}
{{--                        Delete Multiple--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}


        <div class="col-md-6" pull-right >
            <form style="text-align: right" method="GET" action={{route('staffs.index')}}>
                <input type="text" name="inputSearch" style="vertical-align: middle; height: 30px;">
                <button type="submit" method='GET' style="vertical-align: middle;height: 30px;" >
                    <i class="fa fa-fw fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    @if(isset($error))
        <h1>{{$error}}</h1>
    @else
        <table class="table table-bordered table-hover bg-burlywood-active" style="margin-top: 5px">
            <thead>
            <tr>
                <td>
{{--                    <input type="checkbox" class="selectall">--}}
                    <input type="checkbox" name="ckAll" id="ckAll" value=" " onclick="checkAll()">
                </td>

                <th>
                    <center>ID</center>
                </th>
                <th>
                    <center>Name</center>
                </th>
                <th>
                    <center>Email</center>
                </th>

                <th>
                    <center>Name Department</center>
                </th>

                <th>
                    <center>Account Type</center>
                </th>
                <th>
                    <center>Action</center>
                </th>
            </tr>
            </thead>
            <tbody>
            <!--                --><?php //$id =1 ?><!-- -->

            @foreach($users as $staff)
                <tr>
                    <td>
{{--                        <center><input type="checkbox" onclick="check(this.checked)" name="ids[]"--}}
{{--                                       value="{{$staff ->id }}"></center>--}}


                        <center><input type="checkbox" onclick="check(this.checked)" name="ck[]"
                                       value="{{$staff ->id }}"></center>

                    </td>

                    <th>
                        <center>{{$staff->id}}</center>
                    </th>

                    <td>
                        <center>{{($staff->user_name)}}</center>
                    </td>

                    <td>
                        <center>{{$staff->email}}</center>
                    </td>

                    <td>
                        <center>{{$staff->department_name}}</center>
                    </td>

                    <td>
                        <center>{{App\Models\Role::ROLE[$staff->type]}}</center>
                    </td>

                    <td class="d-flex">

                        <div class="row">
                            <div class="col-md-4">
                                <a class="btn btn-outline-warning ml-3 mr-3"
                                   href="{{route('staffs.edit',$staff->id)}}" id="{{$staff->id}}"
                                   title="Edit">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a class="btn btn-outline-warning ml-3 mr-3"
                                   href="{{route('staffs.detail',$staff->id)}}" id="{{$staff->id}}"
                                   title="Detail">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <form method="POST" action="{{ route('staffs.destroy') }}">
{{--                                    <input hidden name="id" value="{{ $staff->role_id }}">--}}
                                    <input hidden name="id" value="{{ $staff->id }}">
                                    @csrf
                                    <button class="btn btn-danger" type="submit" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete employee {{ $staff->user_name }} ?')">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $users->links('pagination::bootstrap-4') }}
    @endif

@endsection

