@extends('admin.layouts.app')
@section('title', 'Create new Staff')
@section('name_feature', 'Create new Staff')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-left: 192px">
                <div class="card">
                    <div class="card-header" >
                        <h3 style="margin-left: 195px">Create New Employee
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('staffs.store') }}" autocomplete="off">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" >
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <p style="color: red">{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <p style="color: red">{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" autocomplete="new-password" >
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <p style="color: red">{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password_confirm" type="password" class="form-control" name="password_confirm" >
                                </div>

                                @error('password_confirm')
                                <span class="invalid-feedback" role="alert">
                                        <p style="color: red">{{ $message }}</p>
                                    </span>
                                @enderror
                            </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-right">Department</label>
                                    <div class="col-md-6">
                                        <select id="inputDept" @error('department_id') is-invalid @enderror name="department_id" class="form-control">
                                            <option> ---Choose Department---</option >
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">
                                                    {{$department->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('department_id')
                                    <span class="invalid-feedback" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-right">Role</label>
                                    <div class="col-md-6">
                                        <select class="form-control"  id="inputRole" @error('type') is-invalid @enderror name="type" autofocus>
                                            <option> ---Choose Role---</option>
                                            <option value="1">Head Department</option>
                                            <option value="2">Employee</option>
                                        </select>
                                    </div>
                                    @error('type')
                                    <span class="invalid-feedback"><p style="color: red">{{ $message }}</p></span>
                                    @enderror
                                </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-9 offset-md-4">
                                    <center>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
