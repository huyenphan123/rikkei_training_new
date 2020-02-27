@extends('admin.layouts.app')
@section('main-content')
    <div class="" style="min-height: 1136px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1 style="color: red">
                <b>
                    <i>
                        <center>
                            {{$department->name}}
                        </center>
                    </i>
                </b>
            </h1>


            <div class="form-group row">
                <label for="name" class="col-md-6 col-form-label text-md-right mycustom" >{{ __('Number Of Employees: ') }}        {{ $countUsers}}</label>
            </div>

        </section>

        <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-info"></i> Description:</h4>
                {{$department->description}}
            </div>
        </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <center>
                            <h1>
                                List   Employee
                            </h1>
                        </center>
                        <tr>
                            <td> </td>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Roles</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($listUsers as $user)
                                <tr>
                                    <td>
                                        <center>

                                            <input type="checkbox" name="btnChangeHead" class="checkbox-set-head {{ $department->type === 1 ? 'no-drop' : ''}}" onclick="return setHeadCheckbox(this)">
                                        </center>
{{--                                        <center><input type="radio" name="abc"></center>--}}
                                    </td>


                                    <td>
                                        {{$user->id}}
                                    </td>

                                    <td>
                                        {{$user->name}}
                                    </td>

                                    <td>
                                        {{ App\Models\Role::ROLE[$user->type] }}
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">

                    <a href="{{ route('departments.exportUser', $department->id) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i>
                        Export</a>

{{--                    <a href="{{route('departments.exportUser')}}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i>--}}
{{--                        Export</a>--}}

                    <div>
                        <form method="POST" name="fSetHeadDepartment" action="{{route('departments.setLeader')}}">
                            @csrf
                            <input hidden name="set_leader" id="leader">
                        </form>

                        <button type="button" class="btn btn-primary pull-right"
                                style="margin-right: 5px; margin-left: 10px" onclick="setHeadDepartment()">
                            <ion-icon name="color-filter"></ion-icon>
                            Set Head Department
                        </button>
                    </div>


                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-credit-card">
                        </i>Add Employee
                    </button>

                    <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{route('departments.insertUser')}}">
                                        @csrf
                                    <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <center>
                                                    <h3 class="modal-title">
                                                        Add Account
                                                    </h3>
                                                </center>
                                            </div>

                                            <div class="modal-body">
                                            <div class="row " style=" margin-left: 15px">
                                                <div class="col-md-6">
                                                    <input name="userId" class="typeahead form-control" style="padding-left: 6rem;margin-left: 10%;height: 35px;width: 190px;" type="text" placeholder="Search ID">

{{--                                                    <input name="user_name" class="typeahead form-control" style="padding-left:1.5rem" type="text" placeholder="Search Name">--}}
                                                </div>

                                                <div class="col-md-5" >
                                                    <select name="inputRole" style="height: 35px;width: 160px;">
                                                        <option> ---Choose Role---</option>
                                                        <option value="1">Head Department</option>
                                                        <option value="2">Employee</option>
                                                    </select>
                                                </div>

                                                <input value="{{$department->id}} " name="department_id" hidden>
                                            </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btnAddUser btn-default" >Add</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>

    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
                console.log(query);
                return $.get(path, { query: query }, function (data) {
                    console.log(data);
                    return process(data);
                });
            }
        });

    </script>



@endsection
