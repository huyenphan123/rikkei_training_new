@extends('admin.layouts.default')
@section('title', 'Update Staff')
@section('name_feature', 'Update Staff')
@section('content')
    <div class="container-fluid" style="height: 600px">
        <div class="container mt-3" style="height: 100%">
            <form method="POST" action="{{route('staffs.update',[$users->id])}}"
                  style="height: 100%"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="inputName">Name:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="inputName" placeholder="Name" name="name" value="{{$users->name}}">
                        @error('name')
                        <span class="invalid-feedback"><p style="color: red ">{{ $message }}</p></span>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputEmail">Email:</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                               id="inputEmail" placeholder="Email" name="email" value="{{$users->email}}">
                        @error('email')
                        <span class="invalid-feedback"><p style="color: red ">{{ $message }}</p></span>
                        @enderror
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
@endsection
