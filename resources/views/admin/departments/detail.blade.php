@extends('admin.layouts.default')
@section('content')
    <div class="" style="min-height: 1136px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$department->name}}
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
                        <centre>
                            <h1>
                                List Employee
                            </h1>
                        </centre>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Roles</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($listUsers as $user)
                                <tr>
                                    <td>
                                        {{$user->id}}
                                    </td>

                                    <td>
                                        {{$user->name}}
                                    </td>

                                    <td>
                                        {{$user->type}}
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

                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Export</a>

                        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px; margin-left: 10px">
                            <ion-icon name="color-filter"></ion-icon> Change Head Department
                        </button>

                            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-credit-card">
                                </i>Add Employee
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

{{--                                    <form method="POST" action="{{route('departments.insertUser', $user->id)}}">--}}
                                    <form method="POST" action="{{route('departments.insertUser')}}">
                                        @csrf
                                    <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="row " style="margin-top: 20px; margin-left: 15px">
                                                <div class="col-md-6">
                                                    <input name="user_name" class="typeahead form-control" style="padding-left:1.5rem" type="text" placeholder="Search Name">
                                                </div>

                                                <div class="col-md-5">
                                                    <select name="inputRole">
                                                        <option> ---Choose Role---</option>
                                                        <option value="Employee">Employee</option>
                                                        <option value="Head Department">Head Department</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-1">
                                                    <button type="button" class="close pull-right "
                                                            data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <input value="{{$department->id}} " name="department_id" hidden>

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
