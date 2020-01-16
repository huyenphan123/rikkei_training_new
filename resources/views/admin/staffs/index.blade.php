@extends('admin.layouts.default')
@section('title', 'Staffs')
@section('name_feature', 'List Staffs')
@section('content')
    <div class="row">

        <div class="col-md-2">
            @can('add-user')
                <a href="{{ route('staffs.create')}}" class="btn bg-yellow-active" style="width: 100%">Add new
                    staff</a>
            @endcan
        </div>
        <div class="col-md-2">
            <a href="{{ route('staffs.create')}}" class="btn bg-green-active" style="width: 100%">Export</a>
        </div>

        <div class="col-md-2">
            <form method="POST" style="width: 100%" action={{route('staffs.reset')}} >
                @csrf
                <div class="resetAll">
                    <button id="btnResetAll" name="btnReset" class="btn bg-blue-active"
                            onclick="multipleReset()">
                        Resset Password
                    </button>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <form style="text-align: right" method="GET" action={{route('staffs.index')}}>
                <input type="text" name="inputSearch">
                <button type="submit" method='GET' pull-right>
                    <i class="fa fa-fw fa-search"></i>
                </button>
            </form>
        </div>
    </div>
    @if(isset($error))
        <h1>{{$error}}</h1>
    @else
        <table class="table table-bordered table-hover bg-burlywood-active">
            <thead>
            <tr>
                <td>
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
                        <center><input type="checkbox" onclick="check(this.checked)" name="ck[]"
                                       value="{{$staff ->user_id }}"></center>
                    </td>

                    <th>
                        <center>{{$staff->user_id}}</center>
                    </th>

                    <td>{{($staff->user_name)}}</td>

                    <td>{{$staff->email}}</td>

                    <td>{{$staff->department_name}}</td>

                    <td>{{$staff->type}}</td>

                    <td class="d-flex">

                        <div class="row">
                            <div class="col-md-4">
                                <a class="btn btn-outline-warning ml-3 mr-3"
                                   href="{{route('staffs.edit',$staff->user_id)}}" id="{{$staff->user_id}}"
                                   title="Edit">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a class="btn btn-outline-warning ml-3 mr-3"
                                   href="{{route('staffs.detail',$staff->user_id)}}" id="{{$staff->user_id}}"
                                   title="Detail">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <form method="POST" action="{{ route('staffs.destroy') }}">
                                    <input hidden name="id" value="{{ $staff->role_id }}">
                                    @csrf
                                    <button class="btn btn-danger" type="submit" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete the record of {{ $staff->role_id }} ?')">
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

    <script language="javascript">
        windown.onload = function () {
            checkAll();
            check(i);
        }

        function checkAll() {
            var checkbox = document.getElementsByName("ck[]");
            var ckAll = document.getElementById("ckAll");

            // Viết theo jquery:(phải tải thư viện )
            // var ck1 = $('[name="ck[]"]');
            // var ckAll = $("#ckAll")[0];

            if (checkbox.length > 0) {
                if (ckAll.checked == true) {
                    for (var i = 0; i < checkbox.length; i++) {
                        checkbox[i].checked = true;
                    }
                } else {
                    for (var i = 0; i < checkbox.length; i++) {
                        checkbox[i].checked = false;
                    }
                }
            }
        }

        // bỏ 1 ô thì checkAll bị bỏ
        function check(i) {
            var ckAll = $("#ckAll")[0];
            if (i == false) ckAll.checked = false;
        }

        function multipleReset() {
            if (confirm('Are you sure to reset password these record?')) {
                var ck = $('[name= "ck[]"]');
                var value = [];
                for (i = 0; i < ck.length; i++) {
                    if (ck[i].checked) value.push(ck[i].value);
                }
                $("#ids").val(value);
                $('[name= "frmReset"]').submit();
            }
        }
    </script>

    </div>
@endsection
