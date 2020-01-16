@extends('admin.layouts.default')
@section('title', 'Departments')
@section('name_feature', 'List Departments')
@section('content')
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-2">
                @can('add-user')
                    <a href="{{ route('departments.create')}}" class="btn bg-yellow-active" style="margin: 7px">
                        Add new department
                    </a>
                @endcan
            </div>
            <div class="col-md-2">
                <a href="{{ route('departments.create')}}" class="btn bg-green-active" style="margin: 7px">Export</a>
            </div>

            <div class="col-md-6">
                <form style="text-align: right" method="GET" action={{route('departments.index')}}>
                    <input type="text" name="inputSearch">
                    <button  style="margin: 7px" type="submit" method='GET'  pull-right>
                        <i class="fa fa-fw fa-search"></i>
                    </button>
                </form>
            </div>
        </div>



        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th style="width:4%"><center>ID</center></th>
                <th style="width: 20%"><center>Name</center></th>
                <th style="width: 45%"><center>Description</center></th>
                <th style="width: 20%"><center>Action</center></th>
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <th><center>{{$department->id}}</center></th>
                    <td>{{$department->name}}</td>
                    <td>{{$department->description}}</td>
                    <td class="d-flex " style="padding-right: 0; padding-left: 0;">
                        <div class="row" style="width: 80%; margin-left: 15%">
                            <div class="col-lg-4 col-md-4" style=" padding-left: 0; padding-right: 0">

                                <a href="{{route('departments.edit',$department->id)}}"
                                   class="btn btn-outline-warning ml-3 mr-3" id="{{$department->id}}" title="Edit"
                                   style="padding-right: 0; padding-left: 0;">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-4" style="padding-left: 0; padding-right: 0">
                                <a href="{{route('departments.detail',$department->id)}}"
                                   class="btn btn-outline-warning ml-3 mr-3" id="{{$department->id}}" title="Detail"
                                   style="padding-right: 0; padding-left: 0;">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-4" style="padding-left: 0; padding-right: 0">

                                <form method="POST" action="{{ route('departments.destroy', $department->id)}}">
                                    @csrf

                                    <button class="btn btn-danger" type="submit" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete the record of {{ $department->name }} ?')">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $departments->links('pagination::bootstrap-4') }}
    </div>

@endsection
