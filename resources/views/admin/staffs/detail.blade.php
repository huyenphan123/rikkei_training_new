@extends('admin.layouts.default')
@section('title', 'Update Staff')
@section('name_feature', 'Update Staff')
@section('content')
{{--    <div class="container-fluid">--}}
{{--        <div class="container mt-3">--}}
{{--            <div>--}}
{{--                <div class="form-group row-md-12">--}}
{{--                    <div class="form-group col-md-6">--}}
{{--                        <label>Name:</label>--}}
{{--                        <input value="{{$data['user']->name}}">--}}
{{--                    </div>--}}

{{--                    <div class="form-group col-md-6">--}}
{{--                        <label >Email:</label>--}}
{{--                        <input type="email"  value="{{$data['user']->email}}">--}}
{{--                    </div>--}}

{{--                    <div class="form-group col-md-6">--}}
{{--                        <label>Role:</label>--}}
{{--                        <input value="@foreach ($data['department'] as $dep) @if($dep != end($data['department'])){{$dep->type}},@else{{$dep->type}}@endif @endforeach">--}}
{{--                    </div>--}}

{{--                    <div class="form-group col-md-6">--}}
{{--                        <label>Depart:</label>--}}
{{--                        <input value="@foreach ($data['department'] as $dep) @if($dep != end($data['department'])){{$dep->department_name}},@else{{$dep->department_name}}@endif @endforeach">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <table class="table table-bordered table-hover bg-burlywood-active">
            <thead>
            <tr>
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
                    <center>Department</center>
                </th>
                <th>
                    <center>Position</center>
                </th>
                <th>
                    <center>Active</center>
                </th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <center>{{$data['user']->id}}</center>
                    </td>
                    <td>
                        <center>{{$data['user']->name}}</center>
                    </td>
                    <td>
                        <center>{{$data['user']->email}}</center>
                    </td>

                    <td>

                    </td>

                    <td>

                    </td>
                    <td>
{{--                            </center>{{$data['departments[]']->type}}</center>--}}
                    </td>

            </tbody>
        </table>
    </div>
@endsection




