@extends('admin.layouts.default')
@section('title', 'Create new Staff')
@section('name_feature', 'Create new Staff')
@section('content')
    <div class="container-fluid">
        <div class="container mt-4">
            <form method="POST" action="{{route('departments.store')}}">
                @csrf
                <div class="form-group col-md-6">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="col-md-6 col-form-label text-md-right">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <p style="color: red">{{ $message }}</p>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="description" class="col-md-6 col-form-label text-md-right">{{ __('Description') }}</label>
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="new-password">

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <p style="color: red">{{ $message }}</p>
                                    </span>
                            @enderror
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
